<?php use \Illuminate\Support\Facades\Auth; ?>



<?php $__env->startSection('title', 'Adicionar Depoimento'); ?>
    
<?php $__env->startSection('content'); ?>
    <?php if (isset($component)) { $__componentOriginal36b1f9e09cae5a1a41862931a56bc7d9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal36b1f9e09cae5a1a41862931a56bc7d9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.show_container','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('show_container'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <h2><?php echo e($testimony->nome); ?></h2>
        <p class="role">Cargo de <?php echo e($testimony->cargo); ?></p>
        <div class="barra"></div>
        <h3>Depoimento</h3>
        <p class="testimony-content">
            <?php echo e($testimony->depoimento); ?>

        </p>

        <div id="show-details-info">
            <p>
                Publicado <?php echo e($created_at); ?> por <?php echo e(Auth::user()->name); ?>

            </p>
        </div>

     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal36b1f9e09cae5a1a41862931a56bc7d9)): ?>
<?php $attributes = $__attributesOriginal36b1f9e09cae5a1a41862931a56bc7d9; ?>
<?php unset($__attributesOriginal36b1f9e09cae5a1a41862931a56bc7d9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal36b1f9e09cae5a1a41862931a56bc7d9)): ?>
<?php $component = $__componentOriginal36b1f9e09cae5a1a41862931a56bc7d9; ?>
<?php unset($__componentOriginal36b1f9e09cae5a1a41862931a56bc7d9); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\josimarmartins21\Documents\GitHub\qos-dashboard\resources\views/testimonies/show.blade.php ENDPATH**/ ?>