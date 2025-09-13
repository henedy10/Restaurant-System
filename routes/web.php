<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;



Route::controller(ClientController::class)->group(function(){
    Route::get('/','index');
    Route::post('/book-tables','storeBookingTable')->name('book-tables.store');
    Route::post('/subsribe','storeSubscribers')->name('subscribers.store');
    Route::post('/contact','storeContactMessage')->name('contactMsg.store');
    Route::get('/download-Menu','downloadMenu')->name('downloadMenu');
});
