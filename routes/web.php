<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CasalController;
use App\Http\Controllers\CityController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [UserController::class, 'login'])->name('mainPage');
Route::get('/registerForm', [UserController::class, 'registerForm'])->name('registerForm');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/user/login/{error?}',[UserController::class,'login'])->name('login');

Route::post('/auth',[UserController::class,'auth'])->name('auth');

Route::group(['middleware' => 'user'], function(){
    Route::get('/user/main',[CasalController::class,'main'])->name('main');    
    Route::get('/logout',[UserController::class,'logout'])->name('logout');
    Route::get('/user/addCasal', [CasalController::class, 'addCasalForm']);
    Route::post('/user/addCasal', [CasalController::class, 'store']);
    Route::get('/user/editarCasal/{id}', function ($id) {
        $CasalController = new CasalController();

        return $CasalController->showEditForm($id);
    });
    Route::post('/user/editarCasal/{id}', function (Request $request, $id) {
        $CasalController = new CasalController();

        return $CasalController->edit($request, $id);
    });
    Route::get('/user/eliminarCasal/{id}', function ($id) {
        $CasalController = new CasalController();
        
        return $CasalController->eliminarCasal($id);
    });
});

