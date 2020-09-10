<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/*Model*/
use App\Models\Menus;


class Home extends Controller
{	
	private $tempalte = 'public/templates/site/';
    public function index(){
    	$items = Menus::whereStatus(1);
    	return view($this->tempalte."home",compact('items'));
    }
}
