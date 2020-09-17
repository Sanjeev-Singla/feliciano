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
    	if ($request->isMethod('post')) {
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
                $data['image'] = url('/public/images/menu').'/'.$input['imagename'];
            }else{
                $data['image'] = "";
            }
            $data['category'] = implode(",", $data['category']);
            $data['ingredients'] = implode(",", $data['ingredients']);
            $data['ip'] = $request->ip();

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
            $items = Menus::whereStatus(1)->paginate(10);
            return view($this->view.'items',compact(['ingrediants','categories','items']));
        }
    }

    public function delete_item($item_id){
        $item = Menus::find($item_id);

        if(\File::exists($item->image)){
            \File::delete($item->image);
        }
        
        Menus::Destroy($item_id);
        $response['class'] = "success";
        $response['message'] = "Item Deleted Successfully";
        return json_encode($response);
    }

    /*
    *   MENU ITEM INGREDIANTS
    */
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


    public function delete_ingredient($ingredient_id){
        $result = Ingrediants::Destroy($ingredient_id);
        $response['class'] = "success";
        $response['message'] = "Ingredient Deleted Successfully";
        return json_encode($response);
    }


    /*
    *   MENU ITEM CATEGORY
    */
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

    public function edit_item(Request $request,$item_id){
        if ($request->isMethod('post')) {
            $data = $request->all();
            $menu = Menus::find($item_id);

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

                // Removing previous Image
                if(\File::exists($menu->image)){
                    \File::delete($menu->image);
                }

                $data['image'] = url('/public/images/menu').'/'.$input['imagename'];
            }

            $data['category'] = implode(",", $data['category']);
            $data['ingredients'] = implode(",", $data['ingredients']);
            $data['ip'] = $request->ip();
            
            $menu->fill($data);
            $result = $menu->save();
            if ($result) {
                session()->flash('class',"success");
                session()->flash('message',"Item Updated Successfully!");
            }else{
                session()->flash('class',"danger");
                session()->flash('message',"Unable to Update!");
            }
            return back();
        }else{
            $item = Menus::find($item_id);
            $item['ingrediants'] = explode(",", $item['ingredients']);
            $item['categories'] = explode(",", $item['category']);
            echo json_encode($item);
        }
    }

    public function delete_category($category_id){
        $result = Categories::Destroy($category_id);
        $response['class'] = "success";
        $response['message'] = "Category Deleted Successfully";
        return json_encode($response);
    }
}
