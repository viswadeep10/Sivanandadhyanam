
<?php $__env->startSection('title','Meditation'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Meditation</h4>
                <a href="<?php echo e(route('meditation.create')); ?>" class="btn btn-icons btn-success float-right"><i
                        class="mdi mdi-plus"></i></a>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>S.no</th>
                                <th>Name</th>
                                <th>Created</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(++$i); ?></td>
                                <td><?php echo e($val->name); ?></td>
                                <td><?php echo e(date('Y-m-d',strtotime($val->created_at))); ?></td>
                                <td><?php echo $val->status==1 ? '<label class="badge badge-success">Active</label>' : '<label
                                        class="badge badge-danger">Deactive</label>'; ?>

                                </td>
                                <td>
                                    <a href="<?php echo e(route('meditation.edit',$val->id)); ?>" class="btn btn-icons btn-primary"><i
                                            class="mdi mdi-pencil"></i></a>

                                    <form action="<?php echo e(route('meditation.destroy', $val->id)); ?>" method="POST"
                                        id="delete-<?php echo e($val->id); ?>" class="d-none">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field("DELETE"); ?>
                                    </form>
                                    <a href="#" class="btn btn-icons btn-danger" onclick="deleteRecord(<?php echo e($val->id); ?>)"><i
                                            class="mdi mdi-delete"></i></a>

                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php echo $data->links(); ?>


                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/u691775676/domains/sivanandadhyanam.in/public_html/resources/views/admin/meditation/index.blade.php ENDPATH**/ ?>