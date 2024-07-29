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
        ->with( [
            'categorys'=>$categorys
        ] );
    }
    public function addCategorys()
    {
        return view('admin/categorys/addCategory');
    }

    public function addPostCategorys( Request $req ) {
        $data = [
            'nameCategory' => $req->name,
        ];
        Category::create( $data );

        return redirect()->route( 'admin.categorys.listCategorys' )
        ->with( [
            'message'=>'Thêm danh mục thành công'
        ] );
    }
    
    public function deleteCategorys($categoryId)
    {
        Category::where('id', $categoryId)->delete();
        return redirect()->route( 'admin.categorys.listCategorys');
    }

    public function updateCategorys($categoryId)
    {
        $categorys = Category::where('id', $categoryId)->first();
        return view('admin.categorys.updateCategory')
            ->with([
                'categorys' => $categorys
            ]);
    }

    public function updatePostCategorys(Request $req)
    {
        $data = [
            'nameCategory' => $req->name,

        ];
        Category::where( 'id',$req->categoryId)->update($data);
        return redirect()->route( 'admin.categorys.listCategorys');
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
