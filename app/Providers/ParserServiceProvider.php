<?php

namespace App\Providers;

// use App\Service\ParserService;
use Illuminate\Support\ServiceProvider;

class ParserServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('Parser', 'App\Service\ParserService');

    }
    
}
