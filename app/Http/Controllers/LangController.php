<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LangController extends Controller
{
    public function index()
    {
        return redirect(route("home"));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function change(Request $request)
    // {
    //     App::setLocale($request->lang);
    //     session()->put('locale', $request->lang);
    //     return redirect(route('raiz'));
    // }
}