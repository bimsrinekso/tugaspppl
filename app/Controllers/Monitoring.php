<?php

namespace App\Controllers;

class Monitoring extends BaseController
{
    public function index(){
        return view('Dashboard/Monitoring/index');
    }

     public function detailPost(){
        return view('Dashboard/Monitoring/detailPost');
    }
    
    public function detailCallback(){
        return view('Dashboard/Monitoring/detailCallback');
    }

    public function updateError(){
        return view('Dashboard/Monitoring/editError');
    }

    public function saveError(){

    }
}
