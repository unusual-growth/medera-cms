<?php

use Illuminate\Support\Str;

// print $reflFunc->getFileName() . ':' . $reflFunc->getStartLine();

if (!function_exists('md2html')) {
    /**
     * @param string $file
     * @return string
     */
    function md2html($path)
    {
        return Str::markdown( file_get_contents($path) );
    }
}


function addClassToTags($content, $classToAdd = '') {
    $pattern = '/<(p|h[1-6])(\s+[^>]*)?>/i';

    return preg_replace_callback($pattern, function($matches) use ($classToAdd) {
        $tag = $matches[1];
        $attributes = $matches[2] ?? '';

        if (Str::contains($attributes, 'class=')) {
            // If class attribute already exists, add to it
            $attributes = preg_replace('/class=(["\'])([^"\']*)\1/', 'class=$1$2 ' . $classToAdd . '$1', $attributes);
        } else {
            // If no class attribute, add it
            $attributes .= ' class="' . $classToAdd . '"';
        }

        return "<{$tag}{$attributes}>";
    }, $content);
}
