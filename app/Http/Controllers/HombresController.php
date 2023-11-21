<?php

namespace App\Http\Controllers;
use App\Models\Hombre;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class HombresController extends Controller
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
        $hombres = Hombre::paginate(5);
        return view('hombres.index', ['hombres' => $hombres]);
    }
        
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hombres=Hombre::all();
        return view('hombres.create', ['hombres'=>$hombres]);
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
    $hombre = Hombre::create([
        'nombre' => $request->nombre,
        'descripcion' => $request->descripcion,
        'colores' => $request->colores,
        'categoria' => $request->categoria,
        'precio' => $request->precio,
        'imagen' => $nombreImagen,
    ]);

    session()->flash('status', 'El producto ' . $request->nombre . ' se guardó correctamente');
    return redirect()->route('HombresIndex');
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
    $hombre = Hombre::find($id);
    return view('hombres.edit', ['hombre' => $hombre]);
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

    $hombre = Hombre::find($id);

    if ( $hombre) {
        $hombre->nombre = $request->input('nombre');
        $hombre->descripcion = $request->input('descripcion');
        $hombre->colores = $request->input('colores');
        $hombre->categoria = $request->input('categoria');
        $hombre->precio = $request->input('precio');

        // Procesar la nueva imagen
        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior si existe
            if ( $hombre->imagen) {
                // Asegúrate de ajustar la ruta según tu configuración
                Storage::delete('public/images/' .  $hombre->imagen);
            }

            // Almacenar la nueva imagen
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '.' . $imagen->getClientOriginalExtension();
            $imagen->storeAs('public/images', $nombreImagen);

            $hombre->imagen = $nombreImagen;
        }

        $hombre->save();
    }

    session()->flash('status', 'El producto ' . $request->nombre . ' se actualizó correctamente.');
    return redirect()->route('HombresIndex');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hombre=Hombre::find($id);
        if( $hombre)
        {
            $hombre->delete();
        }
        session()->flash('status','El producto se elimino correctamente');
        return redirect()->route('HombresIndex');
    }
}
