<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function index()
    {
        return view('personal.index');
    }

    public function show($id)
    {
        return view('personal.show', ['id' => $id]);
    }   
}
