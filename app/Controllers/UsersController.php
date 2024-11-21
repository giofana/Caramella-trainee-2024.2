<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class UsersController
{

    public function index()
    {
        $users = App::get('database')->selectAll('users');
        return view('admin/adm-tabela-usu', compact('$users'));

    }



    public function creat()
    {
        $parametros = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ];

        App::get('database')->insert('users', $parametros);
        return redirect('users');
    }

    public function users()
    {
        $users = App::get('database')->selectAll('users');
        return view('admin/adm-tabela-usu', compact('users'));
    }

    public function delete()
    {
        // Verifica se o ID foi enviado via POST e é um número válido
        if (isset($_POST['id']) && is_numeric($_POST['id'])) {
            $id = (int) $_POST['id']; // Converte para inteiro

            // Chama o método delete no QueryBuilder
            $result = App::get('database')->delete('users', $id);

            // Verifica se a exclusão deu certo
            if ($result) {
                // Redireciona para a pagina users
                return redirect('users');
            } else {
                // Se não foi possível excluir, exibe mensagem de erro
                echo "Erro ao excluir o usuário.";
            }
        } else {
            // Se o ID não for fornecido ou não for válido, exibe mensagem de erro
            echo "ID inválido ou não fornecido.";
        }
    }


}

?>