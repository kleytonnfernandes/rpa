<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::with('variants')->latest()->paginate(15);
        return view('products.index', compact('products'));
    }

    public function create(): View
    {
        return view('products.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:160'],
            'description' => ['nullable', 'string', 'max:2000'],
            'category' => ['nullable', 'string', 'max:100'],
            'brand' => ['nullable', 'string', 'max:100'],
            'size' => ['required', 'string', 'max:30'],
            'color' => ['required', 'string', 'max:50'],
            'sku' => ['required', 'string', 'max:80', 'unique:product_variants,sku'],
            'barcode' => ['nullable', 'string', 'max:80', 'unique:product_variants,barcode'],
            'cost_price' => ['required', 'numeric', 'min:0'],
            'sale_price' => ['required', 'numeric', 'min:0'],
            'initial_stock' => ['required', 'integer', 'min:0'],
        ]);

        DB::transaction(function () use ($validated) {
            $product = Product::create([
                'name' => $validated['name'],
                'description' => $validated['description'] ?? null,
                'category' => $validated['category'] ?? null,
                'brand' => $validated['brand'] ?? null,
                'active' => true,
            ]);

            $variant = ProductVariant::create([
                'product_id' => $product->id,
                'size' => $validated['size'],
                'color' => $validated['color'],
                'sku' => $validated['sku'],
                'barcode' => $validated['barcode'] ?: null,
                'cost_price' => $validated['cost_price'],
                'sale_price' => $validated['sale_price'],
                'active' => true,
            ]);

            if ((int) $validated['initial_stock'] > 0) {
                $variant->stockMovements()->create([
                    'movement_type' => 'opening_balance',
                    'quantity' => (int) $validated['initial_stock'],
                    'reason' => 'Estoque inicial do cadastro',
                    'reference' => 'Cadastro de produto',
                ]);
            }
        });

        return redirect()->route('products.index')->with('success', 'Produto cadastrado com sucesso.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        // Evita apagar o histórico de produtos que já tiveram movimentação.
        if ($product->variants()->whereHas('stockMovements')->exists()) {
            return back()->withErrors(['product' => 'Este produto possui histórico de estoque e não pode ser excluído. Desative-o em uma próxima etapa.']);
        }

        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produto removido.');
    }
}
