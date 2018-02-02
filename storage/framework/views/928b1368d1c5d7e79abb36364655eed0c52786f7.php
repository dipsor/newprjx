<?php echo $__env->make('landing.partials.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div id="app">
    <?php echo $__env->yieldContent('content'); ?>
</div>
<?php echo $__env->make('landing.partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>