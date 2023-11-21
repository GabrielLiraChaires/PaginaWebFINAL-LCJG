<?php

namespace App\Http\Controllers;
use App\Models\Nino;
use Illuminate\Http\Request;

class PaginaNikeNinoController extends Controller
{
    public function index()
    {
        $ninos = Nino::all(); 
        return view('PaginaNike.nino')->with('ninos', $ninos);
    }
}
