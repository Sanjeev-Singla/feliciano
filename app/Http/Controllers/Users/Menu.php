<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/*Model*/
use App\Models\Menus;
use App\Models\Categories;

class Menu extends Controller
{
    private $tempalte = 'public/templates/site/';
    public function index(){
    	$menus = Menus::whereStatus(1)->get();
    	$categories = Categories::all();
    	return view($this->tempalte."menu",compact('menus','categories'));
    }
}
