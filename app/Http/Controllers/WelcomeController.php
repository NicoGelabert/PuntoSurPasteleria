<?php

namespace App\Http\Controllers;

use App\Models\SliderImage;
use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $slider_images = SliderImage::all();
        $categories = Categories::all();
        $products = Product::query()
            ->where('published', '=', 1)
            ->orderBy('updated_at', 'desc')
            ->paginate(4);
            return view('welcome', [
            'products' => $products, 'categories' => $categories, 'slider_images' => $slider_images
        ]);
    }
}
