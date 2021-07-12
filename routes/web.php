<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Routes for website navigation
Route::get('/', 'WebsiteController@home')->name('home');
Route::get('/home', 'WebsiteController@home')->name('homepage');
Route::get('/about', 'WebsiteController@about')->name('about');
Route::get('/services', 'WebsiteController@services')->name('services');
Route::get('/projects', 'WebsiteController@projects')->name('projects');
Route::get('/blogs', 'WebsiteController@blogs')->name('blogs');
Route::get('/gallery', 'WebsiteController@gallery')->name('gallery');
Route::get('/contact-us', 'WebsiteController@contactus')->name('contactus');
Route::post('/save-contact', 'WebsiteController@savecontact')->name('savecontact');
Route::get('/thank-you', 'WebsiteController@thankyou')->name('thankyou');
Route::get('/productDetails/{product:url_slug}', 'WebsiteController@productDetails')->name('productDetails');
Route::get('/cart', 'WebsiteController@cart')->name('cart');

Route::get('/category/{slug}', 'WebsiteController@showproductcatg')->name('showproductcatg');
Route::get('/blog/{slug}', 'WebsiteController@showblog')->name('showblog');
Route::get('/project/{slug}', 'WebsiteController@showproject')->name('showproject');
Route::get('/services/{slug}', 'WebsiteController@showservice')->name('showservice');
// End Routes for website navigation


// Routes for website admin navigation
Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function () {
    Route::resource('/users', 'UsersController', ['except' => ['show']]);
});

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('/pdtcategories', 'PdtCatgsController', ['except' => ['show']]);
    Route::resource('/pdtsubcategories', 'PdtSubCatgsController', ['except' => ['show']]);
    Route::resource('/products', 'ProductsController', ['except' => ['show']]);
    Route::resource('/sercategories', 'SerCatgsController', ['except' => ['show']]);
    Route::resource('/sersubcategories', 'SerSubCatgsController', ['except' => ['show']]);
    Route::resource('/services', 'ServicesController', ['except' => ['show']]);
    Route::resource('/pjxcategories', 'PjxCatgsController', ['except' => ['show']]);
    Route::resource('/projects', 'ProjectsController', ['except' => ['show']]);
    Route::resource('/blgcategories', 'BlgCatgsController', ['except' => ['show']]);
    Route::resource('/blogs', 'BlogsController', ['except' => ['show']]);
    Route::resource('/glycategories', 'GlyCatgsController', ['except' => ['show']]);
    Route::resource('/gallerys', 'GallerysController', ['except' => ['show']]);
    Route::resource('/general', 'GensController', ['except' => ['show']]);
    Route::resource('/sliders', 'SlidersController', ['except' => ['show']]);
    Route::resource('/contacts', 'ContactsController', ['except' => ['show']]);
    Route::get('/changepassword', 'UsersController@changepass')->name('changepassword');
    Route::put('/savepassword', 'UsersController@savepass')->name('savepassword');
    Route::resource('/homepage', 'HomePageController', ['except' => ['show']]);
});
// End Routes for website admin navigation

//Ajax Data
Route::post('getproductssubcategories', 'Admin\AjaxDataController@GetProductsSubCategories')->name('productsubcategories.fetch');
Route::post('getservicesubcategories', 'Admin\AjaxDataController@GetServicesSubCategories')->name('servicesubcategories.fetch');
Route::post('savecontact', 'Admin\AjaxDataController@SaveContact')->name('ajaxsavecontact');


Route::post('/addToCart', 'WebsiteController@addToCart')->name('addToCart');
Route::post('/cartCount', 'WebsiteController@cartCount')->name('cartCount');
Route::delete('/removeFromCart', 'WebsiteController@removeFromCart')->name('removeFromCart');
