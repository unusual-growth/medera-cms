<?php

namespace App\Http\Controllers\Twill;

use A17\Twill\Models\Contracts\TwillModelContract;
use A17\Twill\Services\Listings\Columns\Text;
use A17\Twill\Services\Listings\TableColumns;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Http\Controllers\Admin\ModuleController as BaseModuleController;
use A17\Twill\Services\Forms\BladePartial;
use A17\Twill\Services\Forms\Fields\BlockEditor;
use A17\Twill\Services\Forms\Fieldset;

class PageController extends BaseModuleController
{
    protected $moduleName = 'pages';
    /**
     * This method can be used to enable/disable defaults. See setUpController in the docs for available options.
     */
    protected function setUpController(): void
    {
        $this->setPermalinkBase(permalinkBase: '');
        $this->enableDuplicate();
        $this->withoutLanguageInPermalink();
    }

    /**
     * See the table builder docs for more information. If you remove this method you can use the blade files.
     * When using twill:module:make you can specify --bladeForm to use a blade form instead.
     */
    public function getForm(TwillModelContract $model): Form
    {
        $form = parent::getForm($model);

        $form->add(
            item: BlockEditor::make()
        );

        return $form;
    }

    /**
     * This is an example and can be removed if no modifications are needed to the table.
     */
    protected function additionalIndexTableColumns(): TableColumns
    {
        $table = parent::additionalIndexTableColumns();

        $table->add(
            Text::make()->field('description')->title('Description')
        );

        return $table;
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
        $form->addFieldset(
            Fieldset::make()
            ->title('Schema Markup')
            ->id('schema')
            ->fields([
                Input::make()->name('schema')->label('JSON-LD')->rows(10)->type('textarea')->translatable(),
            ])
        );
        return $form;
    }
}
