<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Menu extends Controller
{
    public function __construct(){
    	if (session()->has('admin_id') == FALSE) {
    		return redirect('admin');
    	}
    }

    public function index(){
    	
    }
}
