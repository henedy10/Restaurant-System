<?php
use App\Http\Controllers\Admin\
{
    ChefController,
    ContactController as ContactControllerAdmin,
    DashboardController,
    ItemController,
    SystemController,
    OpeningHourController,
    TableController,
    HomeController
};
use App\Http\Controllers\Client\
{
    BookingTableController,
    MenuController,
    SubscriberController,
    ContactController,
    LandingPageController
};
use Illuminate\Support\Facades\
{
    Route,
    Auth,
};

Auth::routes();

Route::middleware('CheckAdmin')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

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

    Route::controller(ContactControllerAdmin::class)->group(function (){
        Route::get('/Contacts','index')->name('system.contacts.index');
    });

});
Route::get('/new-item',[ItemController::class,'newItem'])->name('newItem');

// ******************************** Client's Routes ****************************

Route::get('/',LandingPageController::class)->name('index');
Route::post('/book-tables',BookingTableController::class)->name('book-tables.store');
Route::post('/contacts',ContactController::class)->name('contacts.store');
Route::post('/subscribers',SubscriberController::class)->name('subscribers.store');
Route::get('/download-menu',MenuController::class)->name('download-menu');
