<?php

use App\Http\Controllers\AdministController;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\RolController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\Publi;

Route::get("/", function () {
    return view("layauts.index", [
        "publis" => Publi::latest()->get(),
    ]);
})->name('home.index');

Route::get("/search", function () {
    request()->validate([
        'q' => ['nullable', 'string', 'max:50'],
    ]);

    return view("partial.post", [
        'publis' => Publi::where('date', 'LIKE', '%' . request('q') . '%')
            ->latest()
            ->get(),
    ]);
})->name('search.index');


Route::get('/login', [SessionController::class, 'create'])->name('login.index');
Route::post('/login', [SessionController::class, 'regis'])->name('login.regis');
Route::post('/logout', [SessionController::class, 'destroy'])->name('login.destroy');

Route::get('/register', [RegisterController::class, 'create'])->name('register.index');
Route::post('/register', [RegisterController::class, 'regis'])->name('register.regis');

Route::middleware('auth')->group(function () {
    Route::get('/publicacion', [PublicacionController::class, 'create'])->name('publi.index');
    Route::post('/publicacion', [PublicacionController::class, 'poste'])->name('publi.poste');
});

Route::middleware('admini')->group(function () {
    Route::get('/admin', [AdministController::class, 'administ'])->name('aminist.index');
    Route::get('/admin/users', [RolController::class, 'index'])->name('admin.index');
    Route::get('/admin/users/{id}', [RolController::class, 'showdos'])->name('admin.showdos');
    Route::patch('/admin/users/{id}', [RolController::class, 'update'])->name('admin.update');
});
