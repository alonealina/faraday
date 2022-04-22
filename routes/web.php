<?php

use Illuminate\Support\Facades\Route;

Route::get('mail_form', 'App\Http\Controllers\FaradayController@mail_form')->name('mail_form');
Route::post('mail_confirm', 'App\Http\Controllers\FaradayController@mail_confirm')->name('mail_confirm');
Route::post('mail_complete', 'App\Http\Controllers\FaradayController@mail_complete')->name('mail_complete');

