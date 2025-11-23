<?php

use App\Http\Controllers\
{
    ClientController,
    HomeController,
};

use App\Http\Controllers\Admin\
{
    ChefController,
    ContactController,
    ItemController,
    SystemController,
    OpeningHourController,
    TableController,
};
use Illuminate\Support\Facades\
{
    Route,
    Auth,
};

Auth::routes();

Route::middleware('CheckAdmin')->group(function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::controller(SystemController::class)->group(function(){
        Route::get('/system','index')->name('system.index');
        Route::get('/subscribers','indexSubscribers')->name('system.index.subscribers');
        Route::post('/systemInfos','storeInfo')->name('system.info.store');
        Route::put('/systemInfos/{systemInfo}','updateInfo')->name('system.info.update');
        Route::delete('/openingHours/{openingHour}','destroyOpeningHour')->name('system.openingHours.destroy');
        Route::post('/images','storeImage')->name('system.images.store');
    });

    Route::resource('tables',TableController::class)->only('index','update');
    Route::resource('chefs',ChefController::class);
    Route::resource('opening-hours',OpeningHourController::class)->only('edit','update','destroy');
    Route::resource('items',ItemController::class);

    Route::controller(ContactController::class)->group(function (){
        Route::get('/Contacts','index')->name('system.contacts.index');
    });

});
Route::get('/new-item',[ItemController::class,'newItem'])->name('newItem');

Route::controller(ClientController::class)->group(function(){
    Route::get('/','index')->name('index');
    Route::post('/book-tables','storeBookingTable')->name('book-tables.store');
    Route::post('/subsribe','storeSubscribers')->name('subscribers.store');
    Route::post('/contact','storeContactMessage')->name('contactMsg.store');
    Route::get('/download-Menu','downloadMenu')->name('downloadMenu');
});
