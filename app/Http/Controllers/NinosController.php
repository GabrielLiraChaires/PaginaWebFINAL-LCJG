<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nino;
use Illuminate\Support\Facades\Storage;

class NinosController extends Controller
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
        $ninos = nino::paginate(5);
        return view('Ninos.index', ['ninos' => $ninos]);
    }
        
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ninos = nino::all();
        return view('ninos.create', ['ninos'=>$ninos]);
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
    $nino = nino::create([
        'nombre' => $request->nombre,
        'descripcion' => $request->descripcion,
        'colores' => $request->colores,
        'categoria' => $request->categoria,
        'precio' => $request->precio,
        'imagen' => $nombreImagen,
    ]);

    session()->flash('status', 'El producto ' . $request->nombre . ' se guardó correctamente');
    return redirect()->route('NinosIndex');
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
    $nino = nino::find($id);
    return view('Ninos.edit', ['nino' => $nino]);
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

    $nino = nino::find($id);

    if ($nino) {
        $nino->nombre = $request->input('nombre');
        $nino->descripcion = $request->input('descripcion');
        $nino->colores = $request->input('colores');
        $nino->categoria = $request->input('categoria');
        $nino->precio = $request->input('precio');

        // Procesar la nueva imagen
        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior si existe
            if ($nino->imagen) {
                // Asegúrate de ajustar la ruta según tu configuración
                Storage::delete('public/images/' . $nino->imagen);
            }

            // Almacenar la nueva imagen
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '.' . $imagen->getClientOriginalExtension();
            $imagen->storeAs('public/images', $nombreImagen);

            $nino->imagen = $nombreImagen;
        }

        $nino->save();
    }

    session()->flash('status', 'El producto ' . $request->nombre . ' se actualizó correctamente.');
    return redirect()->route('NinosIndex');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $nino=nino::find($id);
        if($nino)
        {
            $nino->delete();
        }
        session()->flash('status','El producto se elimino correctamente');
        return to_route('NinosIndex');
    }
}
