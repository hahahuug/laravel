<?php

use Illuminate\Support\Facades\Route;

Route::get('/hello', function () {
    return response('Hello, world!', 200);
});


