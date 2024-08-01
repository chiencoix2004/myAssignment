<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class homeController extends Controller
{
    public function homeClient()
    {
        // $categorys = Category::all();
        return view('client/index');
        // return view('client/index', ['categorys' => $categorys]);
    }

    public function listProduct()
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
            )->paginate(12);
        return view('client/products/listProduct')->with([
            'products' => $products
        ]);
    }
    public function categoryProduct($categoryId)
    {
        $category = Category::find($categoryId);
        $products = Product::where('category_id', $categoryId)
            ->select(
                'products.id',
                'products.name',
                'products.price',
                'products.category_id',
                'products.view',
                'products.image'
            )->paginate(12);

        return view('client/products/categoryProduct')->with([
            'category' => $category, // Truyền danh mục để có thể hiển thị thông tin danh mục nếu cần
            'products' => $products
        ]);
    }
    // public function searchProduct()
    // {
    //     // $categorys = Category::all();
    //     return view('client/index');
    //     // return view('client/index', ['categorys' => $categorys]);
    // }
    public function searchProduct(){
        $data = $_GET['timkiem'];
        $timkiem = Product::where('name','like','%'.$data.'%')
        ->join('categorys', 'categorys.id', '=', 'products.category_id')
            ->select('products.id', 'products.name', 'products.price', 'products.category_id', 'categorys.nameCategory', 'products.view', 'products.image')
            ->paginate(12);

        return view('client/products/searchProduct')
            ->with(['timkiem' => $timkiem]);
        
    }

    public function profile()
    {
        // $categorys = Category::all();
        return view('profile');
        // return view('client/index', ['categorys' => $categorys]);
    }
}
