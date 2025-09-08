<?php

use App\Http\Controllers\SystemController;
use Illuminate\Support\Facades\Route;

Route::get('/download',function (){
    return response()->download(storage_path('app/public/Menu.jpg'));
});

Route::controller(SystemController::class)->group(function(){
    Route::get('/','index');
});
