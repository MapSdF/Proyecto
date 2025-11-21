<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SolFichaDsController;

Route::get('/', function () {
   return view('welcome');
});


// Rutas corregidas para sol_ficha_ds
//Route::get('/solicitudes', [SolFichaDsController::class, 'index'])->name('solfichads.index');
//Route::get('/solicitudes/create', [SolFichaDsController::class, 'create'])->name('solfichads.create');
//Route::post('/solicitudes', [SolFichaDsController::class, 'store'])->name('solfichads.store');
//Route::get('/solicitudes/{solFichaDs}/edit', [SolFichaDsController::class, 'edit'])->name('solfichads.edit');
//Route::put('/solicitudes/{solFichaDs}', [SolFichaDsController::class, 'update'])->name('solfichads.update');
//Route::delete('/solicitudes/{solFichaDs}', [SolFichaDsController::class, 'destroy'])->name('solfichads.destroy');

Route::resource('solicitudes', SolFichaDsController::class);


