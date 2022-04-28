<?php

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


/**
 * Routes for patients
 */
$router->get('/patients', 'PatientController@index');
$router->post('/patients', 'PatientController@store');
$router->get('/patients/{patient}', 'PatientController@show');
$router->put('/patients/{patient}', 'PatientController@update');
$router->patch('/patients/{patient}', 'PatientController@update');
$router->delete('/patients/{patient}', 'PatientController@destroy');


/*jwt*/
$router->post('login', 'AuthController@login');
$router->post('logout', 'AuthController@logout');
$router->post('register', 'AuthController@register');
$router->post('refresh', 'AuthController@refresh');
$router->get('me', 'AuthController@me');



$router->get('/', function () use ($router) {
    return $router->app->version();
});




