<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('contact/store', 'FrontEndController@store')->name('contacts.store');

