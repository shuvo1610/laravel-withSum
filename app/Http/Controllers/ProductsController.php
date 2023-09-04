<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $categories = Category::select("id", "name")
            ->withSum([
                'products as active_products_count' => function ($query) {
                    $query->where('is_active', '1');
                },
            ])
            ->get()
            ->toArray();

        dd($categories);
    }
}
