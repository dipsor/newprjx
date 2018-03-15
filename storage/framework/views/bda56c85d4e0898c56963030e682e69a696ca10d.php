<?php $__env->startComponent('mail::layout'); ?>
    
    <?php $__env->slot('header'); ?>
        <?php $__env->startComponent('mail::header', ['url' => config('app.url')]); ?>
            ALFA-TISK.CZ
        <?php echo $__env->renderComponent(); ?>
    <?php $__env->endSlot(); ?>
    <p>Gratulujeme, Vám k úspšnému vytvoření účtu.</p><p>Uživatel: <?php echo e($user->email); ?></p><p>Heslo: <?php echo e($pwd); ?></p>
    
    <?php if(isset($user)): ?>
        <?php $__env->slot('subcopy'); ?>
            <?php $__env->startComponent('mail::subcopy'); ?>
                <?php echo e($user->email); ?>

            <?php echo $__env->renderComponent(); ?>
        <?php $__env->endSlot(); ?>
    <?php endif; ?>
    
    <?php $__env->slot('footer'); ?>
        <?php $__env->startComponent('mail::footer'); ?>
            © <?php echo e(date('Y')); ?> <?php echo e(config('app.name')); ?>.
        <?php echo $__env->renderComponent(); ?>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>