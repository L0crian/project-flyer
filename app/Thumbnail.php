<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 30.06.2017
 * Time: 17:32
 */

namespace App;

use Image;

class Thumbnail
{
    public function make($src, $destination)
    {
        Image::make($src)
            ->fit(200)
            ->save($destination);
    }
}