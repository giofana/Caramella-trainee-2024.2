<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class UserController
{

    public function users()
    {
        $users = App::get('database')->selectALL('users');
        return view('admin/adm-tabela-usu.php', compact('users'));
    }

    public function delete()
    {
        // Obtém o ID enviado via POST
        $id = $_POST['id'];

        // Executa a exclusão do usuário no banco de dados
        App::get('database')->delete('users', $id);

        // Redireciona para a página de usuários após a exclusão
    }
}
?>
