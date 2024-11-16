<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::post('/upload', function () {
    $files = request()->file('files');

    foreach ($files as $file) {
        $file->store('uploads');
    }

    return response()->json([
        'message' => 'File uploaded successfully',
        'status' => 200
    ]);
});
