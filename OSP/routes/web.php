<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\RegisterController;
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


//See posts (filtered / searched or not)
Route::get('/', [OfferController::class, 'filter']);

//see offer details --> route checks if type is In this route definition, {type?} is an optional route parameter. If a type is provided in the URL, it will be passed to the route's callback function. If not, the callback function will still be invoked, but the $type parameter will be null.
Route::get('/offer/{offer:slug}', [OfferController::class, 'show']);

//comments
Route::post('/offer/{offer:slug}/comments-post', [CommentController::class,'store'])->middleware('auth');
Route::post('/offer/{offer:slug}/comments-update/{comments:id}', [CommentController::class,'update'])->middleware('auth'); //todo or to delete
Route::delete('/offer/{offer:slug}/comments-delete/{comments:id}', [CommentController::class,'destroy'])->middleware('auth');



//registration --> makes only sense if you are not logged in. that is why it is using the guest middleware (defined by laravel). 
//The rerouting to home is defined in app/http/kernel -> routeToMiddleWare(), the home constant in App/http/providers/RouteServiceProvider.php
Route::get('/register', [RegisterController::class,'create'])->middleware('guest');
Route::post('/register', [RegisterController::class,'store'])->middleware('guest');

//login / out
Route::get('/login', [SessionController::class,'create'])->middleware('guest');
Route::post('/login', [SessionController::class,'store'])->middleware('guest');
Route::get('/logout', [SessionController::class,'destroy'])->middleware('auth');



