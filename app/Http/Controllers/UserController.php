<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class UserController extends Controller
{
    public function index(){
        return view('profile.index');
    }
    public function store(Request $request){
        $user_id = auth()->user()->id;
        Profile::where('user_id', $user_id)->update([
            'address' => request('address'),
            'experience' => request('experience'),
            'bio' => request('bio'),
        ]);

        return redirect()->back()->with('message', 'Profile successfully updated');

    }

    public function coverletter(Request $request){
        $user_id = auth()->user()->id;
        $coverletter = $request->file('cover_letter')->store('public/files');
        Profile::where('user_id', $user_id)->update([
            'cover_letter' => $coverletter
        ]);

        return redirect()->back()->with('message', 'Cover letter successfully updated');
    }

    public function resume(Request $request){
        $user_id = auth()->user()->id;
        $resume = $request->file('resume')->store('public/files');
        Profile::where('user_id', $user_id)->update([
            'resume' => $resume
        ]);

        return redirect()->back()->with('message', 'Resume successfully updated');
    }

    public function avatar(Request $request){
        $user_id = auth()->user()->id;
        if($request->hasfile('avatar')){
            $file = $request->file('avatar');
            $ext = $file->getClientOriginalExtension();
            $filename = time(). '.' .$ext;
            $file->move('uploads/avatar', $filename);
            Profile::where('user_id', $user_id)->update([
                'avatar' => $filename
            ]);

        }
      

        return redirect()->back()->with('message', 'Avatar successfully updated');
    }
}
