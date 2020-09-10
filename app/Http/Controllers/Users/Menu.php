<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/*Model*/
use App\Models\Menus;

class Menu extends Controller
{
    private $tempalte = 'public/templates/site/';
    public function index(){
    	$menus = Menus::whereStatus(1)->get();
    	return view($this->tempalte."menu",compact('menus'));
    }
}
