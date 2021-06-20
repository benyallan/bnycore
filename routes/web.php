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

        Route::prefix('funcionarios')->group(function (){
            Route::get('/', [DashboardController::class, 'funcionariosIndex'])
                ->name('funcionarios')
                ->middleware('permission:listar funcionários');

            Route::get('/novo', [DashboardController::class, 'create'])
                ->name('funcionarios.novo')
                ->middleware('permission:criar funcionários');

            Route::post('/novo', [DashboardController::class, 'store'])
                ->name('funcionarios.salvar')
                ->middleware('permission:criar funcionários');

            Route::get('/ver/{id}', [DashboardController::class, 'show'])
                ->name('funcionarios.ver')
                ->middleware('permission:listar funcionários');

            Route::get('/editar/{id}', [DashboardController::class, 'edit'])
                ->name('funcionarios.editar')
                ->middleware('permission:editar funcionários');

            Route::post('/editar/{id}', [DashboardController::class, 'update'])
                ->name('funcionarios.atualizar')
                ->middleware('permission:editar funcionários');

            Route::post('/apagar/{id}', [DashboardController::class, 'destroy'])
                ->name('funcionarios.apagar')
                ->middleware('permission:apagar funcionários');

            Route::get('/mudarsenha', [DashboardController::class, 'mudarSenha'])
                ->name('funcionarios.mudarSenha');

            Route::post('/mudarsenha/{id}', [DashboardController::class, 'updateSenha'])
                ->name('funcionarios.atualizarSenha');
        });


        Route::prefix('clientes')->group(function () {
            Route::get('/', [ClienteController::class, 'Index'])
                ->name('clientes')
                ->middleware('permission:listar clientes');

            Route::get('/novo', [ClienteController::class, 'create'])
                ->name('clientes.criar')
                ->middleware('permission:criar clientes');

            Route::post('/novo', [ClienteController::class, 'store'])
                ->name('clientes.salvar')
                ->middleware('permission:criar clientes');

            Route::get('/ver/{id}', [ClienteController::class, 'show'])
                ->name('clientes.ver')
                ->middleware('permission:listar clientes');

            Route::get('/editar/{id}', [ClienteController::class, 'edit'])
                ->name('clientes.editar')
                ->middleware('permission:editar clientes');

            Route::post('/editar/{id}', [ClienteController::class, 'update'])
                ->name('clientes.atualizar')
                ->middleware('permission:editar clientes');

            Route::post('/apagar/{id}', [ClienteController::class, 'destroy'])
                ->name('clientes.apagar')
                ->middleware('permission:apagar clientes');
        });

        Route::prefix('funcoes')->group(function ()
        {
            Route::get('/', [RoleController::class, 'Index'])
                ->name('roles.index')
                ->middleware('permission:listar funções');

            Route::get('/nova', [RoleController::class, 'create'])
                ->name('roles.create')
                ->middleware('permission:criar funções');

            Route::post('/nova', [RoleController::class, 'store'])
                ->name('roles.store')
                ->middleware('permission:criar funções');

            Route::get('/ver/{id}', [RoleController::class, 'show'])
                ->name('roles.show')
                ->middleware('permission:listar funções');

            Route::get('/editar/{id}', [RoleController::class, 'edit'])
                ->name('roles.editar')
                ->middleware('permission:editar funções');

            Route::post('/editar/{id}', [RoleController::class, 'update'])
                ->name('roles.alterar')
                ->middleware('permission:editar funções');

            Route::post('/apagar/{id}', [RoleController::class, 'destroy'])
                ->name('roles.apagar')
                ->middleware('permission:apagar funções');
        });

    });
});
