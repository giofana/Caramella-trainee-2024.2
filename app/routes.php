<?php

namespace App\Controllers;
use App\Controllers\UsersController;
use App\Core\Router;


    $router->get('users', 'UsersController@users');
    
    $router->post('creat', 'UsersController@creat');
    $router->post('delete', 'UsersController@delete');

?>