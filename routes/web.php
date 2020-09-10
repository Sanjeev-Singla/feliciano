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
Route::group(["prefix"=>"/"],function(){

	Route::get('/', "Users\Home@index");

	Route::get("about",function(){
		return view("public/templates/site/about");
	});

	Route::get("blog-single",function(){
		return view("public/templates/site/blog-single");
	});

	Route::get("blogs",function(){
		return view("public/templates/site/blogs");
	});

	Route::get("contact",function(){
		return view("public/templates/site/contact");
	});

	Route::get("menu","Users\Menu@index");

	Route::get("reservation",function(){
		return view("public/templates/site/reservation");
	});

	Route::get("register",function(){
		return view("public/templates/forms/register");
	});
	Route::post("login","Users\Users@register");

	Route::get("login",function(){
		return view("public/templates/forms/login");
	});
	Route::post("login","Users\Users@login");

});

Route::group(["prefix"=>"admin"],function(){

	Route::get("/",function(){
		return view("admin/templates/login");
	});
	Route::post("/","Admin\AdminCtrl@login");

	Route::get("home",function(){
		return view("admin.templates.dashboard");
	});

	/*
	*	MENU ITEMS
	*/
	Route::group(["prefix"=>"menu"],function(){

		Route::match(['get','post'],'items',["as"=>"items","uses"=>"Admin\Menu@index"]);

		Route::match(['get','post'],"ingrediants",["as"=>"ingrediants","uses"=>"Admin\Menu@ingrediants"]);

		Route::match(['get','post'],"categories",["as"=>"categories","uses"=>"Admin\Menu@categories"]);
	});
	
});
