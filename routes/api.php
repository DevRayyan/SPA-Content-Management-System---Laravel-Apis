<?php

use App\Http\Controllers\PasswordResetController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PaymentController;

// Public Routes
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/reset-password', [PasswordResetController::class, 'SendResetPasswordEmail']);
Route::post('/reset/{token}', [PasswordResetController::class, 'Reset']);
Route::post('/category', [CategoryController::class, 'Category']);
Route::get('/fetch-review', [ReviewController::class, 'FetchReview']);
Route::post('/send-message', [MessageController::class, 'SendMessage']);
Route::post('/create-team', [TeamController::class, 'CreateTeam']);
Route::post('/fetch-team', [TeamController::class, 'FetchTeam']);
Route::post('/fetch-posts', [PostController::class, 'FetchPost']);
Route::post('/create-payment-intent', [PaymentController::class, 'createPaymentIntent']);
Route::get('/search-post', [PostController::class, 'SearchPost']);


// Protected Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/get-post-data', [PostController::class, 'FetchSinglePost']);
    Route::post('/logout', [UserController::class, 'logout']);
    Route::get('/logged-user', [UserController::class, 'loggedUser']);
    Route::post('/change-password', [UserController::class, 'changePassword']);
    Route::post('/change-profile', [UserController::class, 'changeEmailAndName']);
    Route::post('/review', [ReviewController::class, 'CreateReview']);
    Route::get('/update-payment-status', [PaymentController::class, 'updatePaymentStatus']);
    Route::post('/update-plan', [UserController::class, 'updatePlan']);
    
});
