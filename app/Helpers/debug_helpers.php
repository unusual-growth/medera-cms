<?php


$reflFunc = new \ReflectionFunction('config');
// print $reflFunc->getFileName() . ':' . $reflFunc->getStartLine();

if (!function_exists('find_function')) {
    /**
     * @param string $file
     * @return string
     */
    function find_function($func)
    {
        $refl = new \ReflectionFunction($func);

        return $refl->getFileName() . ':' . $refl->getStartLine();
    }
}