<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administrador\{DashboardController, ClienteController, RoleController};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::multiauth('Administrador', 'administrador');

Route::prefix('administrador')->group(function () {
    Route::middleware(['auth:administrador'])->group(function () {
        Route::get('/funcionarios', [DashboardController::class, 'funcionariosIndex'])->name('funcionarios');
        Route::get('/funcionarios/novo', [DashboardController::class, 'create'])->name('funcionarios.novo');

        Route::get('/clientes', [ClienteController::class, 'Index']);
        Route::get('/funcoes', [RoleController::class, 'Index'])->name('roles.index');
        Route::get('/funcoes/nova', [RoleController::class, 'create'])->name('roles.create');
    });
});
