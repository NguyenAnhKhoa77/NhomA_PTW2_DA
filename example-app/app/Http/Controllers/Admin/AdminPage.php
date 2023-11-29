<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Manufacturers;
use App\Models\Orders;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminPage extends Controller
{
    public function dashboard()
    {
        $totalOrders = Orders::count();
        $totalUsers = User::count();
        $totalProducts = Product::count();
        $totalManu = Product::count();
        return view('backend.index', compact('totalOrders', 'totalUsers','totalProducts','totalManu'));
    }

    public function getOrderData()
    {
        $todayOrders = Orders::select(DB::raw("DATE(created_at) as date"), DB::raw("COUNT(*) as count"))
            ->whereDate('created_at', today())
            ->groupBy('date')
            ->get();

        return response()->json($todayOrders);
    }
    public function getCategoryData()
    {
        $dailyProductData = DB::table('products')
            ->select('categories.name as category', DB::raw('DATE(products.created_at) as date'), DB::raw('COUNT(*) as count'))
            ->join('categories', 'products.categories_id', '=', 'categories.id')
            ->groupBy('categories.name', 'date')
            ->get();

        return response()->json($dailyProductData);
    }
    public function getManuData()
    {
        $dailyProductData = DB::table('products')
            ->select('manufacturers.name as brand', DB::raw('DATE(products.created_at) as date'), DB::raw('COUNT(*) as count'))
            ->join('manufacturers', 'products.manufacturer_id', '=', 'manufacturers.id')
            ->groupBy('manufacturers.name', 'date')
            ->get();

        return response()->json($dailyProductData);
    }
    public function getCategoryChart()
    {
        $categoryData = DB::table('products')
            ->select('categories.name as category', DB::raw('DATE(products.created_at) as date'), DB::raw('COUNT(*) as count'))
            ->join('categories', 'products.categories_id', '=', 'categories.id')
            ->groupBy('categories.name', 'date')
            ->get();
        return response()->json($categoryData);
    }
}
