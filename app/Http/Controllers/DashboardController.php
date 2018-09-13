<?php

namespace App\Http\Controllers;

use App\Category;
use App\Producer;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected $category_data;
    protected $producer_data;
    public function __construct()
    {
      $this->category_data = (new Category())->get();
      $this->producer_data = (new Producer())->get();
    }

    public function index(){
        if(Auth::check()){
            return view('dashboard',['categories'=>$this->category_data,'producers'=>$this->producer_data]);
        }
        else return redirect()->back();
    }
    public function add_medicine(Request $request,Product $product){
        $data=$request->all();
        $this->validate($request, [
            'medicine_name'=>'required',
            'medicine_weight'=>'required|numeric',
            'medicine_category'=>'required',
            'medicine_producer'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $slug= "med";
            $key=0;
            $path ='img';
            $fileName = "".$slug."-".$key.".".$image->getClientOriginalName();
            $destinationPath = $path;
            $img = \Intervention\Image\Facades\Image::make($image->getRealPath());
            $width = $img->width();
            $heigh = $img->height();
            if($width > $heigh){
                $watermark = \Intervention\Image\Facades\Image::make(public_path('/img/watermark.png'))->resize($heigh,$heigh);
            }
            else{
                $watermark = \Intervention\Image\Facades\Image::make(public_path('/img/watermark.png'))->resize($width, $width);
            }
            $img->insert($watermark, 'center', 0, 0);
            $img->save($destinationPath.'/'.$fileName);

            $product->insert(
                [
                    'product_name'=>$data['medicine_name'],
                    'producer_id' =>$data['medicine_producer'],
                    'category_id' =>$data['medicine_category'],
                    'weight'=>$data['medicine_weight'],
                    'image'=>$destinationPath.'/'.$fileName
                ]
            );

            return back()->with('success','Medicine saved successfully');
        }

    }
}
