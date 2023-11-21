<?php

namespace App\Http\Controllers;
use App\Models\Hombre;
use Illuminate\Http\Request;

class PaginaNikeHombreController extends Controller
{
    public function index()
    {
        $hombres = Hombre::all(); 
        return view('PaginaNike.hombre')->with('hombres', $hombres);
    }
}
