@extends('layouts.app')
@section('title', 'Produtos')
@section('heading', 'Produtos e variações')
@section('content')
<div class="mb-6 flex flex-col justify-between gap-3 sm:flex-row sm:items-center"><div><h2 class="text-2xl font-bold">Catálogo</h2><p class="mt-1 text-sm text-slate-500">Cada combinação de tamanho e cor possui SKU e saldo próprios.</p></div><a href="{{ route('products.create') }}" class="inline-flex items-center justify-center rounded-xl bg-emerald-700 px-4 py-2.5 text-sm font-semibold text-white hover:bg-emerald-800">+ Novo produto</a></div>
<div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm"><div class="overflow-x-auto"><table class="min-w-full divide-y divide-slate-200 text-sm"><thead class="bg-slate-50 text-left text-xs uppercase tracking-wide text-slate-500"><tr><th class="px-5 py-4">Produto</th><th class="px-5 py-4">Variações</th><th class="px-5 py-4">SKUs</th><th class="px-5 py-4">Preço de venda</th><th class="px-5 py-4">Status</th></tr></thead><tbody class="divide-y divide-slate-100">
@forelse ($products as $product)
<tr><td class="px-5 py-4"><p class="font-semibold text-slate-900">{{ $product->name }}</p><p class="mt-1 text-xs text-slate-500">{{ $product->category ?: 'Sem categoria' }}{{ $product->brand ? ' · '.$product->brand : '' }}</p></td><td class="px-5 py-4">{{ $product->variants->count() }}</td><td class="px-5 py-4"><div class="space-y-1">@foreach ($product->variants as $variant)<p class="text-xs text-slate-600">{{ $variant->sku }} — {{ $variant->size }}/{{ $variant->color }}</p>@endforeach</div></td><td class="px-5 py-4"><div class="space-y-1">@foreach ($product->variants as $variant)<p>R$ {{ number_format((float) $variant->sale_price, 2, ',', '.') }}</p>@endforeach</div></td><td class="px-5 py-4"><span class="rounded-full bg-emerald-50 px-2.5 py-1 text-xs font-semibold text-emerald-700">Ativo</span></td></tr>
@empty
<tr><td colspan="5" class="px-5 py-12 text-center"><p class="font-medium">Nenhum produto cadastrado</p><p class="mt-1 text-slate-500">Comece cadastrando o primeiro modelo de roupa.</p></td></tr>
@endforelse
</tbody></table></div><div class="border-t border-slate-100 px-5 py-4">{{ $products->links() }}</div></div>
@endsection
