<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\MailchimpController;
use App\Http\Controllers\MyOfferController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\SessionController;
use App\Models\Offer;
use App\Models\User;
use App\Models\Species;
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


//See offers (filtered / searched or not)
Route::get('/', [OfferController::class, 'filter']);

//see offer details 
Route::get('/offer/{offer:id}', [OfferController::class, 'show']);

//make request
Route::get('/offer/{offer:id}/request', [RequestController::class,'create'])->middleware('auth');
Route::post('/offer/{offer:id}/request', [RequestController::class,'store'])->middleware('auth');

//create offer
Route::get('/create-offer', [OfferController::class,'create'])->middleware('auth');
Route::post('/create-offer', [OfferController::class,'store'])->middleware('auth');

//edit or delete an offer
Route::get('/offer/{offer:id}/delete', [OfferController::class,'destroy'])->middleware('auth');
Route::get('/offer/{offer:id}/update', [OfferController::class,'updateCreate'])->middleware('auth');
Route::post('/offer/{offer:id}/update', [OfferController::class,'updateStore'])->middleware('auth');


//comments
Route::post('/offer/{offer:id}/comments-post', [CommentController::class,'store'])->middleware('auth');
//Route::post('/offer/{offer:id}/comments-update/{comments:id}', [CommentController::class,'update'])->middleware('auth'); //todo or to delete
Route::delete('/offer/{offer:id}/comments-delete/{comments:id}', [CommentController::class,'destroy'])->middleware('auth');

//registration --> makes only sense if you are not logged in. that is why it is using the guest middleware (defined by laravel). 
//The rerouting to home is defined in app/http/kernel -> routeToMiddleWare(), the home constant in App/http/providers/RouteServiceProvider.php
Route::get('/register', [RegisterController::class,'create'])->middleware('guest');
Route::post('/register', [RegisterController::class,'store'])->middleware('guest');

//login / out
Route::get('/login', [SessionController::class,'create'])->middleware('guest')->name('login'); //need to add the name because in the auth middleware it is looking for a route named login to redirect to if the user gets logged out
Route::post('/login', [SessionController::class,'store'])->middleware('guest');
Route::get('/logout', [SessionController::class,'destroy'])->middleware('auth');


//about page
Route::get('/about', function (){

    return view('about/about', [
        //
    ]);
});

//profile page
Route::get('/profile', [ProfileController::class, 'create'])->middleware('auth');
Route::post('/profile/edit', [ProfileController::class, 'update'])->middleware('auth');

//public profile page
Route::get('/profile/{user:username}', [PublicProfileController::class, 'create'])->middleware('auth');

//subscribe to newsletter
Route::post('/subscribe', [MailchimpController::class,'subscribe']);

//contact form
Route::get('/contact', [ContactController::class,'create']);
Route::post('/contact', [ContactController::class,'store']);

//my offers
Route::get('my-offers/{user:id}', [MyOfferController::class,'create']);

//faq
route::get('/faq', [FaqController::class,'create']);

///////admin
//get view
Route::get('/admin', [AdminController::class,'create'])->middleware('adminsOnly'); //made this middleware myself and added it to the kernel.php file

//users
Route::post('/admin/create-user', [AdminController::class,'storeCreatedUser'])->middleware('adminsOnly');
Route::get('/admin/{user:id}/delete', [AdminController::class,'destroy'])->middleware('adminsOnly');
Route::get('/admin/{user:id}/edit', [AdminController::class,'editUserCreate'])->middleware('adminsOnly');
Route::post('/admin/{user:id}/edit', [AdminController::class,'editUserStore'])->middleware('adminsOnly');




