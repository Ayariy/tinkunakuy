<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MiembrosController extends Controller
{
    public function index()
    {

        return view("admin.miembros.miembros");
    }

    public function cargo()
    {

        return view("admin.miembros.cargo");
    }
}