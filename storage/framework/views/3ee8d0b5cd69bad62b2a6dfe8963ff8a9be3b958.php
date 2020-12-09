<?php $__env->startSection('content'); ?>

<?php $__env->startSection('sub-judul', 'Kategori'); ?>

<?php if(Session::has('success')): ?>
<div class="alert alert-success" role="alert">
    <?php echo e(Session('success')); ?>

</div>
<?php endif; ?>

<a href="<?php echo e(route('category.create')); ?>" class="btn btn-info btn-sm">Tambah Kategori</a>
<br><br>

<table class="table table-striped table-hover table-sm table-bordered">
<thead>
    <tr>
        <th>No</th>
        <th>Nama Kategori</th>
        <th>Action</th>
    </tr>
</thead>

<tbody>
    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result => $hasil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
    <td><?php echo e($result + $category->firstitem()); ?></td>
    <td><?php echo e($hasil->name); ?></td>
     <td>
        <form action="<?php echo e(route('category.destroy', $hasil->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('delete'); ?>
            <a href="<?php echo e(route('category.edit', $hasil->id)); ?>" class="btn btn-primary btn-sm">Edit</a>    
            <button type="submit" class="btn btn-danger btn-sm">Delete</button>   
        </form>
    
     </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
</table>
<?php echo e($category->links()); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('template_backend.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/dandyferdiansyah/Desktop/berita/resources/views/admin/category/index.blade.php ENDPATH**/ ?>