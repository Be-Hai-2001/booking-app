<?php

namespace App\Providers;


use App\Services\Implement\KhachSanImplement;
use App\Services\Interfaces\GetObjectInterface;
use App\Services\Interfaces\SettingInterface;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Khách sạn
        $this->app->bind(SettingInterface::class,KhachSanImplement::class);
        $this->app->bind(GetObjectInterface::class,KhachSanImplement::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       // Paginator::useBootstrap();
    }
}
