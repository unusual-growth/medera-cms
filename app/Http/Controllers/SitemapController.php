<?php

namespace App\Http\Controllers;

use A17\Twill\Facades\TwillAppSettings;
use A17\Twill\Services\FileLibrary\FileService;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function sitemap()
    {
    $setting_block =TwillAppSettings::getGroupDataForSectionAndName('static-pages','success');

        $file = TwillAppSettings::getGroupDataForSectionAndName('seo', 'sitemap')->fileObject('file');

        if (empty($file)) {
            abort(404);
        }

        $path = storage_path('app/public/uploads/' . $file->uuid);
        // dd($path, file_exists($path));
        if (!file_exists($path)) {
            abort(404);
        }

        return response()->file(
            $path,
            [
                'Content-Type' => 'application/xml',
                'Content-Disposition' => 'inline; filename="sitemap.xml"'
            ]
        );
    }
}
