<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/*Models*/
use App\Models\Chef;
use ImageResize;
use App\Image;

class Saucier extends Controller
{
	private $view = "admin/templates/saucier/";

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
                $img->resize(900, 800, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path("images/saucier").'/'.$input['imagename']);
                $data['image'] = url('/public/images/saucier').'/'.$input['imagename'];
            }else{
            	$data['image'] = "";
            }

            $data['ip'] = $request->ip();
            $chef = new Chef($data);
            $result = $chef->save();
            if ($result) {
                session()->flash('class',"success");
                session()->flash('message',"Chef Details Saved Successfully!");
            }else{
                session()->flash('class',"danger");
                session()->flash('message',"Unable to Save!");
            }
            return back();
        }else{
            $sauciers = Chef::whereStatus(1)->paginate(10);
            return view($this->view.'saucier',compact(['sauciers']));
        }
    }

    public function edit_saucier(Request $request,$saucier_id){
        if ($request->isMethod('post')) {
            $data = $request->post();
            $saucier  = Chef::find($saucier_id);
            $saucier->fill($data);
            $saucier->save();
            return back();
        }else{
            $saucier = Chef::find($saucier_id);
            echo json_encode($saucier);
        }
    }

    public function delete_saucier($saucier_id){
    	$chef = Chef::find($saucier_id);
    	if(\File::exists($chef->image)){
  			\File::delete($chef->image);
		}
    	$result = Chef::Destroy($saucier_id);
        $response['class'] = "success";
        $response['message'] = "Saucier Deleted Successfully";
        return json_encode($response);
    }
}
