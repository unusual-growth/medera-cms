<?php

if (!function_exists('getSingleRelatedPageOfBlock')) {
    function getSingleRelatedPageOfBlock($block, $key="page", $show_dd=false)
    {
        $related = $block->getRelated($key);
        if ($related->isEmpty()){
            if($show_dd)
                dd($related, $block, $block->getRelated('page'), $block->getRelated('link'));
            return "#";
        }

        return $related->first()->getUri();
    }
}


function getImageFromSettings($group, $sub_group, $file)
{
    $field = A17\Twill\Facades\TwillAppSettings::getGroupDataForSectionAndName($group, $sub_group);
    return $field->image($file);
}

function generateOptionsFromConfig($conf): A17\Twill\Services\Forms\Options
{

    $options = [];
    foreach (config($conf) as $key => $value) {
        $options[] = A17\Twill\Services\Forms\Option::make($value['value'], $value['label']);
    }
    return A17\Twill\Services\Forms\Options::make($options);
}

if (!function_exists('getDraftInputs')) {
    function getDraftInputs($inputName) {

        if(config("draftInputs.$inputName") == null) {
            dd("Draft input $inputName not found");
        }
        return config("draftInputs.$inputName");
    }
}

if (!function_exists('getPredefinedInputs')) {
    function getPredefinedOptions($optionName, $inputName, $label) {
        $options = config("$optionName");
        if($options == null || count($options) == 0) {
            throw new \Exception("Predfined Option $optionName not found");
            dd("Predfined Option $optionName not found", $inputName, $label);
        }

        $inputOptions = [];
        foreach($options as $key => $value) {
            $inputOptions[] = A17\Twill\Services\Forms\Option::make($key, $value);
        }
        $input = A17\Twill\Services\Forms\Fields\Select::make()
            ->name($inputName)
            ->label($label)
            ->options(
                A17\Twill\Services\Forms\Options::make($options)
            );
        return $input;
    }
}

if (!function_exists('getAdminPage')) {
    function getAdminPage($page) {

        return env('ADMIN_APP_URL', env('APP_URL') . '/admin') . $page;
    }
}
