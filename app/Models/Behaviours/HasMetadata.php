<?php

namespace App\Models\Behaviours;

use A17\Twill\Facades\TwillAppSettings;

trait HasMetadata {
    use \CwsDigital\TwillMetadata\Models\Behaviours\HasMetadata {
        getSocialImageAttribute as getSocialImageAttributeVendor;
    }
    public function getSocialImageAttribute()
    {
        if ($this->hasImage('og_image')) {
            return $this->socialImage('og_image');
        } elseif ($this->hasSpecifiedMetaFallbackImage('og_image')) {
            return $this->getSpecifiedMetadataFallbackImage('og_image');
        } else if (TwillAppSettings::getGroupDataForSectionAndName('seo', 'metadata')->hasImage('default_social_image', 'default')) {
            return TwillAppSettings::getGroupDataForSectionAndName('seo', 'metadata')->image('default_social_image', 'default');
        } elseif ($this->hasAnyImages()) {
            return $this->getDefaultMetadataFallbackImage();
        } else {
            return null;
        }
    }
}
