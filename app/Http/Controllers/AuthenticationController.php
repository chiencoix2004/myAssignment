<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function postLogin(Request $req)
    {
        $dataUserLogin = [
            'email' => $req->email,
            'password' => $req->password,
        ];
        $remember = $req->has('remember');
        if (Auth::attempt($dataUserLogin,$remember)) {
            if (Auth::user()->role == '1') {
                //Danwgd nhap thanh cong
                return redirect()->route('admin.categorys.listCategorys')->with([
                    'message' => 'Đăng Nhập thành công'
                ]);
            }else{
                 //Dang nhap vao user
                 return redirect()->route('homeClient');
                //  ->with([
                //     'message' => 'Đăng Nhập thành công'
                // ]);
            }
        } else {
            //Dang nhap that bai
            return redirect()->back()->with([
                'message' => 'Email hoac password khong dung'
            ]);
        }
    }

    public function logout()
    {
       Auth::logout();
       return redirect()->route('login')->with([
        'message' => 'Đăng xuat thành công'
    ]);
    }

    public function register()
    {
        return view('register');
    }

    public function postRegister(Request $req)
    {
       $check = User::where('email',$req->email)->exists();
       if($check){
        return redirect()->back()->with([
            'message' => 'Tai khoan email đã tồn tại'
        ]);
       }else{
        $data = [
            'name'=>$req->name,
            'email'=>$req->email,
            'password'=>Hash::make($req->password),
        ];
        $newUser = User::create($data);

        return redirect()->route('login')->with([
            'message' => 'Dang ky thanh cong. Vui long dang nhap'
        ]);
       }
    }
}
