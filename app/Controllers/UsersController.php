<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class UsersController
{


    //usado na paginacao
    public function index()
    {

        $page = 1;
        if(isset($_GET['paginacaoNumero']) && !empty($_GET['paginacaoNumero'])){
            $page = intval($_GET['paginacaoNumero']);

            if($page <= 0 ){
                return redirect('admin/adm-tabela-usu');

            }

        }

        $itensPage = 5;
        $inicio = $itensPage * $page - $itensPage;
        $count = App::get('database')-> countAll('users');

        if($inicio > $count){
            return redirect('admin/adm-tabela-usu');
        }

        $users = App::get('database')->selectAll('users', $inicio, $itensPage);

        $total_pages = ceil($count/$itensPage);
        return view('admin/adm-tabela-usu', compact('users', 'page', 'total_pages', 'inicio'));

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

    public function edit()
    {
        try {
            if (isset($_POST['id']) && is_numeric($_POST['id'])) {
                $id = (int) $_POST['id'];

                // atribui os novos valores
                $parametros = [
                    'name' => $_POST['name'],
                    'email' => $_POST['email'],
                ];

                if (!empty($_POST['password'])) { // Verifica se tem uma senha sendo enviada
                    $parametros['password'] = $_POST['password'];
                }

                $result = App::get('database')->edit('users', $id, $parametros);

                if ($result) {
                    return redirect('users');
                } else {
                    echo "Erro ao editar o usuário.";
                }
            } else {
                echo "ID inválido ou não fornecido.";
            }
        } catch (Exception $e) {
            // Exibe a mensagem de erro capturada
            die("Erro capturado: " . $e->getMessage());
        }
    }

    

    public function footer(){
        return view ('site/footer');
    }

    public function minfos(){
        return view ('site/mais-infos');
    }

}
?>