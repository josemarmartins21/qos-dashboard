<?php use \Illuminate\Support\Str; ?>



<?php $__env->startSection('title', 'Depoimentos'); ?>
    
<?php $__env->startSection('content'); ?>

<div id="container">
<?php if (isset($component)) { $__componentOriginal5194778a3a7b899dcee5619d0610f5cf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5194778a3a7b899dcee5619d0610f5cf)): ?>
<?php $attributes = $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf; ?>
<?php unset($__attributesOriginal5194778a3a7b899dcee5619d0610f5cf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5194778a3a7b899dcee5619d0610f5cf)): ?>
<?php $component = $__componentOriginal5194778a3a7b899dcee5619d0610f5cf; ?>
<?php unset($__componentOriginal5194778a3a7b899dcee5619d0610f5cf); ?>
<?php endif; ?>

        <h2>Depoimentos</h2>

        
        <?php if (isset($component)) { $__componentOriginal8dcebddd58fd2230969fc69369d9a523 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8dcebddd58fd2230969fc69369d9a523 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.index_container','data' => ['class' => 'testiomonies-index']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('index_container'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'testiomonies-index']); ?>
             <?php $__env->slot('header_index', null, []); ?> 
                <form action="<?php echo e(route('testimonies.index')); ?>" method="get">
                    
                    <?php echo csrf_field(); ?>

                    <input type="search" name="searched" id="" placeholder="Digite o nome de um cliente" autofocus>
                </form>

                <div id="btn-container">
                    <a href="<?php echo e(route('testimonies.create')); ?>" class="mais-depoimentos">
                        <i class="fa-solid fa-plus"></i> Adicionar
                    </a>
                </div>
             <?php $__env->endSlot(); ?>

            
             <?php $__env->slot('container_cards', null, []); ?> 

                <?php $__empty_1 = true; $__currentLoopData = $testimonies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimony): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    
                    <?php if (isset($component)) { $__componentOriginal53747ceb358d30c0105769f8471417f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53747ceb358d30c0105769f8471417f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                         <?php $__env->slot('top_card', null, []); ?> 
                            <a href="<?php echo e(route('testimonies.show', ['testimony' => $testimony->id])); ?>"><?php echo e($testimony->nome); ?></a>

                            <span><?php echo e($testimony->cargo); ?></span>

                            <p class="card-paragrafo">
                                <?php echo e(Str::limit($testimony->testimony, 110, '...')); ?>

                            </p>
                         <?php $__env->endSlot(); ?>

                         <?php $__env->slot('btn_actions', null, []); ?> 
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('adm')): ?> 
                                <?php if($testimony->is_active === 0): ?>
                                    <form action="<?php echo e(route('active')); ?>" method="POST" class="active">
                                        
                                        <?php echo csrf_field(); ?>
                                        
                                        <?php echo method_field("PUT"); ?>
                                        
                                        <input type="hidden" name="type" value="depoimento">
    
                                        <input type="hidden" name="id" id="id" value="<?php echo e($testimony->id); ?>">
                                        
                                        <button class="disable" type="submit" title="Activar">
                                            <i class="fa-solid fa-eye-slash disable"></i>
                                        </button>
                                        
                                    </form>
                                <?php else: ?>
                                        <form action="<?php echo e(route('disable')); ?>" method="POST" class="active">
                                            <?php echo csrf_field(); ?>
                                            
                                            <?php echo method_field("PUT"); ?>
    
                                            <input type="hidden" name="id" id="id" value="<?php echo e($testimony->id); ?>">
                                            
                                            <input type="hidden" name="type" value="depoimento">
    
                                            <button type="submit" title="Desactivar">
                                                <i class="fa-solid fa-eye"></i>
                                            </button>
                                        
                                        </form>
                                <?php endif; ?>
                            <?php endif; ?>

                            <div class="actions-btn">
                                
                                <a href="<?php echo e(route('testimonies.edit', ['testimony' => $testimony->id])); ?>" class="edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                
                                <form action="<?php echo e(route('testimonies.destroy', ['testimony' => $testimony->id])); ?>" method="post">

                                    <?php echo csrf_field(); ?>

                                    <?php echo method_field('Delete'); ?>

                                    <button class="delete" id="delete" onclick="return confirm('Tem cereteza que pretende eliminar este depoimento?')">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                         <?php $__env->endSlot(); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal53747ceb358d30c0105769f8471417f6)): ?>
<?php $attributes = $__attributesOriginal53747ceb358d30c0105769f8471417f6; ?>
<?php unset($__attributesOriginal53747ceb358d30c0105769f8471417f6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal53747ceb358d30c0105769f8471417f6)): ?>
<?php $component = $__componentOriginal53747ceb358d30c0105769f8471417f6; ?>
<?php unset($__componentOriginal53747ceb358d30c0105769f8471417f6); ?>
<?php endif; ?>
                    
                    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php if (isset($component)) { $__componentOriginald89414b43ac0016d9b63ffd55ac5aa59 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald89414b43ac0016d9b63ffd55ac5aa59 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.image-container','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('image-container'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                       <img src="<?php echo e(asset('images/void.png')); ?>" alt="Imagem de documentos em branco">

                        <?php $__env->slot('btn_back', null, []); ?> 
                            <a href="<?php echo e(route('testimonies.index')); ?>">Voltar</a>
                        <?php $__env->endSlot(); ?>
                    <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald89414b43ac0016d9b63ffd55ac5aa59)): ?>
<?php $attributes = $__attributesOriginald89414b43ac0016d9b63ffd55ac5aa59; ?>
<?php unset($__attributesOriginald89414b43ac0016d9b63ffd55ac5aa59); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald89414b43ac0016d9b63ffd55ac5aa59)): ?>
<?php $component = $__componentOriginald89414b43ac0016d9b63ffd55ac5aa59; ?>
<?php unset($__componentOriginald89414b43ac0016d9b63ffd55ac5aa59); ?>
<?php endif; ?>
                <?php endif; ?>
             <?php $__env->endSlot(); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8dcebddd58fd2230969fc69369d9a523)): ?>
<?php $attributes = $__attributesOriginal8dcebddd58fd2230969fc69369d9a523; ?>
<?php unset($__attributesOriginal8dcebddd58fd2230969fc69369d9a523); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8dcebddd58fd2230969fc69369d9a523)): ?>
<?php $component = $__componentOriginal8dcebddd58fd2230969fc69369d9a523; ?>
<?php unset($__componentOriginal8dcebddd58fd2230969fc69369d9a523); ?>
<?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\josimarmartins21\Documents\GitHub\qos-dashboard\resources\views/testimonies/index.blade.php ENDPATH**/ ?>