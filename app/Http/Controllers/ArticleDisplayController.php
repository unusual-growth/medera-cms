<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\BlogCategory;
use App\Repositories\ArticleRepository;
use App\Repositories\BlogCategoryRepository;
use CwsDigital\TwillMetadata\Traits\SetsMetadata;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View as FacadesView;

class ArticleDisplayController extends Controller
{
    use SetsMetadata;
    protected $perPage = 9;

    protected function getSearchQuery()
    {
        return Request::query('search');
    }

    protected function handleCategory(BlogCategory $category)
    {
        if (!$category->published) {
            abort(404);
        }

        if ($category->redirect) {
            return redirect()->route('blog_category', $category->slug);
        }

        return null;
    }

    protected function getCategoryArticles(BlogCategory $category, ?string $searchQuery)
    {
        return $category->articles()
            ->published()
            ->when($searchQuery, function ($query) use ($searchQuery) {
                return $query->whereHas('translations', function ($q) use ($searchQuery) {
                    $q->where('title', 'LIKE', "%{$searchQuery}%")
                        ->orWhere('description', 'LIKE', "%{$searchQuery}%");
                });
            })
            ->orderBy('publish_start_date', 'desc')
            ->paginate($this->perPage);
    }

    protected function getAllArticles(ArticleRepository $articleRepository, ?string $searchQuery)
    {
        return $articleRepository->published()
            ->when($searchQuery, function ($query) use ($searchQuery) {
                return $query->whereHas('translations', function ($q) use ($searchQuery) {
                    $q->where('title', 'LIKE', "%{$searchQuery}%")
                        ->orWhere('description', 'LIKE', "%{$searchQuery}%");
                });
            })
            ->orderBy('publish_start_date', 'desc')
            ->paginate($this->perPage);
    }

    public function index(ArticleRepository $articleRepository, BlogCategoryRepository $categoryRepository, ?BlogCategory $category = null): View
    {
        $categories = $categoryRepository->published()->whereNull('parent_id')->get();
        $searchQuery = $this->getSearchQuery();

        if ($category) {
            $redirectResponse = $this->handleCategory($category);
            if ($redirectResponse) {
                return $redirectResponse;
            }

            $articles = $this->getCategoryArticles($category, $searchQuery);
            $this->setMetadata($category);
            FacadesView::share('item', $category);
        } else {
            $articles = $this->getAllArticles($articleRepository, $searchQuery);
        }

        return view('site.articles', [
            'categories' => $categories,
            'category' => $category,
            'list' => $articles,
            'canonical' => Request::url(),
            'pageNumber' => Request::query('page', 0),
            'searchQuery' => $searchQuery
        ]);
    }

    public function show(Article $article): View|RedirectResponse  // Updated return type
    {
        if (!$article) {
            abort(404);
        }

        $isActive = $article->hasActiveTranslation(app()->getLocale());
        if (!$isActive) {
            return redirect()->route('articles');
        }

        if ($article->redirect) {
            return redirect(route('article', $article->slug));
        }

        $this->setMetadata($article);
        $relatedArticles = $article->getRelated('related');
        if ($relatedArticles->count() == 0) {
            $relatedArticles = Article::where('id', '!=', $article->id)->inRandomOrder()->limit(3)->get();
        }

        FacadesView::share('item', $article);
        return view('site.article', ['relatedArticles' => $relatedArticles]);
    }
}
