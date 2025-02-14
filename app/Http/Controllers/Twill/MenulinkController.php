<?php

namespace App\Http\Controllers\Twill;

use App\Models\Page;
use App\Models\Butyrate;
use App\Models\Whoweare;
use App\Models\EmployerService;
use A17\Twill\Facades\TwillUtil;
use Faker\Provider\ar_EG\Company;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Services\Forms\Option;
use App\Models\CompanyEstablishment;
use A17\Twill\Services\Forms\Options;
use A17\Twill\Facades\TwillAppSettings;
use A17\Twill\Services\Forms\Fields\Select;
use A17\Twill\Services\Forms\Fields\Browser;
use A17\Twill\Models\Contracts\TwillModelContract;
use A17\Twill\Http\Controllers\Admin\NestedModuleController as BaseModuleController;

class MenulinkController extends BaseModuleController
{
    protected $moduleName = 'menulinks';
    protected $showOnlyParentItemsInBrowsers = true;
    protected $nestedItemsDepth = 1;
    /**
     * This method can be used to enable/disable defaults. See setUpController in the docs for available options.
     */
    protected function setUpController(): void
    {
        $this->disablePermalink();
        $this->enableReorder();
    }

    /**
     * See the table builder docs for more information. If you remove this method you can use the blade files.
     * When using twill:module:make you can specify --bladeForm to use a blade form instead.
     */
    public function getForm(TwillModelContract $model): Form
    {
        $form = parent::getForm($model);
        $form->add(Browser::make()->name('page')->modules([Page::class, Whoweare::class, Butyrate::class])->label('Page'));
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

}
