@extends('layouts.app')
@section('title', 'Visão geral')
@section('heading', 'Visão geral')
@section('content')
<div class="mb-8 flex flex-col justify-between gap-4 sm:flex-row sm:items-end">
    <div><p class="text-sm font-medium text-emerald-700">Bem-vindo ao sistema</p><h2 class="mt-1 text-3xl font-bold tracking-tight">Controle sua operação.</h2><p class="mt-2 max-w-2xl text-sm leading-6 text-slate-500">Esta primeira versão prepara o cadastro de produtos e a trilha de movimentações do estoque.</p></div>
    <a href="{{ route('products.create') }}" class="inline-flex items-center justify-center rounded-xl bg-emerald-700 px-5 py-3 text-sm font-semibold text-white shadow-sm hover:bg-emerald-800">+ Cadastrar produto</a>
</div>
<div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
    @foreach ([['Produtos cadastrados', $productsCount, 'Catálogo base'], ['Variações', $variantsCount, 'Tamanho e cor'], ['Movimentos de estoque', $movementsCount, 'Histórico registrado'], ['Variações com saldo baixo', $lowStockCount, 'Limite inicial: 3 unidades']] as [$label, $value, $hint])
        <section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm"><p class="text-sm font-medium text-slate-500">{{ $label }}</p><p class="mt-3 text-3xl font-bold tracking-tight">{{ $value }}</p><p class="mt-2 text-xs text-slate-400">{{ $hint }}</p></section>
    @endforeach
</div>
<div class="mt-6 grid gap-4 xl:grid-cols-3">
    <section class="rounded-2xl border border-slate-200 bg-white p-6 xl:col-span-2"><h3 class="font-semibold">Próximas entregas do projeto</h3><div class="mt-4 space-y-4 text-sm">
        <div class="flex gap-3"><span class="mt-0.5 flex h-6 w-6 items-center justify-center rounded-full bg-emerald-100 text-xs font-bold text-emerald-800">1</span><div><p class="font-medium">Produtos e variantes</p><p class="mt-1 text-slate-500">Cadastro de modelos com SKU próprio por tamanho e cor.</p></div></div>
        <div class="flex gap-3"><span class="mt-0.5 flex h-6 w-6 items-center justify-center rounded-full bg-slate-100 text-xs font-bold text-slate-700">2</span><div><p class="font-medium">Compras e estoque</p><p class="mt-1 text-slate-500">Entrada de mercadoria, inventário e devolução a fornecedor.</p></div></div>
        <div class="flex gap-3"><span class="mt-0.5 flex h-6 w-6 items-center justify-center rounded-full bg-slate-100 text-xs font-bold text-slate-700">3</span><div><p class="font-medium">PDV e fiscal</p><p class="mt-1 text-slate-500">Venda, caixa, devoluções de clientes e preparação para NF-e.</p></div></div>
    </div></section>
    <section class="rounded-2xl border border-amber-200 bg-amber-50 p-6"><h3 class="font-semibold text-amber-950">Antes de emitir NF-e</h3><p class="mt-2 text-sm leading-6 text-amber-900">A emissão fiscal só será habilitada depois de configurar os dados tributários da empresa, certificado digital e ambiente de homologação.</p></section>
</div>
@endsection
