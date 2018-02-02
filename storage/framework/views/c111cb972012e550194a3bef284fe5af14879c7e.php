<?php $__env->startSection('content'); ?>
    
    <landing-page
            is-user-logged-in="<?php echo e(Auth::check()); ?>"
            current-user="<?php echo e(Auth::user() ? Auth::user() : null); ?>"
    >
    </landing-page>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('landing.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>