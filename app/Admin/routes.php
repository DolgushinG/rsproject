<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {
    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('/categories', CategoryController::class);
    $router->resource('/users', UserController::class);
    $router->resource('/feedback', FeedbackContoller::class);
    $router->resource('/events', EventController::class);
    $router->resource('/subscriptionUser', SubscriptionUserController::class);
});
