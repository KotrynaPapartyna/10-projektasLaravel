<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware("auth");

    Route::prefix('tasks')->group(function () {

        Route::get('','TaskController@index')->name('task.index')->middleware("auth");
        Route::get('search','TaskController@search')->name('task.search')->middleware("auth");
        Route::get('filter','TaskController@filter')->name('task.filter')->middleware("auth");
        Route::get('create','TaskController@create')->name('task.create')->middleware("auth");
        Route::post('store','TaskController@store')->name('task.store')->middleware("auth");
        Route::get('edit/{task}', 'TaskController@edit')->name('task.edit')->middleware("auth");
        Route::post('update/{task}','TaskController@update')->name('task.update')->middleware("auth");
        Route::post('delete/{task}','TaskController@destroy')->name('task.destroy')->middleware("auth");
        Route::get('show/{task}','TaskController@show')->name('task.show')->middleware("auth");
        Route::get('/pdf', 'TaskController@generatePDF')->name('task.pdf');
        Route::get('pdfTask/{task}', 'TaskController@generateTaskPDF')->name('task.pdftask');
        Route::get('generateStatistics','TaskController@generateStatisticsPDF')->name('task.generatestatistics');
        });

    Route::prefix('types')->group(function () {

        Route::get('','TypeController@index')->name('type.index')->middleware("auth");
        Route::get('search','TypeController@search')->name('type.search')->middleware("auth");
        Route::get('create','TypeController@create')->name('type.create')->middleware("auth");
        Route::post('store','TypeController@store')->name('type.store')->middleware("auth");
        Route::get('edit/{type}', 'TypeController@edit')->name('type.edit')->middleware("auth");
        Route::post('update/{type}','TypeController@update')->name('type.update')->middleware("auth");
        Route::post('delete/{type}','TypeController@destroy')->name('type.destroy')->middleware("auth");
        Route::get('show/{type}','TypeController@show')->name('type.show')->middleware("auth");
        Route::get('/pdf', 'TypeController@generatePDF')->name('type.pdf');
        Route::get('pdfType/{type}', 'TypeController@generateTypePDF')->name('type.pdftype');
        });

    Route::prefix('owners')->group(function () {

        Route::get('','OwnerController@index')->name('owner.index')->middleware("auth");
        Route::get('search','OwnerController@search')->name('owner.search')->middleware("auth");
        Route::get('create','OwnerController@create')->name('owner.create')->middleware("auth");
        Route::post('store','OwnerController@store')->name('owner.store')->middleware("auth");
        Route::get('edit/{owner}', 'OwnerController@edit')->name('owner.edit')->middleware("auth");
        Route::post('update/{owner}','OwnerController@update')->name('owner.update')->middleware("auth");
        Route::post('delete/{owner}','OwnerController@destroy')->name('owner.destroy')->middleware("auth");
        Route::get('show/{owner}','OwnerController@show')->name('owner.show')->middleware("auth");
        Route::get('/pdf', 'OwnerController@generatePDF')->name('owner.pdf');
        Route::get('pdfOwner/{owner}', 'OwnerController@generateOwnerPDF')->name('owner.pdfowner');


    });

    Route::prefix('paginaton_settings')->group(function () {

        Route::get('','PaginatonSettingController@index')->name('paginaton_setting.index')->middleware("auth");
        Route::get('search','PaginatonSettingController@search')->name('paginaton_setting.search')->middleware("auth");
        Route::get('create','PaginatonSettingController@create')->name('paginaton_setting.create')->middleware("auth");
        Route::post('store','PaginatonSettingController@store')->name('paginaton_setting.store')->middleware("auth");
        Route::get('edit/{paginaton_setting}', 'PaginatonSettingController@edit')->name('paginaton_setting.edit')->middleware("auth");
        Route::post('update/{paginaton_setting}','PaginatonSettingController@update')->name('paginaton_setting.update')->middleware("auth");
        Route::post('delete/{paginaton_setting}','PaginatonSettingController@destroy')->name('paginaton_setting.destroy')->middleware("auth");
        Route::get('show/{paginaton_setting}','PaginatonSettingController@show')->name('paginaton_setting.show')->middleware("auth");



            });

        Auth::routes();

        Route::get('/home', 'HomeController@index')->name('home');
