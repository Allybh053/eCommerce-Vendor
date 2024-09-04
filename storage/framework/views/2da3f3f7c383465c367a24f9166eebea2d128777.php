<?php use Illuminate\Support\Facades\Auth; ?>
<?php if(Auth::user()): ?>
    <?php switch(Auth::user()->role):
        case ("vendor"): ?>
            <?php echo $__env->make('backend.profile.vendor_profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php case ("admin"): ?>
            <?php echo $__env->make('backend.profile.admin_profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endswitch; ?>

<?php else: ?>
    <?php echo $__env->make('auth.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>


<?php /**PATH C:\laragon\www\vendor-eCommerce\resources\views/index.blade.php ENDPATH**/ ?>