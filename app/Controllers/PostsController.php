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

    // TODO: arrumar autor
    public function edit(){
        $id = $_POST['editId'];
        $file = $_FILES['editImagem'];
        $extensao = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));

        App::get('database')->verificaExtensao($extensao);
        App::get('database')->verificaErroUpload($file);
        $img = App::get('database')->uploadImage($file, $id);

        $parameters = [
            'title' => $_POST['editTitulo'],
            'author' => $_POST['editAutor'],
            'cost' => $_POST['editCusto'],
            'difficulty' => $_POST ['editDificuldade'],
            'time' => $_POST['editTempo'],
            'history' => $_POST['editHistoria'],
            'prepare' => $_POST['editPreparo'],
            'image' => $img,
            'ingredients' => $_POST['editIngrediente'],
        ];

        App::get('database')->update('posts', $id, $parameters);
        header('Location: /posts-list');
    }

    public function delete(){
        $id = $_POST['idDelete'];

        App::get('database')->delete('posts', $id);
        header('Location: /posts-list');
    }

    // TODO: fix autor para autor logado e imagem
    public function createPost(){
        $file = $_FILES['imagem-receita'];
        $extensao = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));

        App::get('database')->verificaExtensao($extensao);
        App::get('database')->verificaErroUpload($file);
        $img = App::get('database')->uploadImage($file, 0);

        $parameters = [
            'title' => $_POST['titulo-receita'],
            'author' => "1",
            'cost' => $_POST['custo-receita'],
            'difficulty' => $_POST ['dificuldade-receita'],
            'time' => $_POST['tempo-receita'],
            'history' => $_POST['historia-receita'],
            'prepare' => $_POST['modo-receita'],
            'image' => "$img",
            'ingredients' => $_POST['ingredientes-receita'],
        ];

        App::get('database')->insert('posts', $parameters);
        header('Location: /posts-list');

    }

    // public function cancel(){
    //     header('Location: /posts-list');
    //     exit;

    // }
}

?>