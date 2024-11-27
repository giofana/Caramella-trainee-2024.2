<?php

namespace App\Controllers;
use App\Controllers\ExampleController;
use App\Core\Router;

    $router->get('posts-list', 'PostsController@index');
    $router->post('posts-list/edit-post', 'PostsController@edit');
    $router->post('posts-list/delete', 'PostsController@delete');
    $router->get('posts-list/view-post', 'PostsController@viewPostAdmin');
    $router->post('posts-list/create', 'PostsController@createPost');

?>