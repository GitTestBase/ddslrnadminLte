<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function register()
    {
        return view('Auth.register');
    }

    public function registerPost(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'min:6',
            'password_confirmation' => 'min:6|required_with:password|same:password',
            'phone' =>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ]);

        if($validate->fails())
        {
            return response()->json(['success'=>0,'response'=> $validate->errors()->messages()]);
        }
        else{

            $user = User::firstorNew(['email'=>$request->email]);
            if(!$user->exists)
            {
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->phone = $request->phone;
                $user->role = 1;
                $user->save();

                if($user == true)
                {
                    return response()->json(['success'=>1,'response'=>'User registered Successfully!']);
                }
                else{
                    return response()->json(['success'=>0,'response'=>'Something went wrong!!']);
                }
            }
            else{
                return response()->json(['success'=>2,'response'=>'User Already Exists']);
            }
        }
    }

    public function loginPost(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if($validate->fails())
        {
            return response()->json(['success'=>0,'response'=> $validate->errors()->messages()]);
        }
        else{
            
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password]) == true)
            {
                return redirect()->route('dashboard')->with('success', 'Login successfully!');
            }
            else{
                return redirect()->back()->with('error', 'Login fail!');
            }
        }
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
