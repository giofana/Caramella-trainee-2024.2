<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class SiteController
{

    public function visuindivi(){

        $id = $_GET['id'];
        $users = App::get('database')->select('users', $id);
        $posts = App::get('database')->selectAll('posts', $id);

        return view('site/visu-indivi', compact('posts', 'users'));
    }


}
?>