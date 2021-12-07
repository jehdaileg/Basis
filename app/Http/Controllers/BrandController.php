<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Brand;

use Illuminate\Support\Carbon;

use Illuminate\Support\Facades\Auth;


class BrandController extends Controller
{
    //
    public function index()
    {
        $brands = Brand::latest()->paginate(5);

        $trashBrand = Brand::onlyTrashed()->latest()->paginate(5);

        return view('admin.brands.index', compact('brands', 'trashBrand'));
    }

    public function addBrand(Request $request)
    {

      $validated_datas = $request->validate(
        [
            'name' => 'required|max:8',
            'image' => 'image|mimes:jpeg,jpg,png'
        ],
        [
            'name.required' => 'Please fill the input !',
            'image.max' => 'The image max size must be respected please !'

        ]
    );

      /* Image features */

      //get image
      $image = $request->file('image');

      //extension 
      $image_extension = strtolower($image->getClientOriginalExtension());

      //random generation name image 
      $image_gen_name = hexdec(uniqid());

      //image_partial to send in the path 
      $image_partial = $image_gen_name. '.' .$image_extension;

      //path to move the image 
      $path = "images/brands/";

      //image to send in database => { $path/$image_partial}
      $image_final = $path.$image_partial;

      //move the image in the concerned folder (for our image)
      $image->move($path, $image_partial);

      Brand::insert([

        'name' => $request->name,

        'image' => $image_final,

        'created_at' => Carbon::now()

    ]);

     $notification = array(

        'message' => 'Great adding Brand',

        'alert-type' => 'success'

     );

      return back()->with($notification);


  }

  public function editBrand($id)
  {
    $brand = Brand::find($id);

    return view('admin.brands.edit', compact('brand'));

}

public function updateBrand($id, Request $request)
{
    $brand = Brand::find($id);

    $validated_datas = $request->validate(
        [
            'name' => 'required|max:8',
        ],

        [
            'name.required' => 'Please fill the input !',

        ]
    );

    $old_image = $request->old_image;

    $image = $request->file('image');


    if($image)
    {


      //extension 
        $image_extension = strtolower($image->getClientOriginalExtension());

      //random generation name image 
        $image_gen_name = hexdec(uniqid());

      //image_partial to send in the path 
        $image_partial = $image_gen_name. '.' .$image_extension;

      //path to move the image 
        $path = "images/brands/";

      //image to send in database => { $path/$image_partial}
        $image_final = $path.$image_partial;

      //move the image in the concerned folder (for our image)
        $image->move($path, $image_partial);

        unlink($old_image);

        Brand::find($id)->update([

            'name' => $request->name,

            'image' => $image_final,

            'created_at' => Carbon::now()

        ]);

        $notification = array(

            'message' => 'Great Edited Successfully',
            'alert-type' => 'info'

        );

        return redirect()->route('brands.all')->with($notification);

    }
    else 
    {
      Brand::find($id)->update([

        'name' => $request->name,

        'created_at' => Carbon::now()

    ]);

       $notification = array(

            'message' => 'Great Edited Successfully',
            'alert-type' => 'info'

        );


       return redirect()->route('brands.all')->with($notification);


  }



}

public function SoftDelete($id)
{
    $brand = Brand::find($id);

    $delete = $brand->delete();

      $notification = array(

            'message' => 'Great Edited Successfully',
            'alert-type' => 'info'

        );


    return back()->with($notification);
}


public function restore($id)
{
    $restore = Brand::withTrashed()->find($id)->restore();

     $notification = array(

            'message' => 'Brand restored successfully',
            'alert-type' => 'success'

        );


    return back()->with($notification);
}

public function deleteP($id)
{

    $toDelete = Brand::onlyTrashed()->find($id);

       // $old_image = $toDelete->image;

    unlink($toDelete->image);

    $deleteBP = Brand::onlyTrashed()->find($id)->forceDelete();

     $notification = array(

            'message' => 'Brand Deleted successfully',
            'alert-type' => 'success'

        );

    return back()->with($notification);


}


public function logout()
{
    Auth::logout();

    return redirect()->route('login');
}



}
