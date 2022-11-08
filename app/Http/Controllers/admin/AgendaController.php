<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Servicio;
use Illuminate\Http\Request;
use View;

class AgendaController extends Controller
{
    public function index()
    {
        return view('admin.agenda.agenda');
    }

    public function show(Servicio $servicio)
    {
        return view('admin.agenda.agenda', ['servicio' => $servicio]);
    }

    public function eventos(Servicio $servicio)
    {
        return view('admin.agenda.eventos', ['servicio' => $servicio]);
    }

    public function cursos(Servicio $servicio)
    {
        return view('admin.agenda.cursos', ['servicio' => $servicio]);
    }

    public function horarios()
    {
        return view('admin.agenda.horarios');
    }
    public function modulos()
    {
        return view('admin.agenda.modulos');
    }
    public function tipos()
    {
        return view('admin.agenda.tipo');
    }
}