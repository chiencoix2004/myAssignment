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
        ->select('products.id', 'products.name', 'products.price', 'products.category_id',
         'categorys.nameCategory','products.view','products.image')->paginate(10);

        return view('admin/products/listProduct')
        ->with( [
            'products'=>$products
        ] );
    }
    public function detailProduct($idProduct) {
        $products = Product::where('id',$idProduct)->first();
        return view( 'admin.products.detailProduct' )
        ->with( [
            'products'=>$products
        ] );
    }
    
    public function addProduct() {
        $categories = Category::select('id', 'nameCategory')->get();
        return view( 'admin.products.addProduct' )->with(['categories' => $categories]);
    }

    public function addPostProduct( Request $req ) {
        $imageUrl = '';
        if ( $req->hasFile( 'imageProduct' ) ) {
            $image = $req->file( 'imageProduct' );
            $nameImage = time().".".$image->getClientOriginalExtension();
            $link = "image/";
            $image->move(public_path($link),$nameImage);

            $imageUrl = $link.$nameImage;
        }
        $data = [
            'name' => $req->name,
            'price' => $req->price,
            'view' => $req->view,
            'category_id' => $req->category,
            'image' => $imageUrl,

        ];
        Product::create( $data );

        return redirect()->route( 'admin.products.listProducts' )
        ->with( [
            'message'=>'thêm mới ok'
        ] );
    }
    public function deleteProduct(Request $req){
        $product = Product::find($req->idProduct);
        if($product->image !=null && $product->image !=''){
            File::delete(public_path($product->image));
        }
        $product->delete();
        return redirect()->back()
        ->with( [
            'message'=>'xóa thành công'
        ] );
        
    }

    public function updateProduct($idProduct){
        $categories = Category::select('id', 'nameCategory')->get();
        $products = Product::where('id',$idProduct)->first();
        return view( 'admin.products.updateProduct' )
        ->with( [
            'products'=>$products,
            'categories' => $categories
        ] );
    }
    public function updatePostProduct(Request $req,$idProduct){
        // $linkImage ='';
        $product = Product::where('id',$idProduct)->first();
        $linkImage = $product->image;
        if ( $req->hasFile( 'imageProduct' ) ) {
            File::delete(public_path($product->image)); //xóa file ảnh cũ
            $image = $req->file( 'imageProduct' );
            $newName = time().".".$image->getClientOriginalExtension();
            $linkNew = "image/";
            $image->move(public_path($linkNew),$newName);

            $linkImage = $linkNew.$newName;
        }

        $data =[
            'name'=>$req->name,
            'price'=>$req->price,
            'category_id'=>$req->category,
            'view'=>$req->mota,
            'image'=>$linkImage,
        ];
        Product::where('id',$idProduct)->update($data);
        return redirect()->route( 'admin.products.listProducts' )
        ->with( [
            'message'=>'sửa thành công'
        ] );
    }
}
