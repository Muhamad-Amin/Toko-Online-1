<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Categori;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(Request $request) {
        $keyword = $request->keyword;
        if ($keyword == '' || $keyword == 'all') {
            $products = Product::latest()->with(['user'])->paginate(16);
        } else {
            $products = Product::with(['user', 'categori'])->where('name', 'LIKE', '%'.$keyword.'%')
                    ->orWhere('harga', 'LIKE', '%'.$keyword.'%')
                    ->orWhereHas('user', function($query) use ($keyword) {
                        $query->where('name', 'LIKE', '%'.$keyword.'%');
                    })
                    ->orWhereHas('categori', function($query) use ($keyword) {
                        $query->where('name', 'LIKE', '%'.$keyword.'%');
                    })->paginate(16);
        }

        return view('index', [
            'categories' => Categori::all(),
            'products' => $products,
            'productsTerbaru' => Product::latest()->limit(3)->get(),
        ]);
    }

    public function categories() {
        return view('categories', [
            'categories' => Categori::latest()->get(),
        ]);
    }

    public function categoriesDetail($id) {
        return view('categori-detail', [
            'categori' => Categori::findOrFail($id),
            'products' => Product::where('categori_id', $id)->paginate(16),
        ]);
    }

    public function products(Request $request) {
        $keyword = $request->keyword;
        if ($keyword == '' || $keyword == 'all') {
            $products = Product::latest()->with(['categori', 'user'])->paginate(12);
        } else {
            $products = Product::latest()->with(['user', 'categori'])->where('name', 'LIKE', '%'.$keyword.'%')
                    ->orWhere('harga', 'LIKE', '%'.$keyword.'%')
                    ->orWhereHas('user', function($query) use ($keyword) {
                        $query->where('name', 'LIKE', '%'.$keyword.'%');
                    })
                    ->orWhereHas('categori', function($query) use ($keyword) {
                        $query->where('name', 'LIKE', '%'.$keyword.'%');
                    })->paginate(12);
        }
        return view('products', [
            'categories' => Categori::latest()->get(),
            'products' => $products,
        ]);
    }

    public function productDetail($id) {
        $product = Product::with(['categori'])->findOrFail($id);
        return view('product-detail', [
            'product' => $product,
            'productTerkait' => Product::limit(6)->where('categori_id', $product->categori_id)->where('id', '!=', $product->id)->get(),
        ]);
    }

    public function about() {
        return view('about');
    }
}
