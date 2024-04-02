<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController; // Menggunakan ReviewController
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\TestimoniController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware'=> 'api',
    'prefix'=>'auth'
], function () {
    Route::post('login',[AuthController::class, 'login'])->name('login');
});

Route::group([
    'middleware' => 'api'
], function () {
    Route::resources([
        'categories' => CategoryController::class,
        'subcategories' => SubcategoryController::class,
        'sliders'=> SliderController::class,
        'products'=> ProductController::class,
        'members'=>MemberController::class,
        'testimoni'=>TestimoniController::class,
        'reviews'=>ReviewController::class, // Menggunakan ReviewController
    ]);
});
Route::put('sliders/{slider}', [SliderController::class, 'update']);
