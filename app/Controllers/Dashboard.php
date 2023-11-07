<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
     public function Index()
     {
         return view('Dashboard/index');
     }
}