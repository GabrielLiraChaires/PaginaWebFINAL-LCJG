<?php

namespace App\Http\Controllers;
use App\Models\Temporada;
use Illuminate\Http\Request;

class PaginaNikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $temporadas = Temporada::all(); 
        return view('PaginaNike.index')->with('temporadas', $temporadas);
    }
}
