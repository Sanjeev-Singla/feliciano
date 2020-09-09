<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/*Models*/
use App\Models\Menus;
use App\Models\Categories;
use App\Models\Ingrediants;
use ImageResize;
use App\Image;
class Menu extends Controller
{
    private $view = "admin/templates/menu/";

    public function __construct(){
    	if (session()->has('admin_id') == FALSE) {
    		return redirect('admin');
    	}
    }

    public function index(Request $request){
    	if ($request->post()) {
            $data = $request->all();
            if ($request->hasFile('image')) {
                $this->validate($request,[
                    'image' => 'required|image|mimes:jpeg,png,jpg',
                ]);
                $image = $request->file('image');
                $input['imagename'] = rand().$image->getClientOriginalName();
                $img = ImageResize::make($image->path());
                $img->resize(800, 800, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path("images/menu").'/'.$input['imagename']);
                $data['image'] = url('/public/images/menu/').$input['imagename'];
            }
            $data['category'] = implode(",", $data['category']);
            $data['ingredients'] = implode(",", $data['ingredients']);
            $data['ip'] = $request->ip();
            //dd($data);
            $menu = new Menus($data);
            $result = $menu->save();
            if ($result) {
                session()->flash('class',"success");
                session()->flash('message',"Item Saved Successfully!");
            }else{
                session()->flash('class',"danger");
                session()->flash('message',"Unable to Save!");
            }
            return back();
        }else{
            $ingrediants = Ingrediants::all();
            $categories = Categories::all();
            return view($this->view.'items',compact(['ingrediants','categories']));
        }
    }

    public function ingrediants(Request $request){
        if ($request->isMethod('post')) {
            $check_ingrediant = Ingrediants::whereIngrediant($request->ingrediant)->first();
            if (!empty($check_ingrediant)) {
                session()->flash('class',"danger");
                session()->flash('message',"Ingradiant Already Exists!");
            }else{
                $ingrediants = new Ingrediants($request->all());
                $result = $ingrediants->save();
                if ($result) {
                    session()->flash('class',"success");
                    session()->flash('message',"Ingrediant Saved Successfully!");
                }else{
                    session()->flash('class',"danger");
                    session()->flash('message',"Unable to Save!");
                }
            }
            return back();
        }else{
            $ingrediants = Ingrediants::paginate(10);
            return view($this->view.'ingrediants',compact('ingrediants'));
        }
    }

    public function categories(Request $request){
        if ($request->isMethod('post')) {
            $check_category = Categories::whereCategory($request->category)->first();
            if (!empty($check_category->category)) {
                session()->flash('class',"danger");
                session()->flash('message',"Category Already Exists!");
            }else{
                $categories = new Categories($request->all());
                $result = $categories->save();
                if ($result) {
                    session()->flash('class',"success");
                    session()->flash('message',"Category Saved Successfully!");
                }else{
                    session()->flash('class',"danger");
                    session()->flash('message',"Unable to Save!");
                }
            }
            return back();
        }else{
            $categories = Categories::paginate(10);
            return view($this->view.'categories',compact('categories'));
        }
    }
}
