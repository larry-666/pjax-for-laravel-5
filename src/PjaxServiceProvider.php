<?php

namespace Plugins\Pjax;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class PjaxServiceProvider extends ServiceProvider
{
    /**
     * 把 视图/脚本 文件注册到对应目录
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/views', 'pjax');
        $this->publishes([
            __DIR__ . '/views' => base_path('resources/views/common'),
        ]);
        $this->publishes([
            __DIR__ . '/pjax' => base_path('public/plugins/pjax'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }
}