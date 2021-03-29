<?php

namespace App\Controllers;


use App\Repository\EmbraespTableRepository;

class Home extends App
{

    public function __construct()
    {
//        parent::__construct();

//      new Reader("files/residenciais2018.xls");
    }

    public function index(){
        $this->render();

    }

}