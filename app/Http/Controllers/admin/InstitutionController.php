<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Institucion;
use Illuminate\Http\Request;

class InstitutionController extends Controller
{
    public function index()
    {
        return view("admin.institucion.institution");
    }
}