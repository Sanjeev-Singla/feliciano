<?php

namespace App\Http\Controllers\Admin;

/*Models*/
use App\Models\Admin;

/*Requests*/
use Illuminate\Http\Request;

/*Controllers*/
use App\Http\Controllers\Controller;

/*Requests*/
use App\Http\Requests\AdminLoginRequest;

class AdminCtrl extends Controller
{
    /*public function __construct(){

    }*/

    public function login(AdminLoginRequest $request){
    	$admin = Admin::whereName($request->username)->first();
    	if (isset($admin)) {
    		if ($request->password == $admin->password){
    			//session()->put("admin_token",$token);
    			session()->flash('message', 'Successfully LoggedIn'); 
				session()->flash('alert-class', 'alert-success');
				return redirect("admin/home");
			}else{
	    		session()->flash('message', 'Incorrect Password'); 
				session()->flash('alert-class', 'alert-danger');
				return redirect("admin");
	    	}
    	}else{
    		session()->flash('message', 'Invalid Username'); 
			session()->flash('alert-class', 'alert-danger');
			return redirect("admin");
    	}
    }
}
