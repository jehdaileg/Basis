<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    //

    public function allCat()
    {
        $cats = Category::latest()->paginate(5);

        $trashCat = Category::onlyTrashed()->latest()->paginate(3);

        return view('admin.categories.index', compact('cats', 'trashCat'));
    }
    

    public function addCat(Request $request)
    {
        $validated_datas = $request->validate(
            [
                'name' => 'required|max:10'
            ],
            [
                'name.required' => 'Complete the fill please !!!',
                'name.max' => 'The name must not be greater than 10 caracters !'
            ]
        );

        Category::create($validated_datas);

         $notification = array(

        'message' => 'Great adding Category',

        'alert-type' => 'success'

     );

        return back()->with($notification);
    }


    public function editCat($id)
    {
        $category = Category::find($id);

        return view('admin.categories.edit', compact('category'));
    }


    public function updateCat(Request $request, $id)
    {
        $category = Category::find($id);

        $validated_datas = $request->validate(
            [
                'name' => 'required|max:10'
            ],

            [
                'name.required' => 'Complete the fill please !!!',
                'name.max' => 'The name must not be greater than 10 caracters !'
            ]

        );

        $category->update($validated_datas);

           $notification = array(

        'message' => 'Cat updated Successfully',

        'alert-type' => 'info'

     );

        return redirect()->route('cat.all')->with($notification);
    }


    public function SoftDelete($id)
    {
        $delete = Category::find($id)->delete();

           $notification = array(

        'message' => 'Cat Sended into trash',

        'alert-type' => 'info'

     );

        return back()->with($notification);
    }


    public function Restore($id)
    {
        $delete = Category::withTrashed()->find($id)->restore();


           $notification = array(

        'message' => 'Data Restored Successfully',

        'alert-type' => 'success'

     );

        return back()->with($notification);
    }


    public function DeletePermanent($id)
    {
        $delete = Category::onlyTrashed()->find($id)->forceDelete();

           $notification = array(

        'message' => 'Data Deleted Successfully',

        'alert-type' => 'success'

     );

        return back()->with($notification);
    }
}
