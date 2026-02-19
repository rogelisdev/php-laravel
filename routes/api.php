<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductoApiController;

Route::name('api.')->group(function () {

    Route::apiResource('productos', ProductoApiController::class);

});
