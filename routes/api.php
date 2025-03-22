<?php

use App\Actions\CreateContactAction;
use App\Http\Requests\CreateContactRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('contact', function (CreateContactAction $action, CreateContactRequest $request): JsonResponse {
    $action->handle($request);

    return response()->json([
        'message' => 'Contact created successfully, we will get back to you soon.'
    ], 200);
})->middleware('throttle:contact');
