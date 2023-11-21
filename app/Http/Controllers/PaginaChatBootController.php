<?php

namespace App\Http\Controllers;

use App\Models\ChatBoot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaginaChatBootController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $chatboot = ChatBoot::all(); 
        return view('Chatboot.chatboot')->with('chatboot', $chatboot);
    }

    public function ChatBoot(Request $request)
    {
        if ($request->pregunta !== null) {
            $consulta = DB::table("chat_boots")->where('Pregunta', '=', $request->pregunta)->first();

            if (isset($consulta)) {
                return view('Chatboot.chatboot', ['consulta' => $consulta]);
            } else {
                $mensaje = 'No pude encontrar una respuesta para tu pregunta.';
                return view('Chatboot.chatboot', ['mensaje' => $mensaje]);
            }
        }
        return view('Chatboot.chatboot');
    }
}
