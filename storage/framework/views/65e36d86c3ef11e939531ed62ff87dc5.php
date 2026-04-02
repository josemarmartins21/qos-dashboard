
<div id="error">
    <?php if(session('error')): ?>
        <p><?php echo e(session('error')); ?></p>
    <?php endif; ?>
</div>


<div id="success">
    <?php if(session('success')): ?>
        <p><?php echo e(session('success')); ?></p>
    <?php endif; ?>
</div>

<div id="errors">
    <?php if($errors->any()): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p><?php echo e($error); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</div><?php /**PATH C:\Users\josimarmartins21\Documents\GitHub\qos-dashboard\resources\views/components/alert.blade.php ENDPATH**/ ?>