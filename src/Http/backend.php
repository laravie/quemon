<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => 'quemon'], function (Router $router) {
    $router->get('{id}/retry', 'QueueController@retry');
    $router->get('/', 'QueueController@index');
});
