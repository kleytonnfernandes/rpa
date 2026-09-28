<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\StockMovement;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('dashboard.index', [
            'productsCount' => Product::count(),
            'variantsCount' => ProductVariant::count(),
            'movementsCount' => StockMovement::count(),
            'lowStockCount' => ProductVariant::withSum('stockMovements', 'quantity')
                ->get()
                ->filter(fn ($variant) => (int) ($variant->stock_movements_sum_quantity ?? 0) <= 3)
                ->count(),
        ]);
    }
}
