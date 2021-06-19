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
        Route::post('/funcionarios/novo', [DashboardController::class, 'store'])->name('funcionarios.salvar');
        Route::get('/funcionarios/ver/{id}', [DashboardController::class, 'show'])->name('funcionarios.ver');
        Route::get('/funcionarios/editar/{id}', [DashboardController::class, 'edit'])->name('funcionarios.editar');
        Route::post('/funcionarios/editar/{id}', [DashboardController::class, 'update'])->name('funcionarios.atualizar');
        Route::post('/funcionarios/apagar/{id}', [DashboardController::class, 'destroy'])->name('funcionarios.apagar');

        Route::get('/clientes', [ClienteController::class, 'Index'])->name('clientes');
        Route::get('/clientes/novo', [ClienteController::class, 'create'])->name('clientes.criar');
        Route::post('/clientes/novo', [ClienteController::class, 'store'])->name('clientes.salvar');
        Route::get('/clientes/ver/{id}', [ClienteController::class, 'show'])->name('clientes.ver');
        Route::get('/clientes/editar/{id}', [ClienteController::class, 'edit'])->name('clientes.editar');
        Route::post('/clientes/editar/{id}', [ClienteController::class, 'update'])->name('clientes.atualizar');
        Route::post('/clientes/apagar/{id}', [ClienteController::class, 'destroy'])->name('clientes.apagar');

        Route::get('/funcoes', [RoleController::class, 'Index'])->name('roles.index');
        Route::get('/funcoes/nova', [RoleController::class, 'create'])->name('roles.create');
        Route::post('/funcoes/nova', [RoleController::class, 'store'])->name('roles.store');
        Route::get('/funcoes/ver/{id}', [RoleController::class, 'show'])->name('roles.show');
        Route::get('/funcoes/editar/{id}', [RoleController::class, 'edit'])->name('roles.editar');
        Route::post('/funcoes/editar/{id}', [RoleController::class, 'update'])->name('roles.alterar');
        Route::post('/funcoes/apagar/{id}', [RoleController::class, 'destroy'])->name('roles.apagar');
    });
});
