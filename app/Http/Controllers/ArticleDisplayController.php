<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\RedirectResponse;
use App\Repositories\ArticleRepository;
use CwsDigital\TwillMetadata\Traits\SetsMetadata;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View as FacadesView;

class ArticleDisplayController extends Controller
{
    use SetsMetadata;

    public function index(ArticleRepository $articleRepository): View
    {
        $articles =  $articleRepository->published()->orderBy('publish_start_date', 'desc')->paginate(9);
        $canonical = Request::url();
        $pageNumber = Request::query('page', 0);
        return view('site.articles', ['list' => $articles, 'canonical' => $canonical, 'pageNumber' => $pageNumber]);
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
        if($relatedArticles->count() == 0) {
            $relatedArticles = Article::where('id', '!=', $article->id)->inRandomOrder()->limit(3)->get();
        }

        FacadesView::share('item', $article);
        return view('site.article', ['relatedArticles' => $relatedArticles]);
    }
}
