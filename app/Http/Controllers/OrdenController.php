<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrdenController extends Controller
{
    public function index()
    {
        return view('ordenes.index');
    }
    public function show($id)
    {
        return view('ordenes.show', ['id' => $id]);
    }
}
