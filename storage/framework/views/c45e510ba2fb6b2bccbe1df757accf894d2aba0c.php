[10:27, 9/23/2020] Verel: 

<?php $__env->startSection('content'); ?>

<?php $__env->startSection('sub-judul', 'Tambah Kategori'); ?>

<?php if(count($errors)>0): ?>
<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="alert alert-danger">
        <?php echo e($error); ?>

    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php if(Session::has('success')): ?>
    <div class="aler alert-succes" role="alert">
        <?php echo e(Session('succes')); ?>

    </div>
<?php endif; ?>

<form action="<?php echo e(route('category.update', $category->id)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('patch'); ?>
    <div class="form-group">
        <label>Kategori</label>
        <input type="text" class="form-control" name="name" value="<?php echo e($category->name); ?>">
    </div>

    <div class="form-group">
        <button class="btn btn-primary btn-block">Simpan Kategori</button>
    </div>
</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template_backend.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/dandyferdiansyah/Desktop/berita/resources/views/admin/category/edit.blade.php ENDPATH**/ ?>