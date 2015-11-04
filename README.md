在 Laravel 5.* 的版本中，使用 Pjax 实现无刷新效果，以及酷炫的进度条


### 安装

1.在 `composer.json` 的 require里 加入

`"yuanchao/pjax-for-laravel-5":"dev-master"` 接着执行 `composer update`

or

执行 `composer require "larry666/pjax-for-laravel-5":"dev-master"`


2.在`config/app.php` 的 `providers` 数组添加

`Pluigns\Pjax\PjaxServiceProvider::class`

3.在 `app/Http/Kernel.php` 的 `$middleware` 数组添加

`Pluigns\Pjax\PjaxMiddleware::class`


4.执行 `php artisan vendor:publish` 将视图/脚本文件拷贝到相应目录


### 使用

`先引入 jquery.js`

在`布局`文件中，插入以下代码

```
@include('common.pjax')

```

