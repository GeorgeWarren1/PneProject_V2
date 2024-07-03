<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function cpanel(){
        return view('pages.cpanel');
    }


  /*  public function managerslist(){

        return view('pages.managerslist');

    }*/


    public function managerslist(){

        return view('pages.managerslist');

    }




    
}