<?php

namespace App\Providers;

use A17\Twill\Facades\TwillNavigation;
use A17\Twill\View\Components\Navigation\NavigationLink;
use Illuminate\Support\ServiceProvider;
use Jenssegers\Agent\Facades\Agent;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->loadHelpers();
    }
    protected function loadHelpers()
    {
        foreach (glob(__DIR__.'/../Helpers/*.php') as $filename)
        {
            require_once $filename;
        }
    }
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        TwillNavigation::addLink(
            NavigationLink::make()
            ->title(title:__('backend.homepage'))
            ->forSingleton('homepage')
        );

        view()->share('agent', Agent::getUserAgent());
        view()->share('isMobile', Agent::isMobile());
        view()->share('isTablet', Agent::isTablet());
    }
}
