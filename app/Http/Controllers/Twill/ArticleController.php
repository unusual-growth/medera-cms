<?php

namespace App\Http\Controllers\Twill;

use A17\Twill\Http\Controllers\Admin\ModuleController as BaseModuleController;
use A17\Twill\Models\Contracts\TwillModelContract;
use A17\Twill\Services\Forms\BladePartial;
use A17\Twill\Services\Forms\Fields\BlockEditor;
use A17\Twill\Services\Forms\Fields\Browser;
use A17\Twill\Services\Forms\Fields\DatePicker;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Fields\Medias;
use A17\Twill\Services\Forms\Fieldset;
use A17\Twill\Services\Forms\Form;
use App\Models\Article;

class ArticleController extends BaseModuleController
{
    protected $moduleName = 'articles';
    /**
     * This method can be used to enable/disable defaults. See setUpController in the docs for available options.
     */
    protected function setUpController(): void
    {
        $this->setPermalinkBase('library');
        $this->withoutLanguageInPermalink();
        $this->enableDuplicate();
    }


    protected function getLocalizedPermalinkBase(): array
{
    return [
        'en' => 'library',
        'nl' => 'bibliotheek',
        'tr' => 'kutuphane',
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
            BlockEditor::make()
                ->blocks(blocks: ['library-content', 'library-image'])
        );

        return $form;
    }
    public function getSideFieldsets(TwillModelContract $model): Form
    {
        $form = parent::getSideFieldsets($model);


        $form->addFieldset(
            Fieldset::make()
                ->title('Excerpt')
                ->id('excerpt')
                ->fields([
                    Medias::make()->name(name: 'library-image')->label('Image')->required(),
                    Input::make()->name('description')->label('Description')->translatable()->type('textarea')->required()

                ])
        );

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

        $form->addFieldset(
            Fieldset::make()
                ->title('Related')
                ->id('related')
                ->fields([
                    Browser::make()
                    ->modules([Article::class])
                    ->name('related')
                    ->max(3)
                ])
        );
        return $form;
    }
}
