

<?php $__env->startSection('title', 'Página Inicial'); ?>


<?php $__env->startSection('content'); ?>
<?php use \App\Models\Visitor; ?>
<section id="principal">
    <h2>Resumo Rápido</h2>
    <article id="overview-container">
        <aside class="overview">
            <div class="overview-top">
                <h3><i class="fa-solid fa-people-roof"></i> <?php echo e($datas['prove_social_active']); ?></h3>
            </div>

            <div class="overview-bottom">
                <span>Clientes Renomados Activo</span>
            </div>
        </aside>
        <aside class="overview">
            <div class="overview-top">
                <h3><i class="fa-brands fa-stack-exchange"></i> <?php echo e($datas['testimonies_active']); ?></h3>
            </div>

            <div class="overview-bottom">
                <span>Depoimentos Activo</span>
            </div>
        </aside>
        <aside class="overview">
            <div class="overview-top">
                    <h3><i class="fa-solid fa-file-circle-question"></i> <?php echo e($datas['questions_active']); ?></h3>
            </div>

            <div class="overview-bottom">
                <span>Total de FAQ activas</span>
            </div>
        </aside>
        <aside class="overview">
            <div class="overview-top">
                <h3> <i class="fa-solid fa-message"></i> 5</h3>
            </div>

            <div class="overview-bottom">
                <span>Mensagens não lidas</span>
            </div>
        </aside>
    </article> <!-- Fim article overview -->


    <article id="mensagens-table">
        <h2>Últimas mensagens</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $visitors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $visitor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    <tr>
                        <td><?php echo e($loop->index + 1); ?></td>
                        <td>
                            <a href="<?php echo e(route('messages.show', ['message' => $visitor->message_id])); ?>">
                                <?php echo e($visitor->nome); ?>

                            </a>
                        </td>
                        <td><?php echo e($visitor->tel); ?></td>
                        <td><?php echo e($visitor->email); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3" id="foot-header">Total</th>
                    <td><?php echo e(Visitor::count()); ?></td>
                </tr>
            </tfoot>
        </table>
    </article>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\josimarmartins21\Documents\GitHub\qos-dashboard\resources\views/home.blade.php ENDPATH**/ ?>