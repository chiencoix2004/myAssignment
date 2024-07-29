<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class usersController extends Controller
{
    public function listUsers()
    {
        $users = User::all();
        return view('admin/users/listUser')
        ->with( [
            'users'=>$users
        ] );
    }

    
    public function addUsers()
    {
        return view('admin.users.addUser');
    }

    public function addPostUsers( Request $req ) {
        $data = [
            'name' => $req->name,
            'email' => $req->email,
            'password' => bcrypt($req->password), // Đảm bảo mật khẩu được mã hóa
            'address' => $req->address,
            'phone' => $req->phone,
            'remember_token' => Str::random(10), // Tạo token ngẫu nhiên
        ];
        User::create( $data );

        return redirect()->route( 'admin.users.listUsers' )
        ->with( [
            'message'=>'Thêm tài khoản thành công'
        ] );
    }
    
    public function deleteUser($userId)
    {
        User::where('id', $userId)->delete();
        return redirect()->route( 'admin.users.listUsers')
        ->with( [
            'message'=>'Xóa thành công'
        ] );
    }

    public function updateUser($userId)
    {
        $users = User::where('id', $userId)->first();
        return view('admin.users.updateUser')
            ->with([
                'users' => $users
            ]);
    }

    public function updatePostUser(Request $req)
    {
        $data = [
            'name' => $req->name,
            'email' => $req->email,
            'password' => bcrypt($req->password), // Đảm bảo mật khẩu được mã hóa
            'address' => $req->address,
            'phone' => $req->phone,
            'remember_token' => Str::random(10), // Tạo token ngẫu nhiên

        ];
        User::where( 'id',$req->userId)->update($data);
        return redirect()->route( 'admin.users.listUsers');
    }

    
    public function detailUser($userId) {
        $user = User::where('id',$userId)->first();
        return view( 'admin.users.detailUser' )
        ->with( [
            'user'=>$user
        ] );
    }
}
