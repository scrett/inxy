<?php

use Illuminate\Support\Facades\Route;

//Стартовая страница
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

//Обзор товаров доступный всем
Route::get('/product-view', 'ProductController@allDataView')->name('product-data-view');

Auth::routes();
    //Страница подтверждения авторизации
    Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

    //Роуты доступные администратору
Route::group(['middleware' => 'admin'], function () {
    //Стартова страница администратора с отображение товаров
    Route::get('/admin', 'ProductController@allData')->name('product-data-all');
    //Переадресация на подробное описание определенного товара
    Route::get('/product/all/{id}', 'ProductController@showOneData')->name('product-data-one');
    //Переадресация на функцию удалить товар
    Route::get('/product/all/{id}/delete', 'ProductController@delete')->name('product-delete');
    //Переадресация на форму обновить товар
    Route::get('/product/all/{id}/updata', 'ProductController@updata')->name('product-updata');
    //Переадресация на форму добавления нового товара
    Route::get('/product/add', 'ProductController@add')->name('product-add');
    //Переадресация на функцию добавить товар
    Route::post('/product/submit', 'ProductController@addSubmit')->name('product-add-submit');
    //Переадресация на функцию обновить товар
    Route::post('/product/all/{id}/updata', 'ProductController@updataSubmit')->name('product-updata-submit');
    //Переадресация на функцию загрузить файл json
    Route::post('/product/load', 'ProductController@load')->name('product-load');
});





