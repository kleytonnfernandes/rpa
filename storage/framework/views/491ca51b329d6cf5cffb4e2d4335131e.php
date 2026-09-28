<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__env->yieldContent('title', 'Loja Roupas'); ?> — Gestão</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="min-h-screen bg-slate-100 text-slate-900 antialiased">
<div class="min-h-screen lg:flex">
    <aside class="w-full border-b border-slate-200 bg-slate-950 text-slate-100 lg:min-h-screen lg:w-64 lg:border-b-0 lg:border-r lg:border-slate-800">
        <div class="px-6 py-6">
            <div class="text-xs font-semibold uppercase tracking-[0.24em] text-emerald-400">Gestão comercial</div>
            <div class="mt-2 text-xl font-bold">Loja Roupas</div>
            <div class="mt-1 text-sm text-slate-400">Painel administrativo</div>
        </div>
        <nav class="flex gap-2 overflow-x-auto px-4 pb-4 lg:block lg:space-y-1">
            <a href="<?php echo e(route('dashboard')); ?>" class="block whitespace-nowrap rounded-xl px-4 py-3 text-sm font-medium hover:bg-slate-800">Visão geral</a>
            <a href="<?php echo e(route('products.index')); ?>" class="block whitespace-nowrap rounded-xl px-4 py-3 text-sm font-medium hover:bg-slate-800">Produtos e estoque</a>
            <span class="block whitespace-nowrap rounded-xl px-4 py-3 text-sm text-slate-500">PDV — próxima etapa</span>
            <span class="block whitespace-nowrap rounded-xl px-4 py-3 text-sm text-slate-500">Fiscal — próxima etapa</span>
        </nav>
        <div class="hidden px-6 pb-6 pt-10 text-xs leading-5 text-slate-500 lg:block">Desenvolvimento inicial<br>Emissão fiscal desativada</div>
    </aside>
    <main class="min-w-0 flex-1">
        <header class="flex items-center justify-between border-b border-slate-200 bg-white px-5 py-4 sm:px-8">
            <div><p class="text-sm text-slate-500">Sistema de gestão</p><h1 class="text-xl font-semibold"><?php echo $__env->yieldContent('heading', 'Visão geral'); ?></h1></div>
            <span class="rounded-full bg-amber-50 px-3 py-1 text-xs font-semibold text-amber-700">Ambiente de desenvolvimento</span>
        </header>
        <div class="p-5 sm:p-8">
            <?php if(session('success')): ?> <div class="mb-5 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800"><?php echo e(session('success')); ?></div> <?php endif; ?>
            <?php if($errors->any()): ?> <div class="mb-5 rounded-xl border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-800"><ul class="list-inside list-disc"><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($error); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul></div> <?php endif; ?>
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </main>
</div>
</body>
</html>
<?php /**PATH C:\Users\kleyton.santos\Downloads\loja-roupas-inicial\loja-roupas-inicial\loja-roupas-app\resources\views/layouts/app.blade.php ENDPATH**/ ?>