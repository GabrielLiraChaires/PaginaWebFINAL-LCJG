<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\MuroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\TemporadasController;
use App\Http\Controllers\HombresController;
use App\Http\Controllers\MujeresController;
use App\Http\Controllers\ChatbootController;
use App\Http\Controllers\NinosController;
use App\Http\Controllers\PaginaNikeController;
use App\Http\Controllers\PaginaNikeHombreController;
use App\Http\Controllers\PaginaNikeMujerController;
use App\Http\Controllers\PaginaNikeNinoController;
use App\Http\Controllers\PaginaChatBootController;

//Principal.
Route::get('/', function () {
    return view('index');
})->name('Index');

//Registro.
Route::get('/registro',[RegistroController::class,'index'])->name('RegistroIndex');

Route::post('/registro',[RegistroController::class,'store'])->name('RegistroStore');

//Muro.
Route::get('/muro',[MuroController::class,'index'])->name('MuroIndex');

//Login.
Route::get('/login',[LoginController::class,'index'])->name('LoginIndex');

Route::post('/login',[LoginController::class,'store'])->name('LoginStore');

//Logout.
Route::post('/logout',[LogoutController::class,'store'])->name('LogoutStore');

//Mostrar productos de temporada.
Route::get('/temporadas',[TemporadasController::class,'index'])->name('TemporadasIndex');
Route::get('/hombres',[HombresController::class,'index'])->name('HombresIndex');
Route::get('/mujeres',[MujeresController::class,'index'])->name('MujeresIndex');
Route::get('/ninos',[NinosController::class,'index'])->name('NinosIndex');
Route::get('/chatboot',[ChatbootController::class,'index'])->name('ChatbootIndex');

//Para crear o agregar temporada.
Route::get('/temporadas/create',[TemporadasController::class,'create'])->name('TemporadasCreate');
Route::get('/hombres/create',[HombresController::class,'create'])->name('HombresCreate');
Route::get('/mujeress/create',[MujeresController::class,'create'])->name('MujeresCreate');
Route::get('/ninos/create',[NinosController::class,'create'])->name('NinosCreate');
Route::get('/chatboot/create',[ChatbootController::class,'create'])->name('ChatbootCreate');

//Request para la base de datos.
Route::post('/temporadas',[TemporadasController::class,'store'])->name('TemporadasStore');
Route::post('/hombres',[HombresController::class,'store'])->name('HombresStore');
Route::post('/mujeres',[MujeresController::class,'store'])->name('MujeresStore');
Route::post('/ninos',[NinosController::class,'store'])->name('NinosStore');
Route::post('/chatboot',[ChatbootController::class,'store'])->name('ChatbootStore');

//Editar temporada.
Route::get('/temporadas/{temporada}/edit',[TemporadasController::class,'edit'])->name('TemporadasEdit');
Route::get('/hombres/{hombre}/edit',[HombresController::class,'edit'])->name('HombresEdit');
Route::get('/mujeress/{mujer}/edit',[MujeresController::class,'edit'])->name('MujeresEdit');
Route::get('/ninos/{nino}/edit',[NinosController::class,'edit'])->name('NinosEdit');
Route::get('/chatboot/{chat}/edit',[ChatbootController::class,'edit'])->name('ChatbootEdit');

//Actualizar temporada.
Route::patch('/temporadas/{temporada}',[TemporadasController::class,'update'])->name('TemporadasUpdate');
Route::patch('/hombres/{hombre}',[HombresController::class,'update'])->name('HombresUpdate');
Route::patch('/mujeres/{mujer}',[MujeresController::class,'update'])->name('MujeresUpdate');
Route::patch('/ninos/{nino}',[NinosController::class,'update'])->name('NinosUpdate');
Route::patch('/chatboot/{chat}',[ChatbootController::class,'update'])->name('ChatbootUpdate');

//Borrar temporada.
Route::delete('/temporadas/{temporada}',[TemporadasController::class,'destroy'])->name('TemporadasDestroy');
Route::delete('/hombres/{hombre}',[HombresController::class,'destroy'])->name('HombresDestroy');
Route::delete('/mujeres/{mujer}',[MujeresController::class,'destroy'])->name('MujeresDestroy');
Route::delete('/ninos/{nino}',[NinosController::class,'destroy'])->name('NinosDestroy');
Route::delete('/chatboot/{chat}',[ChatbootController::class,'destroy'])->name('ChatbootDestroy');


//PAGINA NIKE
Route::get('/nike',[PaginaNikeController::class,'index'])->name('NikeIndex');
Route::get('/nike/hombre',[PaginaNikeHombreController::class,'index'])->name('NikeHombre');
Route::get('/nike/mujer',[PaginaNikeMujerController::class,'index'])->name('NikeMujer');
Route::get('/nike/nino',[PaginaNikeNinoController::class,'index'])->name('NikeNino');

Route::get('/chat/vista',[PaginaChatBootController::class,'index'])->name('ChatbootVista');
Route::get('/chat',[PaginaChatBootController::class,'ChatBoot'])->name('Chatboot');
Route::post('/chat',[PaginaChatBootController::class,'ChatBoot'])->name('Chatboot');
