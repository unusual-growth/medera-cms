<?php

namespace App\Http\Controllers\Twill;

use A17\Twill\Http\Controllers\Admin\NestedModuleController as BaseModuleController;
use A17\Twill\Models\Contracts\TwillModelContract;
use A17\Twill\Services\Forms\BladePartial;
use A17\Twill\Services\Forms\Fields\Browser;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Fieldset;
use A17\Twill\Services\Forms\Form;
use App\Models\BlogCategory;

class BlogCategoryController extends BaseModuleController
{
    protected $moduleName = 'blogCategories';
    protected $showOnlyParentItemsInBrowsers = false;
    protected $nestedItemsDepth = 1;
    /**
     * This method can be used to enable/disable defaults. See setUpController in the docs for available options.
     */
    protected function setUpController(): void
    {
        $this->setPermalinkBase('library/category');
        $this->withoutLanguageInPermalink();
        $this->enableReorder();
    }

    protected function getLocalizedPermalinkBase(): array
    {
        return [
            'en' => 'library/category',
            'nl' => 'bibliotheek/categorie',
            'tr' => 'kutuphane/kategori',
        ];
    }
    /**
     * See the table builder docs for more information. If you remove this method you can use the blade files.
     * When using twill:module:make you can specify --bladeForm to use a blade form instead.
     */
    public function getForm(TwillModelContract $model): Form
    {
        $form = parent::getForm($model);

        $form->add(
            Input::make()->name('description')->label('Description')->translatable()
        );

        $form->add(
                        Browser::make()
                ->modules([BlogCategory::class])
                ->name('categories')
                ->max(1)
        );
        return $form;
    }

    public function getSideFieldsets(TwillModelContract $model): Form
    {
        $form = parent::getSideFieldsets($model);



        $form->addFieldset(
            Fieldset::make()
                ->title(trans('twill-metadata::form.titles.fieldset'))
                ->id('metadata')
                ->fields([
                    BladePartial::make()->view('twill-metadata::includes.metadata-fields')
                        ->withAdditionalParams([
                            'metadata_card_type_options' => config('metadata.card_type_options'),
                            'metadata_og_type_options' => config('metadata.opengraph_type_options'),
                        ]),
                ])
        );

     
        return $form;
    }

}
