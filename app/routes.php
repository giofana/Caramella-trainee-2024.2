<?php

namespace App\Controllers;
use App\Controllers\UserController;
use App\Core\Router;

    $router->get('', 'ExampleController@index');
    $router->get('users', 'UserController@users');

    $router->post('delete', "UserController@delete")
?>