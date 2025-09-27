<?php

use App\Http\Controllers\{ClientController,HomeController};
use App\Http\Controllers\Admin\{ChefController,ItemController};
use Illuminate\Support\Facades\{Route,Auth};


Auth::routes();
Route::get('/manageSys',function(){
    return view('admin.manageSys');
});
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/new-item',[ItemController::class,'newItem'])->name('newItem');

Route::resource('chefs',ChefController::class);
Route::resource('items',ItemController::class);

Route::controller(ClientController::class)->group(function(){
    Route::get('/','index')->name('index');
    Route::post('/book-tables','storeBookingTable')->name('book-tables.store');
    Route::post('/subsribe','storeSubscribers')->name('subscribers.store');
    Route::post('/contact','storeContactMessage')->name('contactMsg.store');
    Route::get('/download-Menu','downloadMenu')->name('downloadMenu');
});









