<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Temporada;
use Illuminate\Support\Facades\Storage;

class TemporadasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // $productos = Producto::all();
        $temporadas = Temporada::paginate(5);
        return view('temporadas.index', ['temporadas' => $temporadas]);
    }
        
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $temporadas=Temporada::all();
        return view('temporadas.create', ['temporadas'=>$temporadas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|min:5|max:50',
        'descripcion' => 'required|min:5|max:100',
        'colores' => ['required', 'numeric'],
        'categoria' => 'required',
        'precio' => ['required', 'numeric', 'regex:#^\d+(\.\d{1,2})?$#'],
        'imagen' => 'image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
    ]);

    $nombreImagen = null; // Asignar un valor predeterminado

    // Procesar la imagen
    if ($request->hasFile('imagen')) {
        $imagen = $request->file('imagen');
        $nombreImagen = time() . '.' . $imagen->getClientOriginalExtension();
        $imagen->storeAs('public/images', $nombreImagen);
    }

    // Crear el nuevo registro en la base de datos
    $temporada = Temporada::create([
        'nombre' => $request->nombre,
        'descripcion' => $request->descripcion,
        'colores' => $request->colores,
        'categoria' => $request->categoria,
        'precio' => $request->precio,
        'imagen' => $nombreImagen,
    ]);

    session()->flash('status', 'El producto ' . $request->nombre . ' se guardó correctamente');
    return redirect()->route('TemporadasIndex');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
/**
 * Show the form for editing the specified resource.
 */
public function edit(string $id)
{
    $temporada = Temporada::find($id);
    return view('temporadas.edit', ['temporada' => $temporada]);
}

/**
 * Update the specified resource in storage.
 */
public function update(Request $request, string $id)
{
    $request->validate([
        'nombre' => 'required|min:5|max:50',
        'descripcion' => 'required|min:5|max:100',
        'colores' => ['required', 'numeric'],
        'categoria' => 'required',
        'precio' => ['required', 'numeric', 'regex:#^\d+(\.\d{1,2})?$#'],
        'imagen' => 'image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
    ]);

    $temporada = Temporada::find($id);

    if ($temporada) {
        $temporada->nombre = $request->input('nombre');
        $temporada->descripcion = $request->input('descripcion');
        $temporada->colores = $request->input('colores');
        $temporada->categoria = $request->input('categoria');
        $temporada->precio = $request->input('precio');

        // Procesar la nueva imagen
        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior si existe
            if ($temporada->imagen) {
                // Asegúrate de ajustar la ruta según tu configuración
                Storage::delete('public/images/' . $temporada->imagen);
            }

            // Almacenar la nueva imagen
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '.' . $imagen->getClientOriginalExtension();
            $imagen->storeAs('public/images', $nombreImagen);

            $temporada->imagen = $nombreImagen;
        }

        $temporada->save();
    }

    session()->flash('status', 'El producto ' . $request->nombre . ' se actualizó correctamente.');
    return redirect()->route('TemporadasIndex');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $temporada=Temporada::find($id);
        if($temporada)
        {
            $temporada->delete();
        }
        session()->flash('status','El producto se elimino correctamente');
        return to_route('TemporadasIndex');
    }
}

