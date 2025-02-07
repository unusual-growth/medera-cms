<?php
namespace App\Models\Behaviours;

trait HasLocalizedRoute {
    public $slugKey;
    public $routeName;

    public function getLocalizedUriWithRoute($locale)
    {
        return route($this->routeName, [$this->slugKey => $this->getSlug($locale)], false);
    }
}
