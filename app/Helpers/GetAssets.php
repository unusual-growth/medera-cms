<?php

function getImgAssets($asset, $folder = '')
{
    return asset('assets/img/' . $folder .$asset);
}
function getVideoAssets($asset, $folder = '')
{
    return asset('assets/video/' . $folder .$asset);
}
