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

        return back()->with('success', 'Great adding category');
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

        return redirect()->route('cat.all')->with('success', 'Cat updated Successfully');
    }


    public function SoftDelete($id)
    {
        $delete = Category::find($id)->delete();

        return back()->with('success', 'Data Sent to Trash Successfully');
    }


    public function Restore($id)
    {
        $delete = Category::withTrashed()->find($id)->restore();

        return back()->with('success', 'Data Restored Successfully');
    }


    public function DeletePermanent($id)
    {
        $delete = Category::onlyTrashed()->find($id)->forceDelete();

        return back()->with('success', 'Data Deleted Successfully');
    }
}
