<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('pages.main');
    }

    public function students(){
        return view('pages.students');
    }

    public function assignments(){
        return view('pages.assignments');
    }
}
