<?php

use App\Http\Controllers\{ClientController,HomeController};
use Illuminate\Support\Facades\{Route,Auth};


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/managechefs',function (){
return view('admin.Manage-Chefs');
})->name('manage-chef');
Route::get('/manageitems',function (){
return view('admin.Manage-Items');
})->name('manage-item');
Route::controller(ClientController::class)->group(function(){
    Route::get('/','index')->name('index');
    Route::post('/book-tables','storeBookingTable')->name('book-tables.store');
    Route::post('/subsribe','storeSubscribers')->name('subscribers.store');
    Route::post('/contact','storeContactMessage')->name('contactMsg.store');
    Route::get('/download-Menu','downloadMenu')->name('downloadMenu');
});









