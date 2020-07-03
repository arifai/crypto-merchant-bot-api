<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// Generate app key
$router->get('/key', function () {
    return \Illuminate\Support\Str::random(64);
});

// Users group
$router->group(['prefix' => 'user'], function () use ($router) {
    $router->get('/list', 'UsersController@index');
    $router->post('/add', 'UsersController@add');
    $router->get('/find/{id}', 'UsersController@find');
    $router->put('/update/{id}', 'UsersController@update');
    $router->delete('/delete/{id}', 'UsersController@delete');
    $router->get('/count', 'UsersController@count');
    $router->get('/count/status', 'UsersController@countStatus');
});
