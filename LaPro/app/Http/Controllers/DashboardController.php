<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Query Builder: Contar el total de productos.
        $totalProducts = DB::table('products')->count();

        // Query Builder: Calcular el valor total del inventario (precio * stock).
        $totalInventoryValue = DB::table('products')->sum(DB::raw('price * stock'));

        // Query Builder: Contar productos por categoría.
        $productsPerCategory = DB::table('categories')
            ->leftJoin('products', 'categories.id', '=', 'products.category_id')
            ->select('categories.name', DB::raw('count(products.id) as product_count'))
            ->groupBy('categories.name')
            ->get();

        return view('dashboard.index', [
            'totalProducts' => $totalProducts,
            'totalInventoryValue' => $totalInventoryValue,
            'productsPerCategory' => $productsPerCategory,
        ]);
    }
}
