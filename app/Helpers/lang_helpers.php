<?php

use Doctrine\Inflector\InflectorFactory;
use Illuminate\Support\Facades\App;

if (!function_exists('trans_plural')) {
    /**
     * @param string $file
     * @return string
     */
    function trans_plural($key, $choice = null)
    {
        // dd(app()->getLocale());
        // if($choice !== null )
        //     dd(trans_choice($key, $choice));
        // if($key == 'twill.sidebar.module')
        //     dd(App::getLocale(), InflectorFactory::createForLanguage(get_inflector_language(App::getLocale()))
        //     ->build()
        //     ->pluralize( $choice === null ? __($key) : trans_choice($key, $choice) ));
        return InflectorFactory::createForLanguage(get_inflector_language(App::getLocale()))
            ->build()
            ->pluralize( $choice === null ? __($key) : trans_choice($key, $choice) );
    }
}

if (!function_exists('get_inflector_language')) {
    /**
     * @param string $locale locale code
     * @return string
     */
    function get_inflector_language($locale)
    {
        $language = 'english';

        switch ($locale) {
            case 'tr':
                $language = 'turkish';
                break;
            case 'fr':
                $language = 'french';
                break;
            case 'nb':
                $language = 'norwegian-bokmal';
                break;
            case 'pt':
                $language = 'portequese';
                break;
            case 'es':
                $language = 'spanish';
                break;
            default:
                // $la
                break;
        }

        return $language;
    }
}


