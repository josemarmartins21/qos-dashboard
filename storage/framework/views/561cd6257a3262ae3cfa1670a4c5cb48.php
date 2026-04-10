<?php use \Illuminate\Support\Facades\Auth; ?>
<?php use \App\Helpers\DateHelper; ?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link rel="stylesheet" href="/estilos/style.css">
    <link rel="shortcut icon" href="favicon.svg" type="image/svg">
    <script src="https://kit.fontawesome.com/8e770ce0b4.js" crossorigin="anonymous"></script>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/app.js']); ?>
</head>
<body>
    <header>
        <div id="logo-container">
            <a href="<?php echo e(route('home')); ?>">
                <img src="<?php echo e(asset('imagens/qos-logo-sem-fundo.png')); ?>" alt="Logo da QoS Tel">
            </a>
        </div>


        <div id="menu-hamburguer">
            <i class="fa-solid fa-bars" id="menu"></i>
        </div>

        <nav id="menu-container" class="esconder">
           <?php echo $__env->make('components.nav_dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </nav>
        <div class="current-date">
             <p><?php echo e(DateHelper::currentExtendedDate()); ?></p> 
        </div>
    </header>
    <main>
        <section id="ficha">
            <img src="<?php echo e(asset('imagens/guanabara-perfil.jpeg')); ?>" alt="Josemar Martins" class="foto">
            <h1><?php echo e(Auth::user()->name); ?></h1>
            <div id="pages-container">
               <?php echo $__env->make('components.nav_dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>
        </section>
        <?php echo $__env->yieldContent('content'); ?>
    </main> 
    <script src="<?php echo e(asset('scripts/script.js')); ?>"></script>
</body>
</html><?php /**PATH C:\Users\josimarmartins21\Documents\GitHub\qos-dashboard\resources\views/layouts/app.blade.php ENDPATH**/ ?>