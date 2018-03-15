<?php $__env->startComponent('mail::layout'); ?>
    
    <?php $__env->slot('header'); ?>
        <?php $__env->startComponent('mail::header', ['url' => config('app.url')]); ?>
            ALFA-TISK.CZ
        <?php echo $__env->renderComponent(); ?>
    <?php $__env->endSlot(); ?>
    <p>Objednávka byla vytvořena.</p>
    <ul><li><?php echo e($order->name); ?></li><li><?php echo e($order->price); ?> Kč</li></ul>
    <?php $__env->startComponent('mail::button', ['url' => route('users.order.show', ['orderId' => $order->id]), 'color' => 'green']); ?>
        Zobrazit objednávku
    <?php echo $__env->renderComponent(); ?>
    
    <?php $__env->slot('footer'); ?>
        <?php $__env->startComponent('mail::footer'); ?>
            © <?php echo e(date('Y')); ?> <?php echo e(config('app.name')); ?>.
        <?php echo $__env->renderComponent(); ?>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>