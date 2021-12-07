<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth as AuthConnectedUser;

use Illuminate\Support\Facades\Hash;

use App\Models\User;


class ProfilUserController extends Controller
{
    //

    public function changePassword()
    {
        return view('admin.users.changepass');
    }

    public function updatePassword(Request $request)
    {

        $validated_passwords = $request->validate([

            'current_password' => 'required',
            'password' => 'required|confirmed'


        ],

        [
            'current_password.required' => 'Please tap the password',
            'password.confirmed' => 'The two passwords must match'

        ]

    );

        $user_connected = AuthConnectedUser::user();

      //return $user_connected;

        $current_password = $user_connected->password;

        $hashedUserPassword = AuthConnectedUser::user()->password;


        if(Hash::check($request->current_password, $hashedUserPassword))
        {

         $user_find = User::find(AuthConnectedUser::id());

         $user_find->password = Hash::make($request->password);

         $user_find->save();

         return redirect()->route('login')->with('success', 'Password updated successfully');

     }else 
     {
        return back()->with('status', 'Please, the current password is not correct !');
    }

}

    public function setProfile()
    {

        $user = User::find(AuthConnectedUser::user()->id);

        return view('admin.users.profil', compact('user'));

    }

    public function updateProfil(Request $request)
    {
         $validated_datas = $request->validate([

            'name' => 'required',
            'email' => 'required|email'


        ],

        [
            'name.required' => 'Please tap the name',
            'email.email' => 'valid email please'

        ]

    );

         $user = User::find(AuthConnectedUser::user()->id);

         if ($user)
         {
            $user->name = $request->name;

            $user->email = $request->email;

            $user->save();

            return redirect()->route('dashboard')->with('success', 'Profile updated successfully');
         }



    }
}
