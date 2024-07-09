<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Contact
    Route::post('contacts/media', 'ContactApiController@storeMedia')->name('contacts.storeMedia');
    Route::apiResource('contacts', 'ContactApiController', ['except' => ['store']]);
});

