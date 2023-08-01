<?php

use Illuminate\Support\Facades\Route;


Route::get('/reset', function () {
    return view('reset');
});
