<?php

namespace App\Http\Controllers\Twill;

use A17\Twill\Http\Controllers\Admin\NestedModuleController as BaseModuleController;
use A17\Twill\Models\Contracts\TwillModelContract;
use A17\Twill\Services\Forms\Fields\Browser;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Fields\Select;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Services\Forms\Option;
use A17\Twill\Services\Forms\Options;
use App\Models\Butyrate;
use App\Models\CompanyEstablishment;
use App\Models\EmployerService;
use App\Models\HowWeWork;
use App\Models\Page;
use App\Models\Whoweare;

class MenulinkController extends BaseModuleController
{
    protected $moduleName = 'menulinks';
    protected $showOnlyParentItemsInBrowsers = true;
    protected $nestedItemsDepth = 1;

    /**
     * See the table builder docs for more information. If you remove this method you can use the blade files.
     * When using twill:module:make you can specify --bladeForm to use a blade form instead.
     */
    public function getForm(TwillModelContract $model): Form
    {
        $form = parent::getForm($model);
        $form->add(Browser::make()->name('page')->modules([Page::class, Whoweare::class, Butyrate::class, HowWeWork::class])->label('Page'));
        $form->add(
            Input::make()
                ->name('custom_url')
                ->label('Custom URL')
                ->type('text')
                ->translatable()
        );
        $form->add(Select::make()
            ->name('location')
            ->options(
                Options::make([
                    Option::make('header', 'Header'),
                    Option::make('footer', 'Footer 1'),
                    Option::make('footer2', 'Footer 2'),
                    Option::make('footer3', 'Footer 3'),
                ])
            )->required()
            ->default(default: 'header'));
        return $form;
    }

    /**
     * This method can be used to enable/disable defaults. See setUpController in the docs for available options.
     */
    protected function setUpController(): void
    {
        $this->disablePermalink();
        $this->enableReorder();
    }

}
