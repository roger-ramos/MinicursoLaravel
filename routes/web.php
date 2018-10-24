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
Route::get('/', 'PostsController@allPosts');

//acessp a tela de login
Route::get('/login', 'LoginController@showLogin');

//enviar os dados do formulario
Route::post('/login', 'LoginController@submitLogin');

//mostrar tela de cadastro usuario
Route::get('/criar-conta', 'RegisterController@showRegister');

//enviar os dados do usuario
Route::post('/criar-conta', 'RegisterController@createAccount');

//logout
Route::get('/logout', 'LoginController@logout');

Route::get('/artigo/{slug}', 'PostsController@getPost');

Route::get('/artigo/remover/{slug}', 'PostsController@deletePost');

Route::get('/artigo/editar/{slug}', 'PostsController@getPostEdit');

Route::get('/criar-artigo', 'PostsController@createPost');

Route::post('/criar-artigo', 'PostsController@postSubmit');