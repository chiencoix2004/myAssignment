<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function listCategorys()
    {
        $categorys = Category::all();
        return view('admin/categorys/listCategory')
            ->with([
                'categorys' => $categorys
            ]);
    }
    public function addCategorys()
    {
        return view('admin/categorys/addCategory');
    }

    // public function addPostCategorys( Request $req ) {
    //     $data = [
    //         'nameCategory' => $req->name,
    //     ];
    //     Category::create( $data );

    //     return redirect()->route( 'admin.categorys.listCategorys' )
    //     ->with( [
    //         'message'=>'Thêm danh mục thành công'
    //     ] );
    // }
    public function addPostCategorys(Request $req)
    {
        // Xác thực dữ liệu với các thông báo lỗi tùy chỉnh
        $validatedData = $req->validate([
            'name' => 'required|string|max:255',
        ], [
            'name.required' => 'Bạn cần nhập tên danh mục.',
            'name.string' => 'Tên danh mục phải là chuỗi ký tự.',
            'name.max' => 'Tên danh mục không được vượt quá 255 ký tự.',
        ]);

        // Tạo dữ liệu cho danh mục mới
        $data = [
            'nameCategory' => $validatedData['name'],
        ];
        Category::create($data);

        // Chuyển hướng và hiển thị thông báo thành công
        return redirect()->route('admin.categorys.listCategorys')
            ->with('message', 'Thêm danh mục thành công');
    }

    // public function deleteCategorys($categoryId)
    // {
    //     Category::where('id', $categoryId)->delete();
    //     return redirect()->route('admin.categorys.listCategorys');
    // }
    public function deleteCategorys(Request $req){
        $category = Category::find($req->categoryId);
        // if($product->image !=null && $product->image !=''){
        //     File::delete(public_path($product->image));
        // }
        $category->delete();
        return redirect()->back()
        ->with( [
            'message'=>'xóa thành công'
        ] );
    }

    public function updateCategorys($categoryId)
    {
        $categorys = Category::where('id', $categoryId)->first();
        return view('admin.categorys.updateCategory')
            ->with([
                'categorys' => $categorys
            ]);
    }

    // public function updatePostCategorys(Request $req)
    // {
    //     // Xác thực dữ liệu với các thông báo lỗi tùy chỉnh
    //     $validatedData = $req->validate([
    //         'name' => 'required|string|max:255',
    //     ], [
    //         'name.required' => 'Bạn cần nhập tên danh mục.',
    //         'name.string' => 'Tên danh mục phải là chuỗi ký tự.',
    //         'name.max' => 'Tên danh mục không được vượt quá 255 ký tự.',
    //     ]);

    //     // Tạo dữ liệu cho danh mục mới
    //     $data = [
    //         'nameCategory' => $validatedData['name'],
    //     ];
    //     Category::where('id', $req->categoryId)->update($data);
    //     return redirect()->route('admin.categorys.listCategorys')
    //     ->with('message', 'Sửa danh mục thành công');
    // }
    public function updatePostCategorys(Request $req)
    {
        // Xác thực dữ liệu
        $validatedData = $req->validate([
            'name' => 'required|string|max:255',
        ], [
            'name.required' => 'Bạn cần nhập tên danh mục.',
            'name.string' => 'Tên danh mục phải là chuỗi ký tự.',
            'name.max' => 'Tên danh mục không được vượt quá 255 ký tự.',
        ]);

        // Cập nhật dữ liệu cho danh mục
        $data = [
            'nameCategory' => $validatedData['name'],
        ];
        Category::where('id', $req->categoryId)->update($data);

        // Chuyển hướng và hiển thị thông báo thành công
        return redirect()->route('admin.categorys.listCategorys')
            ->with('message', 'Cập nhật danh mục thành công');
    }

    // public function searchProducts(){
    //     $data = $_GET['timkiem'];
    //     $timkiem = DB::table('product')->where('name','like','%'.$data.'%')
    //     ->join('category', 'category.id', '=', 'product.category_id')
    //         ->select('product.id', 'product.name', 'product.price', 'product.category_id', 'category.nameCategory', 'product.price', 'product.view', 'product.create_at', 'product.update_at')
    //         ->get();

    //     return view('products/searchProducts')
    //         ->with(['timkiem' => $timkiem]);

    // }
}
