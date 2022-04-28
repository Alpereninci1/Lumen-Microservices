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


$router->get('/patients','PatientController@index');
$router->post('patients','PatientController@store');
$router->get('patients/{patient}','PatientController@show');
$router->put('patients/{patient}','PatientController@update');
$router->patch('patients/{patient}','PatientController@show');
$router->delete('patients/{patient}','PatientController@destroy');

$router->get('/', function () use ($router) {
    return $router->app->version();
});
