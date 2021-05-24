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

$router->get('/',['middleware' => 'auth' ,function () use ($router) {
    return $router->app->version();
}]);

$router->get('/jwtkey/{id}',['uses' => 'ExampleController@jwtkey']);

//$router->get('candidates', 'CandidatesController@create');

$router->group(['middleware' => 'auth','prefix' => 'v1'], function () use ($router) {
  $router->post('candidates',  ['uses' => 'CandidatesController@create']);
  $router->get('candidates', ['uses' => 'CandidatesController@listCandidate']);
  $router->post('candidates/search', ['uses' => 'CandidatesController@searchCandidate']);
  $router->get('candidates/{id}', ['uses' => 'CandidatesController@showCandidate']);
});

