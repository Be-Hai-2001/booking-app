<?php

namespace App\Providers;

use App\Services\Implement\ImageImplement;
use App\Services\Interfaces\GetObjectInterface;
use App\Services\Interfaces\SettingInterface;
use Illuminate\Support\ServiceProvider;

class ImagesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
          //  Hình ảnh
        // $this->app->bind(SettingInterface::class,ImageImplement::class);
        // $this->app->bind(GetObjectInterface::class,ImageImplement::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
