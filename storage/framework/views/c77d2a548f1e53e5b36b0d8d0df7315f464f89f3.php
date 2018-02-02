<?php echo $__env->make('layouts.partials.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<v-app id="app">
    <navigations :current-user="<?php echo e(Auth::user()); ?>"></navigations>
    <?php echo $__env->yieldContent('content'); ?>
</v-app>
<?php echo $__env->make('layouts.partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
