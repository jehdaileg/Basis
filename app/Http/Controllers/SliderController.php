<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Slider;

use Illuminate\Support\Carbon;


class SliderController extends Controller
{
    //

    public function index()
    {

        $sliders = Slider::latest()->paginate(5);

        $trashSliders = Slider::onlyTrashed()->latest()->paginate(5);

        return view('admin.sliders.index', compact('sliders', 'trashSliders'));

    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(Request $request)
    {
        $validated_datas = $request->validate(

            [
                'title' => 'required',
                'description' => 'required',
                'image' => 'image|mimes:jpeg,jpg,png'
            ],
            [
                'title.required' => 'Please, fill the input !',
                'description.required' => 'Please fill the input !',
                'image.max' => 'Invalid file choosen !'
            ]
        );

        $image = $request->file('image');

        $extension = strtolower($image->getClientOriginalExtension());

        $random_name = hexdec(uniqid());

        $temp_name = $random_name. '.' .$extension;

        $directory = 'images/sliders/';

        $image_db = $directory.$temp_name;

        $image->move($directory, $temp_name);

        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image_db,
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('sliders.all')->with('success', 'Great adding Slider');


    }

    public function SoftDelete($id)
    {
        $slide = Slider::find($id);

        $slide->delete();

        return back()->with('success', 'Slider has been sent in trash successfully');

    }

    public function restore($id)
    {
        $slider = Slider::withTrashed()->find($id)->restore();

        return back()->with('success', 'Slider has been restored successfully');

    }

    public function deleteP($id)
    {
        $slider = Slider::onlyTrashed()->find($id);

        unlink($slider->image);

        $deleteP = $slider->forceDelete();


        return back()->with('success', 'Slider has been deleted successfully');
    }

    public function edit($id)
    {
        $slider = Slider::find($id);

        return view('admin.sliders.edit', compact('slider'));
    }

    public function update($id, Request $request)
    {
        $sliderToEdit = Slider::find($id);

        $validated_datas = $request->validate(

            [
                'title' => 'required',
                'description' => 'required',
                'image' => 'image|mimes:jpeg,jpg,png'
            ],
            [
                'title.required' => 'Please, fill the input !',
                'description.required' => 'Please fill the input !',
                'image.max' => 'Invalid file choosen !'
            ]
        );

        $old_image = $request->old_image;

        if($request->file('image'))
        {
         $image = $request->file('image');

         $extension = strtolower($image->getClientOriginalExtension());

         $random_name = hexdec(uniqid());

         $temp_name = $random_name. '.' .$extension;

         $directory = 'images/sliders/';

         $image_db = $directory.$temp_name;

         $image->move($directory, $temp_name);

         unlink($old_image);

         $sliderToEdit->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image_db,
            'created_at' => Carbon::now()
        ]);

         return redirect()->route('sliders.all')->with('success', 'Great Updated Slider');


     }
     else{


         $sliderToEdit->update([
            'title' => $request->title,
            'description' => $request->description,
            'created_at' => Carbon::now()
        ]);

         return redirect()->route('sliders.all')->with('success', 'Great Updated Slider');


     }
 }
}
