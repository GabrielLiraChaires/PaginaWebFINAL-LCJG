<?php

namespace App\Http\Controllers;
use App\Models\Mujer;
use Illuminate\Http\Request;

class PaginaNikeMujerController extends Controller
{
    public function index()
    {
        $mujeres = Mujer::all(); 
        return view('PaginaNike.mujer')->with('mujeres', $mujeres);
    }
}
