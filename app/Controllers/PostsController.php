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
        $temporario = $_FILES['editImagem']['tmp_name'];
        $nomeimagem =  sha1(uniqid($_FILES['editImage']['name'], true)) . '.' . pathinfo($_FILES['editImage']['name'], PATHINFO_EXTENSION);
        $destinoimagem = "public/imagens/";
        move_uploaded_file($temporario, $destinoimagem . $nomeimagem);
        $caminhodaimagem = "public/imagens/" . $nomeimagem;

        $parameters = [
            'title' => $_POST['editTitulo'],
            'author' => $_POST['editAutor'],
            'cost' => $_POST['editCusto'],
            'difficulty' => $_POST ['editDificuldade'],
            'time' => $_POST['editTempo'],
            'history' => $_POST['editHistoria'],
            'prepare' => $_POST['editPreparo'],
            'image' => $caminhodaimagem,
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

    // TODO: fix autor para autor logado e imagem
    public function createPost(){
        $temporario = $_FILES['imagem-receita']['tmp_name'];
        $nomeimagem =  sha1(uniqid($_FILES['imagem-receita']['name'], true)) . '.' . pathinfo($_FILES['imagem-receita']['name'], PATHINFO_EXTENSION);
        $destinoimagem = "public/imagens/";
        move_uploaded_file($temporario, $destinoimagem . $nomeimagem);
        $caminhodaimagem = "public/imagens/" . $nomeimagem;


        $parameters = [
            'title' => $_POST['titulo-receita'],
            'author' => 1,
            'cost' => $_POST['custo-receita'],
            'difficulty' => $_POST ['dificuldade-receita'],
            'time' => $_POST['tempo-receita'],
            'history' => $_POST['historia-receita'],
            'prepare' => $_POST['modo-receita'],
            'image' => $caminhodaimagem,
            'ingredients' => $_POST['ingredientes-receita'],
        ];

        App::get('database')->insert('posts', $parameters);
        header('Location: /posts-list');

    }
}

?>