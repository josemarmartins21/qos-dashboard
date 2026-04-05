

<?php $__env->startSection('title', 'Editar depoimento'); ?>
    
<?php $__env->startSection('content'); ?>
    <div id="form-container">
        <?php if (isset($component)) { $__componentOriginal37dbbecc1677d67be1877c9a23feca96 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal37dbbecc1677d67be1877c9a23feca96 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form-container','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form-container'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
             <?php $__env->slot('title', null, []); ?> Editar Depoimento <?php $__env->endSlot(); ?>

            <form action="<?php echo e(route('testimonies.update', ['testimony' => $testimony->id])); ?>" method="post">
                
                <?php echo csrf_field(); ?>

                <?php echo method_field('PUT'); ?>

                <div class="form-group">
                    <label for="client_id">Cliente</label>
                    <select name="client_id" id="client_id">
                        <option value=""  selected>Selecione o Cliente</option>
                        <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($client['id']); ?>" <?php echo e($testimony->client_id ? 'selected' : ''); ?>>
                                <?php echo e($client['name']); ?> 
                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="testimony">Depoimento</label>
                    <textarea name="testimony" id="testimony" cols="30" rows="7">
                        <?php echo e(old('testimony', $testimony->testimony)); ?>

                    </textarea>
                </div>

                <input type="submit" value="Atualizar" class="btn-primary">
            </form>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal37dbbecc1677d67be1877c9a23feca96)): ?>
<?php $attributes = $__attributesOriginal37dbbecc1677d67be1877c9a23feca96; ?>
<?php unset($__attributesOriginal37dbbecc1677d67be1877c9a23feca96); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal37dbbecc1677d67be1877c9a23feca96)): ?>
<?php $component = $__componentOriginal37dbbecc1677d67be1877c9a23feca96; ?>
<?php unset($__componentOriginal37dbbecc1677d67be1877c9a23feca96); ?>
<?php endif; ?>  
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\josimarmartins21\Documents\GitHub\qos-dashboard\resources\views/testimonies/edit.blade.php ENDPATH**/ ?>