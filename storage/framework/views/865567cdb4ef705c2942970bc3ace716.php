
<?php $__env->startSection('title','Meditation Edit'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Meditation</h4>
                <form class="forms-sample" action="<?php echo e(route('meditation.update',$meditation->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('put'); ?>
                    <div class="form-group"><label for="exampleInputName1">Name</label>
                    <input type="text" id="exampleInputName1" placeholder="Name" name="name" class="form-control" value="<?php echo e($meditation->name); ?>">
                       <?php if($errors->has('name')): ?>
                                        <div class="text-danger"><?php echo e($errors->first('name')); ?></div>
                                     <?php endif; ?>
                </div>
                
                <div class="form-group"><label for="image">Image</label>
                <input type="file" name="image" class="image">

                    <input type="hidden" name="image_base64">

                    <img src="<?php echo e(asset('uploads/'.$meditation->image)); ?>" style="width: 200px;" class="show-image"> 


                </div>
                    
                                    
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea
                            id="description"
                            name="desc"
                            rows="6"
                            class="form-control summernote"
                        ><?php echo e($meditation->desc); ?></textarea>
                       
                        <?php if($errors->has('desc')): ?>
                                        <div class="text-danger"><?php echo e($errors->first('desc')); ?></div>
                                     <?php endif; ?>
                    </div>
             <div class="form-group"><label for="audio">Audio</label>
                    <input type="file" id="audio" placeholder="Name" name="audio" class="form-control">
                       <?php if($errors->has('audio')): ?>
                                        <div class="text-danger"><?php echo e($errors->first('audio')); ?></div>
                                     <?php endif; ?>
                    <?php if($meditation->audio): ?>
                    <audio controls>
                <source src="<?php echo e(asset('uploads/'.$meditation->audio)); ?>" type="audio/mpeg">
                </audio>

                    <?php endif; ?>
                </div>
                <div class="form-group"><label for="position">Position</label>
                    <input type="number" id="position" placeholder="Position" name="position" class="form-control" value="<?php echo e($meditation->position); ?>" min="0">
                       
                </div>
                <div class="form-check"><label class="form-check-label"><input type="checkbox" name="status" checked="<?php echo e($meditation->status==1  ? 'checked' : ''); ?>" class="form-check-input"> Status <i class="input-helper"></i></label></div>
                    
                    <button type="submit" class="btn btn-success mr-2">Submit</button> 
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/u691775676/domains/sivanandadhyanam.in/public_html/resources/views/admin/meditation/edit.blade.php ENDPATH**/ ?>