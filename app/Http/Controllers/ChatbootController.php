<?php

namespace App\Http\Controllers;

use App\Models\ChatBoot;
use Illuminate\Http\Request;

class ChatbootController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $registros = ChatBoot::paginate(5);
        return view('chatboot.index', ['registros' => $registros]);
    }

    public function create()
    {
        $registros = ChatBoot::all();
        return view('chatboot.index', ['registros' => $registros]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'pregunta' => 'required|min:2|max:100',
            'respuesta' => 'required|min:2|max:100',
        ]);

        ChatBoot::create([
            'pregunta' => $request->pregunta,
            'respuesta' => $request->respuesta,
        ]);

        session()->flash('status', 'La pregunta "' . $request->pregunta . '" con la respuesta "'. $request->respuesta.'" se guardó correctamente.');
        return redirect()->route('ChatbootIndex');
    }

    public function edit($id)
    {
        $registro = ChatBoot::find($id);
        return view('chatboot.edit', ['registro' => $registro]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pregunta' => 'required|min:2|max:100',
            'respuesta' => 'required|min:2|max:100',
        ]);

        $registro = ChatBoot::find($id);

        if ($registro) {
            $registro->pregunta = $request->input('pregunta');
            $registro->respuesta = $request->input('respuesta');

            $registro->save();
        }

        session()->flash('status', 'La pregunta "' . $request->pregunta . '" con la respuesta "'. $request->respuesta.'" se actualizó correctamente.');
        return redirect()->route('ChatbootIndex');
    }

    public function destroy($id)
    {
        $registro = ChatBoot::find($id);
        
        if ($registro) {
            $registro->delete();
        }

        session()->flash('status', 'El registro se eliminó correctamente');
        return redirect()->route('ChatbootIndex');
    }
}
