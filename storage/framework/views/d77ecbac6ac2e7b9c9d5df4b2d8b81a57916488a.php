<?php $__env->startSection('content'); ?>
    <users-edit :current-user="<?php echo e(Auth::user()); ?>"></users-edit>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>