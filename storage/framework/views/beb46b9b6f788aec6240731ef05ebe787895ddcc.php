<?php 

use App\Models\Section;
use App\Models\Subject;
use App\Models\Session;

$active_session = Session::where('status', 1)->first();

?>

<form method="POST" class="d-block ajaxForm" enctype="multipart/form-data" action="<?php echo e(route('admin.syllabus.update', ['id' => $syllabus->id ])); ?>">
    <?php echo csrf_field(); ?> 
    <div class="form-row">
        <div class="fpb-7">
            <label for="title" class="eForm-label"><?php echo e(get_phrase('Tittle')); ?></label>
            <input type="text" class="form-control eForm-control" value="<?php echo e($syllabus->title); ?>" id="title" name = "title" required>
        </div>

        <div class="fpb-7">
            <label for="class_id_on_syllabus_creation" class="eForm-label"><?php echo e(get_phrase('Class')); ?></label>
            <select name="class_id" id="class_id_on_syllabus_creation" class="form-select eForm-select eChoice-multiple-with-remove"  required onchange="classWiseSectionForSyllabusCreate(this.value)">
                <option value=""><?php echo e(get_phrase('Select a class')); ?></option>
                <?php foreach($classes as $class): ?>
                    <option value="<?php echo e($class['id']); ?>" <?php echo e($syllabus['class_id'] == $class['id'] ?  'selected':''); ?>><?php echo e($class['name']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="fpb-7">
            <label for="section_id_on_syllabus_creation" class="eForm-label"><?php echo e(get_phrase('Section')); ?></label>
            <select name="section_id" id = "section_id_on_syllabus_creation" class="form-select eForm-select eChoice-multiple-with-remove"  required>
                <option value=""><?php echo e(get_phrase('Select a section')); ?></option>
                <?php $sections = Section::where(['class_id' => $syllabus['class_id']])->get(); ?>
                <?php foreach($sections as $section): ?>
                    <option value="<?php echo e($section['id']); ?>" <?php echo e($syllabus['section_id'] == $section['id'] ?  'selected':''); ?>><?php echo e($section['name']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="fpb-7">
            <label for="subject_id_on_syllabus_creation" class="eForm-label"><?php echo e(get_phrase('Subject')); ?></label>
            <select name="subject_id" id = "subject_id_on_syllabus_creation" class="form-select eForm-select eChoice-multiple-with-remove"  required>
                <option value=""><?php echo e(get_phrase('Select a subject')); ?></option>
                <?php $subjects = Subject::where(['class_id' => $syllabus['class_id'], 'session_id' => $active_session->id])->get(); ?>
                <?php foreach($subjects as $subject): ?>
                    <option value="<?php echo e($subject['id']); ?>" <?php echo e($syllabus['subject_id'] == $subject['id'] ?  'selected':''); ?>><?php echo e($subject['name']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="fpb-7">
            <label for="syllabus_file" class="eForm-label"><?php echo e(get_phrase('Upload syllabus')); ?></label>
            <input type="file" class="form-control eForm-control-file" id="syllabus_file" name = "syllabus_file" required>
        </div>

        <div class="fpb-7 pt-2">
            <button class="btn-form" type="submit"><?php echo e(get_phrase('Edit syllabus')); ?></button>
        </div>
    </div>
</form>


<script type="text/javascript">

    "use strict";

    function classWiseSectionForSyllabusCreate(classId) {
        let url = "<?php echo e(route('admin.class_wise_sections', ['id' => ":classId"])); ?>";
        url = url.replace(":classId", classId);
        $.ajax({
            url: url,
            success: function(response){
                $('#section_id_on_syllabus_creation').html(response);
                classWiseSubjectForSyllabusCreate(classId);
            }
        });
    }

    function classWiseSubjectForSyllabusCreate(classId) {
        let url = "<?php echo e(route('admin.class_wise_subject', ['id' => ":classId"])); ?>";
        url = url.replace(":classId", classId);
        $.ajax({
            url: url,
            success: function(response){
                $('#subject_id_on_syllabus_creation').html(response);
            }
        });
    }
    $(document).ready(function () {
      $(".eChoice-multiple-with-remove").select2();
    });

</script>
<?php /**PATH C:\xampp\htdocs\Ekattor8\resources\views/admin/syllabus/edit_syllabus.blade.php ENDPATH**/ ?>