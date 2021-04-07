<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Item;
use App\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::where('status', 'active')->get();
        $product_news = Product::where('status', 'active')->orderBy('created_at', 'DESC')->take(20)->get();
        return view('trang-chu', compact('categories', 'product_news'));
    }

    public function product_detail($id)
    {
        $product = Product::findorFail($id);
        if ($product->status != 'active') {
            abort(404);
        } else {
            switch ($product->typeOfDeliver) {
                case ('auto'):
                    return view('product.detail_auto', compact('product'));
                    break;
                case ('manual'):
                    return view('product.detail_manual', compact('product'));
                    break;
                case ('physical'):
                    return view('product.detail_physical', compact('product'));
                    break;
            }
            
        }
    }
}
