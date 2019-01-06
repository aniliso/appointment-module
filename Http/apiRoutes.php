<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->group(['prefix' => 'appointment'], function (Router $router) {
    $router->post('create', [
        'as'         => 'api.appointment.create',
        'uses'       => 'PublicController@create'
    ]);
});
