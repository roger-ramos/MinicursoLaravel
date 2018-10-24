<?php

namespace App\Providers;

use Illuminate\Routing\UrlGenerator as UrlGeneratorOriginal;

class UrlGenerator extends UrlGeneratorOriginal
{
    public function asset($path, $secure = null)
    {
        return parent::asset("public/{$path}", $secure);
    }
};