<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('alunos.index');
});

Route::resource('alunos', AlunoController::class);

Route::resource('users', UserController::class);
