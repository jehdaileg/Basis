<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ContactForm;

use Illuminate\Support\Carbon;

class ContactController extends Controller
{
    //

    public function getContact()
    {
        return view('pages.contact');
    }

    public function sendMessage(Request $request)
    {
        $validated_datas = $request->validate([

            'name' => 'required',
            'email' => 'email|required',
            'subject' => 'required',
            'message' => 'required'

        ]);

        ContactForm::insert([

            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now()

        ]);

        return back()->with('success', 'Your message has been sent ! 😇');


    }

    public function contactAdmin()
    {

        $contacts = ContactForm::latest()->paginate(10);

        return view('admin.pages.contact', compact('contacts'));

    }
}
