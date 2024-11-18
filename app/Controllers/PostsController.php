<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class PostsController
{

    public function index()
    {
        // retornando todos os posts da tabela de posts
        $posts = App::get('database')->selectAll('posts');
        return view('admin/posts-page', compact('posts'));
    }

    public function edit(){
        $parameters = [
            'title' => $_POST['editTitulo'],
            'author' => $_POST['editAutor'],
            'cost' => $_POST['editCusto'],
            'difficulty' => $_POST ['editDificuldade'],
            'time' => $_POST['editTempo'],
            'history' => $_POST['editHistoria'],
            'prepare' => $_POST['editPreparo'],
            'image' => $_POST['editImagem'],
            'ingredients' => $_POST['editIngrediente'],
        ];
        $id = $_POST['editId'];

        App::get('database')->update('posts', $id, $parameters);
        header('Location: /posts-list');
    }

    public function delete(){
        $id = $_POST['idDelete'];

        App::get('database')->delete('posts', $id);
        header('Location: /posts-list');
    }
}

?>