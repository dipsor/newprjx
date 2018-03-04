<?php $__env->startSection('content'); ?>
    <users-index  :current-user="<?php echo e(Auth::user()); ?>" gopay-order-id="<?php echo e($id); ?>"></users-index>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>