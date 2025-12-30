<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValeurController extends Controller
{
    public function index(){
        return view('pages.valeur')->with('seoPage', 'valeur');
    }
}
