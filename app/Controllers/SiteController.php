<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class SiteController
{

    public function vdpi(){

        $id = $_GET['id-post'];
        if(!isset ($id)){
            header('location:/posts');
        }
        $users = App::get('database')->select('users', $id);
        $posts = App::get('database')->select('posts', $id);

        return view('site/visu-indivi', compact('posts', 'users'));
    }


    // TODO: colocar em controller separado
    public function viewPosts($itensView = 6)
    {
        $page = 1;
        $search = '';

        if (isset($_GET['paginaLista']) && !empty($_GET['paginaLista'])) {
            $page = intval($_GET['paginaLista']);
            if ($page <= 0) {
                header('Location: /posts');
                exit();
            }
        }

        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
        }

        $startPage = $itensView * $page - $itensView;
        $rowsCount = App::get('database')->countAll('posts', $search);
        $total_pages = ceil($rowsCount / $itensView);

        if ($total_pages == 0) {
            $total_pages = 1;
        }

        if ($page > $total_pages) {
            header('Location: /posts');
            exit();
        }

        $posts = App::get('database')->searchPosts('posts', $startPage, $itensView, $search);

        return view('site/posts-page-user', compact('posts', 'page', 'total_pages', 'startPage', 'search'));
    }


}
?>