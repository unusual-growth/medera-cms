<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;

function getConfig( $conf)
{
    if(config($conf) == null)
    abort(404, 'Config not found');

    setTranslationsKeys($conf,config($conf));
    return arrayToObject(Config::get($conf));
}
function getConfigArray( $conf)
{
    if(config($conf) == null)
        abort(404, 'Config not found');

    setTranslationsKeys($conf,config($conf));
    return Config::get($conf);
}


function varexport($expression, $return = false) {
    if (!is_array($expression)) {
        return var_export($expression, $return);
    }

    $export = var_export($expression, true);
    $export = preg_replace("/^([ ]*)(.*)/m", '$1$1$2', $export);
    $array = preg_split("/\r\n|\n|\r/", $export);

    $filteredArray = [];
    $index = 0;
    foreach ($array as $line) {
        if (preg_match('/^\s*\[\s*(\d+)\s*\]\s*=>/', $line, $matches)) {
            $filteredArray[] = $matches[1] . ' =>';
        } else {
            $filteredArray[] = $line;
        }
    }

    $filteredArray = preg_replace(["/\s*array\s\($/", "/\)(,)?$/", "/\s=>\s$/"], [NULL, ']$1', ' => ['], $filteredArray);
    $export = join(PHP_EOL, array_filter(["["] + $filteredArray));

    if ($return) {
        return $export;
    } else {
        echo $export;
    }
}

function customVarExport($array, $indent = 0) {
    $output = str_repeat(' ', $indent * 4) . "[\n";

    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $output .= str_repeat(' ', ($indent + 1) * 4) . "'$key' => " . customVarExport($value, $indent + 1) . ",\n";
        } else {
            $output .= str_repeat(' ', ($indent + 1) * 4) . "'$key' => '$value',\n";
        }
    }

    $output .= str_repeat(' ', $indent * 4) . "]";
    return $output;
}

function searchTranslations($array, &$translations = [], $before_key = ''){
    $pattern_strings = [
        'content',
        'contents',
        'text',
        'texts',
        'tab_buttons',
        // 'alt',
        'heading',
        'title',
        'description',
        'items',
        'label',
    ];
    $pattern = "/" . implode('|', $pattern_strings) . "/";

    foreach($array as $key => $value){
        if(preg_match($pattern, $key)){
            if(is_string($value)){
                //clean html tags from $value
                // $value = strip_tags($value);
                $translations[] = [
                    'notation' => $before_key.".".$key,
                    'value' => $value,
                    'slug' => \Illuminate\Support\Str::slug(strip_tags($value))
                ];
            }else if(is_array($value)){
                searchTranslations($value, $translations, ($before_key !== '' ? $before_key ."." : '').$key);
            }
        }else if(is_array($value)){
            searchTranslations($value, $translations, ($before_key !== '' ? $before_key ."." : '').$key);
        }

        // go_live_uctan_uca_sap_partneri_olarak
    }

    return $translations;
}

function setTranslationsKeys($page, $array, &$translations = [], $before_key = ''){
    $pattern_strings = [
        'content',
        'contents',
        'text',
        'texts',
        'tab_buttons',
        // 'alt',
        'heading',
        'title',
        'description',
        'items',
        'label',
        'value'
    ];
    $pattern = "/" . implode('|', $pattern_strings) . "/";
    foreach($array as $key => $value){
        if(preg_match($pattern, $key)){
            if(is_string($value)){
                Config::set($page.'.'.$before_key.".".$key, __($value));
            }else if(is_array($value) && !is_associative($value)){
                foreach($value as $j => $el){
                    if(is_string($el)){
                        // dd(
                        //     Config::get($page.'.'.$before_key.".".$key),
                        //     $j,
                        //     Config::get($page.'.'.$before_key.".".$key.".".$j),
                        //     $value,
                        //     $page.'.'.$before_key.".".$key.".".$j
                        // );
                        Config::set($page.'.'.$before_key.".".$key.".".$j, __(Config::get($page.'.'.$before_key.".".$key.".".$j)));
                    }
                }
            }

            if(is_array($value)){
                setTranslationsKeys($page, $value, $translations, ($before_key !== '' ? $before_key ."." : '').$key);

            }
        }else if(is_array($value)){
            setTranslationsKeys($page, $value, $translations, ($before_key !== '' ? $before_key ."." : '').$key);
        }

        // go_live_uctan_uca_sap_partneri_olarak
    }

    return $translations;
}

function is_associative($array) {
    return count(array_filter(array_keys($array), 'is_string')) > 0;
}

function generateID(String $pre) {
    return $pre . mt_rand(1000,9999);
}
