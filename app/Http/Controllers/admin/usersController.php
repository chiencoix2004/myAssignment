<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
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

    // public function addPostUsers( Request $req ) {
    //     $data = [
    //         'name' => $req->name,
    //         'email' => $req->email,
    //         'password' => bcrypt($req->password), // Đảm bảo mật khẩu được mã hóa
    //         'address' => $req->address,
    //         'phone' => $req->phone,
    //         'remember_token' => Str::random(10), // Tạo token ngẫu nhiên
    //     ];
    //     User::create( $data );

    //     return redirect()->route( 'admin.users.listUsers' )
    //     ->with( [
    //         'message'=>'Thêm tài khoản thành công'
    //     ] );
    // }
    public function addPostUsers(Request $req)
{
    // Xác thực dữ liệu đầu vào
    $validatedData = $req->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email',
        'password' => 'required|string|min:8',
        'address' => 'nullable|string|max:255',
        'phone' => 'nullable|string|max:15',
    ], [
        'name.required' => 'Bạn cần nhập tên.',
        'name.string' => 'Tên phải là chuỗi ký tự.',
        'name.max' => 'Tên không được vượt quá 255 ký tự.',
        'email.required' => 'Bạn cần nhập email.',
        'email.string' => 'Email phải là chuỗi ký tự.',
        'email.email' => 'Email không hợp lệ.',
        'email.max' => 'Email không được vượt quá 255 ký tự.',
        'email.unique' => 'Email này đã tồn tại trong hệ thống.',
        'password.required' => 'Bạn cần nhập mật khẩu.',
        'password.string' => 'Mật khẩu phải là chuỗi ký tự.',
        'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
        'address.string' => 'Địa chỉ phải là chuỗi ký tự.',
        'address.max' => 'Địa chỉ không được vượt quá 255 ký tự.',
        'phone.string' => 'Số điện thoại phải là chuỗi ký tự.',
        'phone.max' => 'Số điện thoại không được vượt quá 15 ký tự.',
    ]);

    // Tạo dữ liệu cho người dùng mới
    $data = [
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => Hash::make($validatedData['password']), // Mã hóa mật khẩu
        'address' => $validatedData['address'] ?? null,
        'phone' => $validatedData['phone'] ?? null,
        'remember_token' => Str::random(10), // Tạo token ngẫu nhiên
    ];

    // Lưu người dùng mới vào cơ sở dữ liệu
    User::create($data);

    // Chuyển hướng và hiển thị thông báo thành công
    return redirect()->route('admin.users.listUsers')
        ->with('message', 'Thêm tài khoản thành công');
}
    
    // public function deleteUser($userId)
    // {
    //     User::where('id', $userId)->delete();
    //     return redirect()->route( 'admin.users.listUsers')
    //     ->with( [
    //         'message'=>'Xóa thành công'
    //     ] );
    // }
    public function deleteUser(Request $req){
        $user = User::find($req->userId);
        $user->delete();
        return redirect()->back()
        ->with( [
            'message'=>'xóa thành công'
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

    // public function updatePostUser(Request $req)
    // {
    //     $data = [
    //         'name' => $req->name,
    //         'email' => $req->email,
    //         'password' => bcrypt($req->password), // Đảm bảo mật khẩu được mã hóa
    //         'address' => $req->address,
    //         'phone' => $req->phone,
    //         'role' => $req->role,
    //         'remember_token' => Str::random(10), // Tạo token ngẫu nhiên

    //     ];
    //     User::where( 'id',$req->userId)->update($data);
    //     return redirect()->route( 'admin.users.listUsers');
    // }

    public function updatePostUser(Request $req)
{
    // Lấy người dùng hiện tại
    $user = User::findOrFail($req->userId);

    // Xác thực dữ liệu đầu vào
    $validatedData = $req->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
        'current_password' => 'required_with:password|string',
        'password' => 'nullable|string|min:8',
        'address' => 'nullable|string|max:255',
        'phone' => 'nullable|string|max:15',
        'role' => 'required|integer|in:1,2', // 1 là admin, 2 là client
    ], [
        'name.required' => 'Bạn cần nhập tên.',
        'name.string' => 'Tên phải là chuỗi ký tự.',
        'name.max' => 'Tên không được vượt quá 255 ký tự.',
        'email.required' => 'Bạn cần nhập email.',
        'email.string' => 'Email phải là chuỗi ký tự.',
        'email.email' => 'Email không hợp lệ.',
        'email.max' => 'Email không được vượt quá 255 ký tự.',
        'email.unique' => 'Email này đã tồn tại trong hệ thống.',
        'current_password.required_with' => 'Bạn cần nhập mật khẩu cũ để thay đổi mật khẩu.',
        'password.string' => 'Mật khẩu phải là chuỗi ký tự.',
        'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
        'address.string' => 'Địa chỉ phải là chuỗi ký tự.',
        'address.max' => 'Địa chỉ không được vượt quá 255 ký tự.',
        'phone.string' => 'Số điện thoại phải là chuỗi ký tự.',
        'phone.max' => 'Số điện thoại không được vượt quá 15 ký tự.',
        'role.required' => 'Bạn cần chọn vai trò.',
        'role.integer' => 'Vai trò phải là số nguyên.',
        'role.in' => 'Vai trò không hợp lệ. Chỉ có 1 (admin) và 2 (client).',
    ]);

    // Kiểm tra mật khẩu cũ và cập nhật mật khẩu mới nếu có
    if ($req->filled('password')) {
        // Kiểm tra xem mật khẩu cũ có khớp không
        if (!Hash::check($req->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Mật khẩu cũ không đúng.']);
        }

        // Mã hóa mật khẩu mới
        $validatedData['password'] = Hash::make($validatedData['password']);
    } else {
        // Nếu không nhập mật khẩu mới, giữ nguyên mật khẩu cũ
        unset($validatedData['password']);
    }

    // Cập nhật dữ liệu người dùng
    $user->update($validatedData);

    // Chuyển hướng và hiển thị thông báo thành công
    return redirect()->route('admin.users.listUsers')
        ->with('message', 'Cập nhật thông tin người dùng thành công');
}
    public function detailUser($userId) {
        $user = User::where('id',$userId)->first();
        return view( 'admin.users.detailUser' )
        ->with( [
            'user'=>$user
        ] );
    }
}
