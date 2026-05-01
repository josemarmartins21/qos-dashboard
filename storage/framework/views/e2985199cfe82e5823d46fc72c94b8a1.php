<?php use \App\Models\Message; ?>
<?php use \Illuminate\Support\Facades\Auth; ?>



<?php $__env->startSection('title', 'Página Inicial'); ?>


<?php $__env->startSection('content'); ?>
<section id="principal">
    <h2>Resumo Rápido</h2>
    <article id="overview-container">
        <aside class="overview">
            <div class="overview-top">
                <h3><i class="fa-solid fa-people-roof green-icon"></i> <?php echo e($datas['prove_social_active']); ?></h3>
            </div>

            <div class="overview-bottom">
                <span>Clientes Renomados Activo</span>
            </div>
        </aside>
        <aside class="overview">
            <div class="overview-top">
                <h3><i class="fa-brands fa-stack-exchange green-icon"></i> <?php echo e($datas['testimonies_active']); ?></h3>
            </div>

            <div class="overview-bottom">
                <span>Depoimentos Activo</span>
            </div>
        </aside>
        <aside class="overview">
            <div class="overview-top">
                    <h3><i class="fa-solid fa-file-circle-question yellow-icon"></i> <?php echo e($datas['questions_active']); ?></h3>
            </div>

            <div class="overview-bottom">
                <span>Total de FAQ activas</span>
            </div>
        </aside>
        <aside class="overview">
            <div class="overview-top">
                <h3> <i class="fa-solid fa-message red-icon"></i> <?php echo e($datas['messages_unread']); ?></h3>
            </div>

            <div class="overview-bottom">
                <span>Mensagens não lidas</span>
            </div>
        </aside>
    </article> <!-- Fim article overview -->


    <?php if(count($visitors) > 0): ?>
                <?php if (isset($component)) { $__componentOriginal163c8ba6efb795223894d5ffef5034f5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal163c8ba6efb795223894d5ffef5034f5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                     <?php $__env->slot('title', null, []); ?> Últitmas Mensagens <?php $__env->endSlot(); ?>
                     <?php $__env->slot('thead', null, []); ?> 
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Telefone</th>
                            <th>Email</th>
                            <th>Ações</th>
                        </tr>
                     <?php $__env->endSlot(); ?>
                     <?php $__env->slot('tbody', null, []); ?> 
                        <?php $__currentLoopData = $visitors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $visitor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                        <?php if($loop->index > 3): ?>
                            <?php break; ?>
                        <?php endif; ?>
                            <tr>
                                <td><?php echo e($loop->index + 1); ?></td>
                                <td><?php echo e($visitor->nome); ?></td>
                                <td><?php echo e($visitor->tel); ?></td>
                                <td><?php echo e($visitor->email); ?></td>
                                <td>
                                    <?php if(isset($visitor->message_id)): ?> 
                                    <a href="<?php echo e(route('messages.show', ['message' => $visitor->message_id])); ?>" class="base-btn ler" id="delete-btn-table">
                                        <?php if($visitor->lida == false): ?>
                                            <i class="fa-solid fa-circle"></i> 
                                        <?php endif; ?>
                                        
                                        Ler mensagem
                                    </a>

                                    <form action="<?php echo e(route('messages.destroy', ['message' => $visitor->message_id])); ?>" method="POST" id="form-table">

                                        <?php echo csrf_field(); ?>

                                        <?php echo method_field('DELETE'); ?>

                                        <button type="submit" class="base-btn apagar" onclick="return confirm('Tem a certeza que deseja eliminar?')">
                                            <i class="fa-solid fa-trash"></i> Apagar
                                        </button>
                                    </form>
                                    <?php else: ?>
                                        Sem Mensagem
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                     <?php $__env->endSlot(); ?>
                     <?php $__env->slot('tfoot', null, []); ?> 
                        <tr>
                        <th colspan="4" id="foot-header">Total</th>
                        <td><?php echo e(Message::count()); ?></td>
                    </tr>    
                     <?php $__env->endSlot(); ?>  
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal163c8ba6efb795223894d5ffef5034f5)): ?>
<?php $attributes = $__attributesOriginal163c8ba6efb795223894d5ffef5034f5; ?>
<?php unset($__attributesOriginal163c8ba6efb795223894d5ffef5034f5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal163c8ba6efb795223894d5ffef5034f5)): ?>
<?php $component = $__componentOriginal163c8ba6efb795223894d5ffef5034f5; ?>
<?php unset($__componentOriginal163c8ba6efb795223894d5ffef5034f5); ?>
<?php endif; ?>
                <?php else: ?> 
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
                                <h2>Sem Mensagens</h2>
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
  
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\josimarmartins21\Documents\GitHub\qos-dashboard\resources\views/home.blade.php ENDPATH**/ ?>