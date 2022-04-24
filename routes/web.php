<?php

use Illuminate\Support\Facades\Route;

Route::get('regist_form', 'App\Http\Controllers\FaradayController@regist_form')->name('regist_form');

Route::get('regist_complete', 'App\Http\Controllers\FaradayController@regist_complete')->name('regist_complete');
Route::post('regist_confirm', 'App\Http\Controllers\FaradayController@regist_confirm')->name('regist_confirm');
Route::post('regist_complete', 'App\Http\Controllers\FaradayController@regist_complete')->name('regist_complete');
Route::get('mail_form', 'App\Http\Controllers\FaradayController@mail_form')->name('mail_form');
Route::post('mail_confirm', 'App\Http\Controllers\FaradayController@mail_confirm')->name('mail_confirm');
Route::post('mail_complete', 'App\Http\Controllers\FaradayController@mail_complete')->name('mail_complete');

