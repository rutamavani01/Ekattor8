<div class="eoff-form">
    <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm"
        action="<?php echo e(route('admin.admit_card.update')); ?>">
        <?php echo csrf_field(); ?>
        <div class="form-row">
            <div class="fpb-7">
                <label for="template" class="eForm-label"><?php echo e(get_phrase('Template *')); ?></label>
                <input type="text" class="form-control eForm-control" id="template" name="template" required>
            </div>

            <div class="fpb-7">
                <label for="heading" class="eForm-label"><?php echo e(get_phrase('Heading ')); ?></label>
                <input type="text" class="form-control eForm-control" id="heading" name="heading" required>
            </div>

            <div class="fpb-7">
                <label for="title" class="eForm-label"><?php echo e(get_phrase('Title ')); ?></label>
                <input type="text" class="form-control eForm-control" id="title" name="title" required>
            </div>

            <div class="fpb-7">
                <label for="examname" class="eForm-label"><?php echo e(get_phrase('Exam Name ')); ?></label>
                <input type="text" class="form-control eForm-control" id="examname" name="examname" required>
            </div>

            <div class="fpb-7">
                <label for="examcenter" class="eForm-label"><?php echo e(get_phrase('Exam Center ')); ?></label>
                <input type="text" class="form-control eForm-control" id="examcenter" name="examcenter" required>
            </div>

            <div class="fpb-7">
                <label for="footertext" class="eForm-label"><?php echo e(get_phrase('Footer Text ')); ?></label>
                <input type="text" class="form-control eForm-control" id="footertext" name="footertext" required>
            </div>

            <div class="fpb-7">
                <label for="footertext" class="eForm-label"><?php echo e(get_phrase('Signature ')); ?></label>
                <input class="form-control eForm-control-file" type="file" class="form-control eForm-control"
                    id="footertext" name="footertext" required>
            </div>

            <div class="fpb-7 pt-2">
                <button class="btn-form" type="submit"><?php echo e(get_phrase('Create')); ?></button>
            </div>
        </div>
    </form>
</div><?php /**PATH C:\xampp\htdocs\Ekattor8\resources\views/admin/admit_card/edit_admincard.blade.php ENDPATH**/ ?>