<div class="eoff-form">
    <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="<?php echo e(route('admin.section.update', ['id' => $class_id])); ?>">
        <?php echo csrf_field(); ?> 
        <?php $count = 0; ?>
        <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $count++; ?> 
            <?php if($count == 1): ?>
                <div class="input-group me-2 mb-2">
                        <input type="hidden" class="form-control eForm-control" id="section<?php echo e($section->id); ?>" name = "section_id[]" value="<?php echo e($section->id); ?>">
                        <input type="text" class="form-control eForm-control" id="name" name = "name[]" value="<?php echo e($section->name); ?>" required>

                        <button class="btn btn-icon btn-success" type="button" onclick="appendSection()"><i class="bi bi-plus"></i></button>
                </div>
            <?php endif; ?>

            <?php if($count != 1): ?>
                <div class="input-group me-2 mb-2" id="sectionDatabase<?php echo e($section->id); ?>">
                        <input type="hidden" class="form-control eForm-control" id="section<?php echo e($section->id); ?>" name = "section_id[]" value="<?php echo e($section->id); ?>">
                        <input type="text" class="form-control eForm-control" name = "name[]" value="<?php echo e($section->name); ?>" required>

                        <button class="btn btn-icon btn-danger" type="button" onclick="removeSectionDatabase('<?php echo e($section->id); ?>')"><i class="bi bi-dash"></i></button>
                </div>
            <?php endif; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div id = "section_area"></div>
        <div class="row no-gutters">
        <div class="form-group  col-md-12 p-0 mt-2">
            <button class="eBtn eBtn btn-primary ms-2" type="submit"><?php echo e(get_phrase('Update')); ?></button>
        </div>
    </div>
    </form>
</div>

<div id = "blank_section" class="d-hidden">
    <div class="input-group me-2 mb-2">

            <input type="hidden" class="form-control eForm-control" name = "section_id[]" value="0">
            <input type="text" class="form-control eForm-control" name = "name[]" value="" required>

            <button class="btn btn-icon btn-danger" type="button" onclick="removeSection(this)"><i class="bi bi-dash"></i></button>
    </div>
</div>


<script type="text/javascript">
  
    "use strict";

    var blank_section_field = $('#blank_section').html();


    function appendSection() {
        $('#section_area').append(blank_section_field);
    }

    function removeSection(elem) {
        $(elem).closest('.input-group').remove();
    }

    function removeSectionDatabase(section_id) {
        $('#sectionDatabase'+section_id).hide();
        $('#section'+section_id).val(section_id+'delete');
    }
</script>
<?php /**PATH C:\xampp\htdocs\Ekattor8\resources\views/admin/class/sections.blade.php ENDPATH**/ ?>