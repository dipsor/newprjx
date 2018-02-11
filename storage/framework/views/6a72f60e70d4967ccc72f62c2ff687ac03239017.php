<?php $__env->startSection('content'); ?>
    <thesis-index :current-user="<?php echo e(Auth::user()); ?>"></thesis-index>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>