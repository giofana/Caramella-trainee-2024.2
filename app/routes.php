<?php

namespace App\Controllers;
use App\Controllers\UsersController;
use App\Core\Router;

    $router->get('posts-list', 'PostsController@index');
    $router->post('posts-list/edit-post', 'PostsController@edit');
    $router->post('posts-list/delete', 'PostsController@delete');
    $router->get('posts-list/view-post', 'PostsController@viewPostAdmin');
    $router->post('posts-list/create', 'PostsController@createPost');

    $router->get('users', 'UsersController@users');

    $router->post('creat', 'UsersController@creat');
    $router->post('delete', 'UsersController@delete');
    $router->post('edit', 'UsersController@edit');

    $router->get('dashboard', 'UsersController@exibirDashboard');
    $router->get('login', 'UsersController@exibirLogin');
    $router->post('login', 'UsersController@efetuaLogin');
    $router->post('logout', 'UsersController@logout');

    $router->get('landing-page', 'PostsController@exibirLandingPage');

?>