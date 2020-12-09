<?php $__env->startSection('content'); ?>

<?php $__env->startSection('sub-judul', 'User'); ?>

<?php if(Session::has('success')): ?>
<div class="alert alert-success" role="alert">
    <?php echo e(Session('success')); ?>

</div>
<?php endif; ?>

<a href="<?php echo e(route('user.create')); ?>" class="btn btn-info btn-sm">Tambah User</a>
<br><br>

<table class="table table-striped table-hover table-sm table-bordered">
<thead>
    <tr>
        <th>No</th>
        <th>Nama User</th>
        <th>Email</th>
        <th>Type</th>
        <th>Action</th>
    </tr>
</thead>

<tbody>
    <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result => $hasil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
    <td><?php echo e($result + $user->firstitem()); ?></td>
    <td><?php echo e($hasil->name); ?></td>
    <td><?php echo e($hasil->email); ?></td>
    <td>
        <?php if($hasil->tipe): ?>
            <span class="badge badge-info">Administrator</span>
        <?php else: ?>
            <span class="badge badge-warning">Author</span>
        <?php endif; ?>
    </td>
     <td>
        <form action="<?php echo e(route('user.destroy', $hasil->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('delete'); ?>
            <a href="<?php echo e(route('user.edit', $hasil->id)); ?>" class="btn btn-primary btn-sm">Edit</a>    
            <button type="submit" class="btn btn-danger btn-sm">Delete</button>   
        </form>
    
     </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
</table>
<?php echo e($user->links()); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('template_backend.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/dandyferdiansyah/Desktop/berita/resources/views/admin/user/index.blade.php ENDPATH**/ ?>