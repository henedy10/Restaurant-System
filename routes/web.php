<?php

use App\Http\Controllers\
{
    ClientController,
    HomeController,
};

use App\Http\Controllers\Admin\
{
    ChefController,
    ItemController,
    SystemController,
};
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\
{
    Route,
    Auth,
};

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::controller(SystemController::class)->group(function(){
    Route::get('/system','index')->name('system.index');
    Route::get('/subscribers','indexSubscribers')->name('system.index.subscribers');
    Route::post('/systemInfos','storeInfo')->name('system.info.store');
    Route::put('/systemInfos/{systemInfo}','updateInfo')->name('system.info.update');
    Route::post('/openingHours','storeOpeningHours')->name('system.openingHours.store');
    Route::get('/openingHours/{openingHour}/edit','editOpeningHour')->name('system.openingHours.edit');
    Route::put('/openingHours/{openingHour}','updateOpeningHour')->name('system.openingHours.update');
    Route::delete('/openingHours/{openingHour}','destroyOpeningHour')->name('system.openingHours.destroy');
    Route::post('/images','storeImage')->name('system.images.store');
    Route::get('/Tables','indexTables')->name('system.tables.index');
    Route::put('/Tables','storeInfoTables')->name('system.tables.store');
});

Route::resource('chefs',ChefController::class);

Route::resource('items',ItemController::class);
Route::get('/new-item',[ItemController::class,'newItem'])->name('newItem');

Route::controller(ClientController::class)->group(function(){
    Route::get('/','index')->name('index');
    Route::post('/book-tables','storeBookingTable')->name('book-tables.store');
    Route::post('/subsribe','storeSubscribers')->name('subscribers.store');
    Route::post('/contact','storeContactMessage')->name('contactMsg.store');
    Route::get('/download-Menu','downloadMenu')->name('downloadMenu');
});
