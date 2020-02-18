<?php

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

Route::get('/', function() {
    $footer = 'false';
    return view('landing', compact('footer'));
});

Route::get('/home', function() {
    $footer = 'false';
    return view('home', compact('footer'));
});

Route::get('/classificacao', function() {
    return view('Achievements/show');
});

Route::get('trip/{id}/edit', "Trip\TripController@edit")->name('trip.edit');

Route::post('trip/store', "Trip\TripController@store")->name('trip.store');

Route::get('trip/create', "Trip\TripController@create")->name('trip.create');

Route::get('trip/{id}', "Trip\TripController@show")->name('trip.show');

Route::put('trip/{id}', "Trip\TripController@update")->name('trip.update');

Route::delete('/trip/{id}', "Trip\TripController@destroy")->name('trip.destroy');

// Rotas de User

Route::get('/profile/{id}/edit' , "User\UserController@edit")->name('user.edit');

// Inicio das Rotas das Comunidades
// Route::get('index/comunidadeEViagens', 'Group\GroupController@index', 'Trip\TripController@index')->name('index');

Route::get('group/create', 'Group\GroupController@create')->name('group.create');

Route::post('group/store', 'Group\GroupController@store')->name('group.store');

Route::get('group/{id}/edit', 'Group\GroupController@edit')->name('group.edit');;

Route::get('group/{id}', 'Group\GroupController@show')->name('group.show');;

Route::put('group/{id}', 'Group\GroupController@update')->name('group.update');

Route::delete('/group/{id}', "Group\GroupController@destroy")->name('group.destroy');

// Fim das Rotas das Comunidades

Route::get('/linhaDoTempo', function() {
    $footer = 'true';
    return view('user/linhaDoTempo', compact('footer'));
});

Route::get('/login', function() {
    return view('user/login');
});

Route::get('/mensagens', function() {
    $footer = 'true';
    return view('/user/messages/mensagens', compact('footer'));
});

Route::get('/menu', function() {
    $footer = 'false';
    return view('menu', compact('footer'));
});

Route::get('/notificacoes', function() {
    return view('user/notificacoes');
});

Route::get('/novaMensagem', function() {
    return view('user/messages/create');
});

Route::get('/perfil', function() {
    $footer = 'true';
    return view('user/perfil', compact('footer'));
});

Route::get('/topico', function() {
    return view('group/topico');
});

Route::get('/verMensagem', function() {
    return view('user/messages/verMensagem');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
