<?php use \Illuminate\Support\Facades\Auth; ?>
<?php use \App\Helpers\DateHelper; ?>

<?php
    $user = Auth::user();
?>
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
            <img src="<?php echo e(asset('images/users/' . $user->image)); ?>" alt="<?php echo e($user->name); ?>" class="foto">
            <h1>
                <a href="<?php echo e(route('users.show', ['user' => $user->id])); ?>"><?php echo e($user->name); ?></a>
            </h1>
            <div id="pages-container">
               <?php echo $__env->make('components.nav_dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>
        </section>
        <?php echo $__env->yieldContent('content'); ?>
    </main> 
    <?php if (isset($component)) { $__componentOriginala303ba71f7baa3d3b968ad65bf4004d2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala303ba71f7baa3d3b968ad65bf4004d2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.float_btn','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('float_btn'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala303ba71f7baa3d3b968ad65bf4004d2)): ?>
<?php $attributes = $__attributesOriginala303ba71f7baa3d3b968ad65bf4004d2; ?>
<?php unset($__attributesOriginala303ba71f7baa3d3b968ad65bf4004d2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala303ba71f7baa3d3b968ad65bf4004d2)): ?>
<?php $component = $__componentOriginala303ba71f7baa3d3b968ad65bf4004d2; ?>
<?php unset($__componentOriginala303ba71f7baa3d3b968ad65bf4004d2); ?>
<?php endif; ?>
    <script src="<?php echo e(asset('scripts/script.js')); ?>"></script>
</body>
</html><?php /**PATH C:\Users\josimarmartins21\Documents\GitHub\qos-dashboard\resources\views/layouts/app.blade.php ENDPATH**/ ?>