<?php

namespace App\Http\Controllers\Twill;

use A17\Twill\Http\Controllers\Admin\ModuleController as BaseModuleController;
use A17\Twill\Models\Contracts\TwillModelContract;
use A17\Twill\Services\Forms\BladePartial;
use A17\Twill\Services\Forms\Fields\BlockEditor;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Fields\Medias;
use A17\Twill\Services\Forms\Fields\Select;
use A17\Twill\Services\Forms\Fieldset;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Services\Listings\Columns\Text;
use A17\Twill\Services\Listings\TableColumns;
use App\Models\Butyrate;

class ButyrateController extends BaseModuleController
{
    protected $moduleName = 'butyrates';
    /**
     * This method can be used to enable/disable defaults. See setUpController in the docs for available options.
     */
    protected function setUpController(): void
    {
        $this->setPermalinkBase(permalinkBase: 'butyrate');
        $this->enableDuplicate();
        $this->withoutLanguageInPermalink();
    }

    protected function getLocalizedPermalinkBase(): array
    {
        return [
            'en' => 'butyrate',
            'nl' => 'butyrate',
            'tr' => 'butyrate',
        ];
    }
    public function getCreateForm(): Form
    {
        return Form::make([
            Input::make()
                ->name('title')
                ->label('Title')
                ->translatable()
                ->onChange('formatPermalink'),
            Select::make()
                ->name('template')
                ->label('Template')
                ->options(Butyrate::getTemplateOptions())
                ->default(Butyrate::DEFAULT_TEMPLATE),
            Input::make()
                ->name('slug')
                ->label(twillTrans('twill::lang.modal.permalink-field'))
                ->translatable()
                ->ref('permalink')
                ->prefix($this->getPermalinkPrefix($this->getPermalinkBaseUrl())),
       
        ]);
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
