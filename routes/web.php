<?php
use App\Http\Controllers\Admin\
{
    ChefController,
    ContactController as ContactControllerAdmin,
    DashboardController,
    ImageController,
    ItemController,
    InfoController,
    OpeningHourController,
    TableController,
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

// **************************** Admin's Routes *******************************

Route::middleware('CheckAdmin')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('info',InfoController::class)->only('index','store','update');
    Route::resource('tables',TableController::class)->only('index','update');
    Route::resource('chefs',ChefController::class);
    Route::resource('opening-hours',OpeningHourController::class)->except('store','create');
    Route::resource('items',ItemController::class);
    Route::resource('/images',ImageController::class)->only('create','store');
    Route::get('/Contacts',[ContactControllerAdmin::class,'index'])->name('system.contacts.index');

});
Route::get('/new-item',[ItemController::class,'newItem'])->name('newItem');

// ******************************** Client's Routes ****************************

Route::get('/',LandingPageController::class)->name('index');
Route::post('/book-tables',BookingTableController::class)->name('book-tables.store');
Route::post('/contacts',ContactController::class)->name('contacts.store');
Route::post('/subscribers',SubscriberController::class)->name('subscribers.store');
Route::get('/download-menu',MenuController::class)->name('download-menu');
