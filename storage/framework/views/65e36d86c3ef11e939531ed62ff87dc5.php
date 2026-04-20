
<div id="error">
    <?php if(session('error')): ?>
        <p><?php echo e(session('error')); ?></p>
    <?php endif; ?>
</div>


<div id="success">
    <?php if(session('success')): ?>
        <p><?php echo e(session('success')); ?></p>
    <?php endif; ?>
</div><?php /**PATH C:\Users\josimarmartins21\Documents\GitHub\qos-dashboard\resources\views/components/alert.blade.php ENDPATH**/ ?>