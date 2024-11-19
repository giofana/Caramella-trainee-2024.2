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
}

?>