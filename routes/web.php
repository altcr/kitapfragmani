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

Route::get('/', "frontend\GetController@get_index");
Route::get('/giris', "frontend\GetController@get_giris");
Route::get('/detail/{slug}', "frontend\GetController@get_detail");
Route::get('/category/{slug}', "frontend\GetController@get_category");
Route::get('/contact', "frontend\GetController@get_contact");
Route::get('/about', "frontend\GetController@get_about");
Route::post('/contact', "frontend\PostController@post_contact");
Route::post('/comment-add/{id}', "frontend\PostController@post_comment");
Route::get('/search', "frontend\GetController@get_search");

Route::group(["prefix" => "Panel", "middleware" => "admin"], function(){
  Route::get("/", "backend\GetController@get_index");
  Route::get("/content", "backend\GetController@get_content");
    Route::get("/content-add", "backend\GetController@get_content_add");
    Route::post("/content-add", "backend\PostController@post_content_add");
    Route::get("/content-update/{id}", "backend\GetController@get_content_update");
    Route::post("/content-update/{id}", "backend\PostController@post_content_update");
    Route::get("/content-delete/{id}", "backend\PostController@post_content_delete");
  Route::get("/comments", "backend\GetController@get_comments");
    Route::get("/comment-delete/{id}", "backend\PostController@get_comment_delete");
    Route::get("/comment-check/{id}", "backend\PostController@get_comment_check");
  Route::get("/category", "backend\GetController@get_category");
    Route::get("/category-add", "backend\GetController@get_category_add");
    Route::post("/category-add", "backend\PostController@post_category_add");
    Route::get("/category-update/{id}", "backend\GetController@get_category_update");
    Route::post("/category-update/{id}", "backend\PostController@post_category_update");
    Route::get("/category-delete/{id}", "backend\PostController@post_category_delete");
  Route::get("/contact", "backend\GetController@get_contact");
    Route::get("/contact-delete/{id}", "backend\PostController@post_contact_delete");
    Route::get("/contact-detail/{id}", "backend\PostController@post_contact_detail");
  Route::get("/password-reset", "backend\GetController@get_password");
  Route::get("/settings", "backend\GetController@get_settings");
  Route::post("/settings", "backend\PostController@post_settings");
  Route::get("/social", "backend\GetController@get_social");
    Route::get("/social-add", "backend\GetController@get_social_add");
    Route::post("/social-add", "backend\PostController@post_social_add");
    Route::get("/social-delete/{id}", "backend\PostController@post_social_delete");
    Route::get("/social-update/{id}", "backend\GetController@get_social_update");
    Route::post("/social-update/{id}", "backend\PostController@post_social_update");
    Route::get('/cikis', "frontend\GetController@get_cikis");
});

Auth::routes();
