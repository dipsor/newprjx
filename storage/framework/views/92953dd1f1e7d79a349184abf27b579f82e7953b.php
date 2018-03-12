<?php $__env->startSection('content'); ?>
    <order-detail :current-user="<?php echo e(Auth::user()); ?>" gopay-order-id="<?php echo e($id); ?>"></order-detail>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>