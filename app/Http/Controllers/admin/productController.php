<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class productController extends Controller
{
    public function listProducts()
    {
        $products = Product::join('categorys', 'categorys.id', '=', 'products.category_id')
            ->select(
                'products.id',
                'products.name',
                'products.price',
                'products.category_id',
                'categorys.nameCategory',
                'products.view',
                'products.image'
            )->paginate(10);

        return view('admin/products/listProduct')
            ->with([
                'products' => $products
            ]);
    }
    public function detailProduct($idProduct)
    {
        $products = Product::where('id', $idProduct)->first();
        return view('admin.products.detailProduct')
            ->with([
                'products' => $products
            ]);
    }

    public function addProduct()
    {
        $categories = Category::select('id', 'nameCategory')->get();
        return view('admin.products.addProduct')->with(['categories' => $categories]);
    }

    // public function addPostProduct( Request $req ) {
    //     $imageUrl = '';
    //     if ( $req->hasFile( 'imageProduct' ) ) {
    //         $image = $req->file( 'imageProduct' );
    //         $nameImage = time().".".$image->getClientOriginalExtension();
    //         $link = "image/";
    //         $image->move(public_path($link),$nameImage);

    //         $imageUrl = $link.$nameImage;
    //     }
    //     $data = [
    //         'name' => $req->name,
    //         'price' => $req->price,
    //         'view' => $req->view,
    //         'category_id' => $req->category,
    //         'image' => $imageUrl,

    //     ];
    //     Product::create( $data );

    //     return redirect()->route( 'admin.products.listProducts' )
    //     ->with( [
    //         'message'=>'thêm mới ok'
    //     ] );
    // }

    public function addPostProduct(Request $req)
    {
        $validatedData = $req->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'view' => 'required|integer|min:0',
            'category' => 'required|integer|exists:categorys,id',
            'imageProduct' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'name.required' => 'Bạn cần nhập tên sản phẩm.',
            'name.string' => 'Tên sản phẩm phải là chuỗi ký tự.',
            'name.max' => 'Tên sản phẩm không được vượt quá 255 ký tự.',
            'price.required' => 'Bạn cần nhập giá sản phẩm.',
            'price.numeric' => 'Giá sản phẩm phải là số.',
            'price.min' => 'Giá sản phẩm không được âm.',
            'view.required' => 'Bạn cần nhập số lượt xem.',
            'view.integer' => 'Số lượt xem phải là số nguyên.',
            'view.min' => 'Số lượt xem không được âm.',
            'category.required' => 'Bạn cần chọn danh mục.',
            'category.integer' => 'ID danh mục phải là số nguyên.',
            'category.exists' => 'Danh mục với ID này không tồn tại.',
            'imageProduct.image' => 'Tệp phải là hình ảnh.',
            'imageProduct.required' => 'Bạn cần phải có ảnh.',
            'imageProduct.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, gif.',
            'imageProduct.max' => 'Kích thước hình ảnh không được vượt quá 2MB.',
        ]);

        $imageUrl = '';
        if ($req->hasFile('imageProduct')) {
            $image = $req->file('imageProduct');
            $nameImage = time() . "." . $image->getClientOriginalExtension();
            $link = "image/";
            $image->move(public_path($link), $nameImage);

            $imageUrl = $link . $nameImage;
        }

        $data = [
            'name' => $validatedData['name'],
            'price' => $validatedData['price'],
            'view' => $validatedData['view'],
            'category_id' => $validatedData['category'],
            'image' => $imageUrl,
        ];

        Product::create($data);
        return redirect()->route('admin.products.listProducts')
            ->with('message', 'Thêm mới sản phẩm thành công');
    }



    public function deleteProduct(Request $req)
    {
        $product = Product::find($req->idProduct);
        if ($product->image != null && $product->image != '') {
            File::delete(public_path($product->image));
        }
        $product->delete();
        return redirect()->back()
            ->with([
                'message' => 'xóa thành công'
            ]);
    }

    public function updateProduct($idProduct)
    {
        $categories = Category::select('id', 'nameCategory')->get();
        $products = Product::where('id', $idProduct)->first();
        return view('admin.products.updateProduct')
            ->with([
                'products' => $products,
                'categories' => $categories
            ]);
    }
    // public function updatePostProduct(Request $req,$idProduct){
    //     // $linkImage ='';
    //     $product = Product::where('id',$idProduct)->first();
    //     $linkImage = $product->image;
    //     if ( $req->hasFile( 'imageProduct' ) ) {
    //         File::delete(public_path($product->image)); //xóa file ảnh cũ
    //         $image = $req->file( 'imageProduct' );
    //         $newName = time().".".$image->getClientOriginalExtension();
    //         $linkNew = "image/";
    //         $image->move(public_path($linkNew),$newName);

    //         $linkImage = $linkNew.$newName;
    //     }

    //     $data =[
    //         'name'=>$req->name,
    //         'price'=>$req->price,
    //         'category_id'=>$req->category,
    //         'view'=>$req->mota,
    //         'image'=>$linkImage,
    //     ];
    //     Product::where('id',$idProduct)->update($data);
    //     return redirect()->route( 'admin.products.listProducts' )
    //     ->with( [
    //         'message'=>'sửa thành công'
    //     ] );
    // }
    public function updatePostProduct(Request $req, $idProduct)
    {
        // Xác thực dữ liệu đầu vào
        $validatedData = $req->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'category' => 'required|integer|exists:categorys,id',
            'view' => 'required|numeric|min:0',
            'imageProduct' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'name.required' => 'Bạn cần nhập tên sản phẩm.',
            'name.string' => 'Tên sản phẩm phải là chuỗi ký tự.',
            'name.max' => 'Tên sản phẩm không được vượt quá 255 ký tự.',
            'price.required' => 'Bạn cần nhập giá sản phẩm.',
            'price.numeric' => 'Giá sản phẩm phải là số.',
            'price.min' => 'Giá sản phẩm không được âm.',
            'category.required' => 'Bạn cần chọn danh mục.',
            'category.integer' => 'ID danh mục phải là số nguyên.',
            'category.exists' => 'Danh mục với ID này không tồn tại.',
            'view.required' => 'Bạn cần nhập số lượt xem.',
            'view.integer' => 'Số lượt xem phải là số nguyên.',
            'view.min' => 'Số lượt xem không được âm.',
            'imageProduct.image' => 'Tệp phải là hình ảnh.',
            'imageProduct.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, gif.',
            'imageProduct.max' => 'Kích thước hình ảnh không được vượt quá 2MB.',
        ]);

        // Lấy sản phẩm hiện tại
        $product = Product::where('id', $idProduct)->firstOrFail();
        $linkImage = $product->image;

        // Kiểm tra và xử lý ảnh mới nếu có
        if ($req->hasFile('imageProduct')) {
            // Xóa ảnh cũ nếu có
            if (File::exists(public_path($product->image))) {
                File::delete(public_path($product->image));
            }

            // Lưu ảnh mới
            $image = $req->file('imageProduct');
            $newName = time() . "." . $image->getClientOriginalExtension();
            $linkNew = "image/";
            $image->move(public_path($linkNew), $newName);

            $linkImage = $linkNew . $newName;
        }

        // Cập nhật dữ liệu cho sản phẩm
        $data = [
            'name' => $validatedData['name'],
            'price' => $validatedData['price'],
            'category_id' => $validatedData['category'],
            'view' => $validatedData['view'],
            'image' => $linkImage,
        ];

        Product::where('id', $idProduct)->update($data);

        // Chuyển hướng và hiển thị thông báo thành công
        return redirect()->route('admin.products.listProducts')
            ->with('message', 'Cập nhật sản phẩm thành công');
    }
}
