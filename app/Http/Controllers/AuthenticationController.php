<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserRegistered;
use App\Models\User;

class AuthenticationController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function postLogin(UserLoginRequest $req)
    {
        // $req->validate([
        //     'email'=>'required|email|exists:users,email',
        //     'password'=>'required|min:8',
        // ],[
        //     'email.required'=>'Email không được để trống',
        //     'email.email'=>'Email không đúng định dạng',
        //     'email.exists'=>'Email chưa được đăng ký',
        //     'password.required'=>'Password không được để trống',
        //     'password.min'=>'Password quá ngắn vui lòng 8 ký tự',
        // ]);

        $dataUserLogin = [
            'email' => $req->email,
            'password' => $req->password,
        ];
        $remember = $req->has('remember');
        if (Auth::attempt($dataUserLogin, $remember)) {
            $user = Auth::user();
            if (Auth::user()->role == '1') {
                //Danwgd nhap thanh cong
                return redirect()->route('admin.categorys.listCategorys')->with([
                    'message' => 'Đăng Nhập thành công'
                ]);
            } else {
                //Dang nhap vao user
                return redirect()->route('homeClient')->with([
                    // 'message' => 'Đăng Nhập thành công',
                    'user' => $user  // Truyền thông tin người dùng
                ]);
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

    // public function postRegister(Request $req)
    // {
    //    $check = User::where('email',$req->email)->exists();
    //    if($check){
    //     return redirect()->back()->with([
    //         'message' => 'Tai khoan email đã tồn tại'
    //     ]);
    //    }else{
    //     $data = [
    //         'name'=>$req->name,
    //         'email'=>$req->email,
    //         'password'=>Hash::make($req->password),
    //     ];
    //     $newUser = User::create($data);

    //     return redirect()->route('login')->with([
    //         'message' => 'Dang ky thanh cong. Vui long dang nhap'
    //     ]);
    //    }
    // }

    public function postRegister(UserLoginRequest $req)
    {
        $check = User::where('email', $req->email)->exists();

        if ($check) {
            return redirect()->back()->with([
                'message' => 'Tài khoản email đã tồn tại'
            ]);
        } else {
            $data = [
                'name' => $req->name,
                'email' => $req->email,
                'password' => Hash::make($req->password),
            ];

            $newUser = User::create($data);

            // Gửi email
            Mail::to($newUser->email)->send(new UserRegistered($newUser));

            return redirect()->route('login')->with([
                'message' => 'Đăng ký thành công. Vui lòng đăng nhập'
            ]);
        }
    }
}
