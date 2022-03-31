<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class EmployerRegisterController extends Controller
{
    public function employerRegister(){
        
        $user = User::create([
            
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'user_type' => request('user_type')
        ]);

        Company::create([
            'user_id' => $user->id,
            'cname' => request('cname'),
            'slug' => Str::slug(request('cname'))
        ]);

        return redirect()->to('login');
    }
}
