
<?php $__env->startSection('title','Meditation Add'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Meditation</h4>
                <form class="forms-sample" action="<?php echo e(route('meditation.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group"><label for="exampleInputName1">Name</label>
                    <input type="text" id="exampleInputName1" placeholder="Name" name="name" class="form-control" value="<?php echo e(old('name')); ?>">
                       <?php if($errors->has('name')): ?>
                                        <div class="text-danger"><?php echo e($errors->first('name')); ?></div>
                                     <?php endif; ?>
                </div>
                
                <div class="form-group"><label for="image">Image</label>
                <input type="file" name="image" class="image">

                    <input type="hidden" name="image_base64">

                    <img src="" style="width: 200px;display: none;" class="show-image"> 


                </div>
                    <?php if($errors->has('image_base64')): ?>
                                        <div class="text-danger"><?php echo e($errors->first('image_base64')); ?></div>
                                     <?php endif; ?>
                                    
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea
                            id="description"
                            name="desc"
                            rows="6"
                            class="form-control summernote"
                        ><?php echo e(old('desc')); ?></textarea>
                       
                        <?php if($errors->has('desc')): ?>
                                        <div class="text-danger"><?php echo e($errors->first('desc')); ?></div>
                                     <?php endif; ?>
                    </div>

                  <div class="form-group"><label for="audio">Audio</label>
                    <input type="file" id="audio" placeholder="Name" name="audio" class="form-control">
                       <?php if($errors->has('audio')): ?>
                                        <div class="text-danger"><?php echo e($errors->first('audio')); ?></div>
                                     <?php endif; ?>
                </div>
                <div class="form-group"><label for="position">Position</label>
                    <input type="number" id="position" placeholder="Position" name="position" class="form-control" value="<?php echo e(old('position')); ?>" min="0">
                       
                </div>
                <div class="form-check"><label class="form-check-label"><input type="checkbox" name="status" checked="<?php echo e(old('status')  ? 'checked' : ''); ?>" class="form-check-input"> Status <i class="input-helper"></i></label></div>
                    <button type="submit" class="btn btn-success mr-2">Submit</button> 
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/u691775676/domains/sivanandadhyanam.in/public_html/resources/views/admin/meditation/create.blade.php ENDPATH**/ ?>