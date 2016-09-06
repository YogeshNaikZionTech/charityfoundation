<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $__env->make('partials._head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>


<body>
<!-- Header from partials -->
    <?php echo $__env->make('partials._nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- content from any page -->
    <?php echo $__env->yieldContent('content'); ?>
<!-- content from partial footer. -->
    <?php echo $__env->make('partials._footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- Add javascript of your own -->
    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>