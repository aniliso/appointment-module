<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/appointment'], function (Router $router) {
    $router->bind('appointment', function ($id) {
        return app('Modules\Appointment\Repositories\AppointmentRepository')->find($id);
    });
    $router->get('appointments', [
        'as' => 'admin.appointment.appointment.index',
        'uses' => 'AppointmentController@index',
        'middleware' => 'can:appointment.appointments.index'
    ]);
    $router->get('appointments/create', [
        'as' => 'admin.appointment.appointment.create',
        'uses' => 'AppointmentController@create',
        'middleware' => 'can:appointment.appointments.create'
    ]);
    $router->post('appointments', [
        'as' => 'admin.appointment.appointment.store',
        'uses' => 'AppointmentController@store',
        'middleware' => 'can:appointment.appointments.create'
    ]);
    $router->get('appointments/{appointment}/edit', [
        'as' => 'admin.appointment.appointment.edit',
        'uses' => 'AppointmentController@edit',
        'middleware' => 'can:appointment.appointments.edit'
    ]);
    $router->put('appointments/{appointment}', [
        'as' => 'admin.appointment.appointment.update',
        'uses' => 'AppointmentController@update',
        'middleware' => 'can:appointment.appointments.edit'
    ]);
    $router->delete('appointments/{appointment}', [
        'as' => 'admin.appointment.appointment.destroy',
        'uses' => 'AppointmentController@destroy',
        'middleware' => 'can:appointment.appointments.destroy'
    ]);
// append

});
