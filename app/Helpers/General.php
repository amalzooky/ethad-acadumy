<?php

use Illuminate\Support\Facades\Config;


function uploadImage($folder, $image)
{
    $image->store('/', $folder);
    $filename = $image->hashName();
    $path = 'upimages/' . $folder . '/' . $filename;
    return $path;

}
function uploadFiles($folder, $files)
{
    $files->store('/', $folder);
    $filename = $files->hashName();
    $path = 'uploads/' . $folder . '/' . $filename;
    return response()->file($path);
    // return Storage::response($path);

}



function uploadVideo($folder, $video)
{
    $video->store('/', $folder);
    $filename = $video->hashName();
    $path = 'video/' . $folder . '/' . $filename;
    return $path;
}


