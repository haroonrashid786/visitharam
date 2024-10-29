<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes([
    'register' => false, // Disable registration route
    'reset' => false,    // Disable password reset route
]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('packages', [HomeController::class, 'packages'])->name('packages');
Route::get('package/add', [HomeController::class, 'addPackage'])->name('add.package');
Route::post('package/insert', [HomeController::class, 'insertPackage'])->name('insert.package');
Route::get('package/edit/{id}', [HomeController::class, 'editPackage'])->name('edit.package');
Route::post('package/update/{id}', [HomeController::class, 'updatePackage'])->name('update.package');
Route::delete('/delete/package/{id}', [HomeController::class, 'deletePackage'])->name('delete.package');

Route::get('contents', [HomeController::class, 'contents'])->name('contents');
Route::get('content/add', [HomeController::class, 'addContent'])->name('add.content');
Route::post('content/insert', [HomeController::class, 'insertContent'])->name('insert.content');
Route::get('content/edit/{id}', [HomeController::class, 'editContent'])->name('edit.content');
Route::post('content/update/{id}', [HomeController::class, 'updateContent'])->name('update.content');
Route::delete('/delete/content/{id}', [HomeController::class, 'deleteContent'])->name('delete.content');


Route::get('flights', [HomeController::class, 'flights'])->name('flights');
Route::get('flight/add', [HomeController::class, 'addFlight'])->name('add.flight');
Route::post('flight/insert', [HomeController::class, 'insertFlight'])->name('insert.flight');
Route::get('flight/edit/{id}', [HomeController::class, 'editFlight'])->name('edit.flight');
Route::post('flight/update/{id}', [HomeController::class, 'updateFlight'])->name('update.flight');
Route::delete('/delete/flight/{id}', [HomeController::class, 'deleteFlight'])->name('delete.flight');

Route::get('facility', [HomeController::class, 'facilityIndex'])->name('facility.index');
Route::get('add-facility', [HomeController::class, 'addFacility'])->name('add.facility');
Route::post('add-facility', [HomeController::class, 'storeFacility'])->name('insert.facility');
Route::get('edit-facility/{id}', [HomeController::class, 'editFacility'])->name('edit.facility');
Route::post('update-facility/{id}', [HomeController::class, 'updateFacility'])->name('update.facility');
Route::delete('/delete/facility/{id}', [HomeController::class, 'deleteFacility'])->name('delete.facility');


Route::get('hotelfacility', [HomeController::class, 'hotelfacilityIndex'])->name('hotelfacility.index');
Route::get('add-hotelfacility', [HomeController::class, 'addhotelFacility'])->name('add.hotelfacility');
Route::post('add-hotelfacility', [HomeController::class, 'storehotelFacility'])->name('insert.hotelfacility');
Route::get('edit-hotelfacility/{id}', [HomeController::class, 'edithotelFacility'])->name('edit.hotelfacility');
Route::post('update-hotelfacility/{id}', [HomeController::class, 'updatehotelFacility'])->name('update.hotelfacility');
Route::delete('/delete/hotelfacility/{id}', [HomeController::class, 'deletehotelFacility'])->name('delete.hotelfacility');


Route::get('service', [HomeController::class, 'serviceIndex'])->name('service.index');
Route::get('add-service', [HomeController::class, 'addService'])->name('add.service');
Route::post('add-service', [HomeController::class, 'storeService'])->name('insert.service');
Route::get('edit-service/{id}', [HomeController::class, 'editService'])->name('edit.service');
Route::post('update-service/{id}', [HomeController::class, 'updateService'])->name('update.service');
Route::delete('/delete/service/{id}', [HomeController::class, 'deleteService'])->name('delete.service');

Route::get('hotels', [HomeController::class, 'hotels'])->name('hotels');
Route::get('hotel/add', [HomeController::class, 'addHotel'])->name('add.hotel');
Route::post('hotel/insert', [HomeController::class, 'insertHotel'])->name('insert.hotel');
Route::get('hotel/edit/{id}', [HomeController::class, 'editHotel'])->name('edit.hotel');
Route::post('hotel/update/{id}', [HomeController::class, 'updateHotel'])->name('update.hotel');
Route::delete('/delete/hotel/{id}', [HomeController::class, 'deleteHotel'])->name('delete.hotel');

Route::get('categories', [HomeController::class, 'categories'])->name('categories');
Route::get('category/add', [HomeController::class, 'addCategory'])->name('add.category');
Route::post('category/insert', [HomeController::class, 'insertCategory'])->name('insert.category');
Route::get('category/edit/{id}', [HomeController::class, 'editCategory'])->name('edit.category');
Route::post('category/update/{id}', [HomeController::class, 'updateCategory'])->name('update.category');
Route::delete('/delete/category/{id}', [HomeController::class, 'deleteCategory'])->name('delete.category');

Route::get('customerreview', [HomeController::class, 'customerreviewIndex'])->name('customerreview.index');
Route::get('add-customerreview', [HomeController::class, 'addcustomerReview'])->name('add.customerreview');
Route::post('add-customerreview', [HomeController::class, 'storecustomerReview'])->name('insert.customerreview');
Route::get('edit-customerreview/{id}', [HomeController::class, 'editcustomerReview'])->name('edit.customerreview');
Route::post('update-customerreview/{id}', [HomeController::class, 'updatecustomerReview'])->name('update.customerreview');
Route::delete('/delete/customerreview/{id}', [HomeController::class, 'deletecustomerReview'])->name('delete.customerreview');

Route::get('/', [WebController::class, 'index'])->name('website');
Route::post('form-submit',[WebController::class, 'contactForm'])->name('form.submit');
Route::post('newsletter-submit',[WebController::class, 'newsletterForm'])->name('newsletter.submit');


Route::get('contacts',[HomeController::class, 'contactForms'])->name('contacts');
Route::get('newsletters',[HomeController::class, 'newsletterForms'])->name('newsletters');


Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::get('/hajj', function () {
    return view('hajj');
})->name('hajj');

Route::get('/our-responsibility', function () {
    return view('our-responsibility');
})->name('our-responsibility');

Route::get('/travel-insurance', function () {
    return view('travel-insurance');
})->name('travel-insurance');

Route::get('/payment-security', function () {
    return view('payment-security');
})->name('payment-security');

Route::get('/terms-conditions', function () {
    return view('/terms-conditions');
});

Route::get('/privacy-policy', function () {
    return view('/privacy-policy');
});
Route::get('Hajj-Packages', [WebController::class, 'hajjDetails'])->name('Hajj');

Route::get('package/{name}', [WebController::class, 'packageDetails'])->name('packages.showDetails');
Route::get('/{slug}', [WebController::class, 'subcategoryDetails'])->name('subcategories.showDetails');
Route::get('flight/cheap-flights-to-jeddah', [WebController::class, 'flightDetails'])->name('flights.showDetails');

