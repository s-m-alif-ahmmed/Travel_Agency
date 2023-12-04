<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PlacesController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\PackageCategoryController;
use App\Http\Controllers\TourFacilityController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\AdminBookingController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/package-detail/{id}', [HomeController::class, 'packageDetail'])->name('package-detail');
Route::get('/home/package', [HomeController::class, 'packages'])->name('website.package');
Route::get('/home/place', [HomeController::class, 'places'])->name('website.places');
Route::get('/package-search', [HomeController::class, 'packageSearch'])->name('website.package.search');
Route::get('/home/search', [HomeController::class, 'homeSearch'])->name('website.home.search');
Route::get('/contact-us', [HomeController::class, 'contact'])->name('contact');
Route::post('/book-now/{id}', [BookingController::class, 'index'])->name('book-now');
Route::get('/users/login', [CustomerAuthController::class, 'index'])->name('customers.login');
Route::post('/user/login', [CustomerAuthController::class, 'login'])->name('customer.login');
Route::get('/user/logout', [CustomerAuthController::class, 'logout'])->name('customer.logout');
Route::post('/new-booking-order/{id}', [BookingController::class, 'newOrder'])->name('new-booking-order');
Route::get('/complete-order', [BookingController::class, 'completeOrder'])->name('complete-order');
Route::get('/customer/dashboard', [CustomerAuthController::class, 'dashboard'])->name('customer.dashboard');

Route::get('/booking-invoice/{id}', [AdminBookingController::class, 'invoice'])->name('booking-invoice');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::get('/package', [PackageController::class, 'index'])->name('package');
    Route::get('/package/create', [PackageController::class, 'create'])->name('package.create');
    Route::post('/package/save', [PackageController::class, 'savePackage'])->name('package.save');
    Route::get('/package/status/{id}',[PackageController::class,'statusPackage'])->name('package.status');
    Route::get('/package/edit/{id}', [PackageController::class, 'edit'])->name('package.edit');
    Route::get('/package/detail/{id}', [PackageController::class, 'detail'])->name('package.detail');
    Route::post('/package/update/{id}', [PackageController::class, 'packageUpdate'])->name('package.update');
    Route::get('/package/delete/{id}', [PackageController::class, 'packageDelete'])->name('package.delete');

    Route::get('/admin/order', [OrderController::class, 'index'])->name('order');
    Route::get('/admin/order/status/{id}',[OrderController::class,'statusOrder'])->name('order.status');
    Route::post('/admin/order/update/{id}', [OrderController::class, 'orderUpdate'])->name('order.update');
    Route::get('/admin/order-detail/{id}', [OrderController::class, 'detail'])->name('admin.order-detail');
    Route::get('/admin/order/delete/{id}', [OrderController::class, 'packageDelete'])->name('order.delete');

    Route::get('/places', [PlacesController::class, 'index'])->name('places');
    Route::get('/places/create', [PlacesController::class, 'create'])->name('places.create');
    Route::post('/places/save', [PlacesController::class, 'savePlaces'])->name('places.save');
    Route::get('/places/status/{id}',[PlacesController::class,'statusPlace'])->name('places.status');
    Route::get('/places/edit/{id}', [PlacesController::class, 'edit'])->name('places.edit');
    Route::post('/places/update/{id}', [PlacesController::class, 'placesUpdate'])->name('places.update');
    Route::get('/places/delete/{id}', [PlacesController::class, 'placesDelete'])->name('places.delete');

    Route::get('/client', [ClientsController::class, 'index'])->name('client');
    Route::get('/client/create', [ClientsController::class, 'create'])->name('client.create');
    Route::post('/client/save', [ClientsController::class, 'saveClients'])->name('client.save');
    Route::get('/client/status/{id}',[ClientsController::class,'statusClients'])->name('client.status');
    Route::get('/client/edit/{id}', [ClientsController::class, 'edit'])->name('client.edit');
    Route::post('/client/update/{id}', [ClientsController::class, 'clientUpdate'])->name('client.update');
    Route::get('/client/delete/{id}', [ClientsController::class, 'clientDelete'])->name('client.delete');

    Route::get('/package/category/create', [PackageCategoryController::class, 'create'])->name('package.category.create');
    Route::post('/package/category/save', [PackageCategoryController::class, 'savePackageCategory'])->name('package.category.save');
    Route::get('/package/category/status/{id}',[PackageCategoryController::class,'statusPackageCategory'])->name('package.category.status');
    Route::get('/package/category/edit/{id}', [PackageCategoryController::class, 'edit'])->name('package.category.edit');
    Route::post('/package/category/update/{id}', [PackageCategoryController::class, 'packageCategoryUpdate'])->name('package.category.update');
    Route::get('/package/category/delete/{id}', [PackageCategoryController::class, 'packageCategoryDelete'])->name('package.category.delete');

    Route::get('/tour/facility/create', [TourFacilityController::class, 'create'])->name('tour.facility.create');
    Route::post('/tour/facility/save', [TourFacilityController::class, 'saveTourFacility'])->name('tour.facility.save');
    Route::get('/tour/facility/status/{id}',[TourFacilityController::class,'statusTourFacility'])->name('tour.facility.status');
    Route::get('/tour/facility/edit/{id}', [TourFacilityController::class, 'edit'])->name('tour.facility.edit');
    Route::post('/tour/facility/update/{id}', [TourFacilityController::class, 'tourFacilityUpdate'])->name('tour.facility.update');
    Route::get('/tour/facility/delete/{id}', [TourFacilityController::class, 'tourFacilityDelete'])->name('tour.facility.delete');

    Route::get('/faq', [FaqController::class, 'index'])->name('faq');
    Route::get('/faq/create', [FaqController::class, 'create'])->name('faq.create');
    Route::post('/faq/save', [FaqController::class, 'saveFaq'])->name('faq.save');
    Route::get('/faq/status/{id}',[FaqController::class,'statusFaq'])->name('faq.status');
    Route::get('/faq/edit/{id}', [FaqController::class, 'edit'])->name('faq.edit');
    Route::post('/faq/update/{id}', [FaqController::class, 'faqUpdate'])->name('faq.update');
    Route::get('/faq/delete/{id}', [FaqController::class, 'faqDelete'])->name('faq.delete');

    Route::get('/hotel', [HotelController::class, 'index'])->name('hotel');
    Route::get('/hotel/create', [HotelController::class, 'create'])->name('hotel.create');
    Route::post('/hotel/save', [HotelController::class, 'saveHotels'])->name('hotel.save');
    Route::get('/status/{id}',[HotelController::class,'status'])->name('status');
    Route::get('/hotel/edit/{id}', [HotelController::class, 'edit'])->name('hotel.edit');
    Route::post('/hotel/update/{id}', [HotelController::class, 'hotelUpdate'])->name('hotel.update');
    Route::get('/hotel/delete/{id}', [HotelController::class, 'hotelDelete'])->name('hotel.delete');
    Route::get('/hotel/category/create', [HotelController::class, 'hotelCategoryCreate'])->name('hotel.category.create');
    Route::post('/hotel/category/save', [HotelController::class, 'saveHotelCategory'])->name('hotel.category.save');
    Route::get('/hotel/category/status/{id}',[HotelController::class,'statusHotelCategory'])->name('hotel.category.status');
    Route::get('/hotel/category/edit/{id}', [HotelController::class, 'editHotelCategory'])->name('hotel.category.edit');
    Route::post('/hotel/category/update/{id}', [HotelController::class, 'hotelCategoryUpdate'])->name('hotel.category.update');
    Route::get('/hotel/category/delete/{id}', [HotelController::class, 'hotelCategoryDelete'])->name('hotel.category.delete');

    Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback');
    Route::get('/feedback/create', [FeedbackController::class, 'create'])->name('feedback.create');
    Route::post('/feedback/save', [FeedbackController::class, 'saveFeedback'])->name('feedback.save');
    Route::get('/feedback/status/{id}',[FeedbackController::class,'statusFeedback'])->name('feedback.status');
    Route::get('/feedback/edit/{id}', [FeedbackController::class, 'edit'])->name('feedback.edit');
    Route::post('/feedback/update/{id}', [FeedbackController::class, 'feedbackUpdate'])->name('feedback.update');
    Route::get('/feedback/delete/{id}', [FeedbackController::class, 'feedbackDelete'])->name('feedback.delete');

    Route::get('/admin/order-delete/{id}', [AdminBookingController::class, 'orderDelete'])->name('admin.order-delete');

});
