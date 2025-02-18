<?php

namespace App\Providers;

use A17\Twill\Facades\TwillAppSettings;
use A17\Twill\Facades\TwillNavigation;
use A17\Twill\Services\Settings\SettingsGroup;
use A17\Twill\View\Components\Navigation\NavigationLink;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Jenssegers\Agent\Facades\Agent;;

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
        Vite::prefetch();
        TwillNavigation::addLink(
            NavigationLink::make()
            ->title(title:__('backend.page'))
            ->forModule('pages')
        );

        TwillNavigation::addLink(
            NavigationLink::make()->title(title:__('backend.butyrates'))->forModule('butyrates')
        );

        TwillNavigation::addLink(
            NavigationLink::make()->title(title:__('backend.whoweare'))->forModule('whoweare')
        );
        TwillNavigation::addLink(
            NavigationLink::make()->title(title:__('backend.how-we-work'))->forModule('how-we-work')
        );
        TwillNavigation::addLink(
            NavigationLink::make()->title("Blog Categories")->forModule('blogCategories')
        );

        TwillNavigation::addLink(
            NavigationLink::make()
            ->title(title: Str::ucfirst(string: __('backend.articles')))
            ->forModule('articles')
        );

        TwillNavigation::addLink(
            NavigationLink::make()
            ->title("FAQs")
            ->forModule('faqs')
        );

        TwillNavigation::addLink(
            NavigationLink::make()->forModule('menulinks')
        );

        TwillAppSettings::registerSettingsGroups(
            SettingsGroup::make()->name('homepage')->label('Homepage'),
            SettingsGroup::make()
            ->name('site-settings')
            ->label("Site settings"),
            SettingsGroup::make()
            ->name('social-media-settings')
            ->label(Str::ucfirst(string: __('backend.socialMediaSettings'))),
            SettingsGroup::make()
            ->name('footer-settings')
            ->label(Str::ucfirst(string: __('backend.footerSettings'))),
            SettingsGroup::make()
            ->name('custom-scripts')
            ->label(Str::ucfirst(string: __('backend.customScripts'))),
            SettingsGroup::make()
            ->name('static-pages')
            ->label(Str::ucfirst(string: __('backend.staticPages'))),
            SettingsGroup::make()->name('seo')->label(trans('twill-metadata::form.titles.fieldset')),
            SettingsGroup::make()->name('forms')->label('Form Settings'),
        );
        view()->share('agent', Agent::getUserAgent());
        view()->share('isMobile', Agent::isMobile());
        view()->share('isTablet', Agent::isTablet());

        try {
            view()->share('logos', TwillAppSettings::getGroupDataForSectionAndName('site-settings','logos'));
        } catch (\Throwable $th) {
            view()->share('logos', []);
        }
        try {
            view()->share('social_links_block', TwillAppSettings::get('social-media-settings.links.social-media-link') ?? []);
        } catch (\Throwable $th) {
            view()->share('social_links_block', []);
        }

    }
}
