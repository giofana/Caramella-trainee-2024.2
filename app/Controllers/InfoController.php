<?php

namespace App\Controllers;

error_reporting(E_ERROR | E_PARSE);

class InfoController
{
    public function show()
    {
        return view('site/mais-infos');
    }
}

?>