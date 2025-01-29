<?php

function getSlugRoute($route_name, $slug)
{
    // dd($route_name, $slug);
    return route($route_name, ['slug' => $slug]);
}

function getRoute($route) {
    if($route->is_external) {
        return $route->url;
    } else {
        return getSlugRoute($route->route_name, $route->slug);
    }
}

function getModuleUri($module) {
    return $module->getUri();
}
