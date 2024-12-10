<?php

namespace App\Controllers;
use App\Controllers\x;
use App\Core\Router;


// ROTAS POSTS (TABELA ADM)
    $router->get('posts-list', 'PostsController@index');
    $router->post('posts-list', 'PostsController@index');
    $router->post('posts-list/edit-post', 'PostsController@edit');
    $router->post('posts-list/delete', 'PostsController@delete');
    $router->get('posts-list/view-post', 'PostsController@viewPostAdmin');
    $router->post('posts-list/create', 'PostsController@createPost');


// ROTAS USERS (TABELA ADM)
    $router->get('users', 'UsersController@index');
    $router->post('users','UsersController@index');
    $router->post('creat', 'UsersController@creat');
    $router->post('delete', 'UsersController@delete');
    $router->post('edit', 'UsersController@edit');


// ROTAS DASHBOARD (ADM)
    $router->get('dashboard', 'UsersController@exibirDashboard');
    $router->post('logout', 'UsersController@logout');


// ROTAS LOGIN
    $router->get('login', 'UsersController@exibirLogin');
    $router->post('login', 'UsersController@efetuaLogin');


// ROTAS VISUALIZAÇÃO INDIVIDUAL DE POSTS
    $router->get('vdpi', 'SiteController@vdpi');
    $router->post('vdpi', 'SiteController@vdpi');


//PÁGINAS PUBLICAS
    $router->get('footer', 'UsersController@footer');

    $router->get('minfos', 'UsersController@minfos');

    $router->get('landing-page', 'PostsController@exibirLandingPage');

    $router->get('posts', 'SiteController@viewPosts');

    $router->get('contato', 'InfoController@show');

?>