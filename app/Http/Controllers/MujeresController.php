<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mujer;
use Illuminate\Support\Facades\Storage;

class MujeresController extends Controller
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
        $mujeres = Mujer::paginate(5);
        return view('Mujeres.index', ['mujeres' => $mujeres]);
    }
        
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mujeres = Mujer::all();
        return view('Mujeres.create', ['mujers'=>$mujeres]);
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
    $mujer = Mujer::create([
        'nombre' => $request->nombre,
        'descripcion' => $request->descripcion,
        'colores' => $request->colores,
        'categoria' => $request->categoria,
        'precio' => $request->precio,
        'imagen' => $nombreImagen,
    ]);

    session()->flash('status', 'El producto ' . $request->nombre . ' se guardó correctamente');
    return redirect()->route('MujeresIndex');
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
    $mujer = Mujer::find($id);
    return view('mujeres.edit', ['mujer' => $mujer]);
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

    $mujer = Mujer::find($id);

    if ($mujer) {
        $mujer->nombre = $request->input('nombre');
        $mujer->descripcion = $request->input('descripcion');
        $mujer->colores = $request->input('colores');
        $mujer->categoria = $request->input('categoria');
        $mujer->precio = $request->input('precio');

        // Procesar la nueva imagen
        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior si existe
            if ($mujer->imagen) {
                // Asegúrate de ajustar la ruta según tu configuración
                Storage::delete('public/images/' . $mujer->imagen);
            }

            // Almacenar la nueva imagen
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '.' . $imagen->getClientOriginalExtension();
            $imagen->storeAs('public/images', $nombreImagen);

            $mujer->imagen = $nombreImagen;
        }

        $mujer->save();
    }

    session()->flash('status', 'El producto ' . $request->nombre . ' se actualizó correctamente.');
    return redirect()->route('MujeresIndex');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mujer=Mujer::find($id);
        if($mujer)
        {
            $mujer->delete();
        }
        session()->flash('status','El producto se elimino correctamente');
        return to_route('MujeresIndex');
    }
}
