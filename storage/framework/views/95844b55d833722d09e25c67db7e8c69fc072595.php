
   
<?php $__env->startSection('content'); ?>

<div class="mainSection-title">
    <div class="row">
      <div class="col-12">
        <div
          class="d-flex justify-content-between align-items-center flex-wrap gr-15"
        >
          <div class="d-flex flex-column">
            <h4><?php echo e(get_phrase('Parent Update')); ?></h4>
            <ul class="d-flex align-items-center eBreadcrumb-2">
              <li><a href="#"><?php echo e(get_phrase('Home')); ?></a></li>
              <li><a href="#"><?php echo e(get_phrase('Users')); ?></a></li>
              <li><a href="#"><?php echo e(get_phrase('Parent')); ?></a></li>
              <li><a href="#"><?php echo e(get_phrase('Edit')); ?></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="eSection-wrap-2">
            <div class="eMain">
                <div class="row">
                    <div class="col-md-6 pb-3">
                        <div class="eForm-layouts">
                            <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="<?php echo e(route('admin.parent.update', ['id' => $user->id])); ?>">
                                <?php echo csrf_field(); ?> 

                                <div class="fpb-7">
                                    <label for="name" class="eForm-label"><?php echo e(get_phrase('Name')); ?></label>
                                    <input type="text" class="form-control eForm-control" value="<?php echo e($user->name); ?>" id="name" name = "name" required>
                                </div>

                                <div class="fpb-7">
                                    <label for="email" class="eForm-label"><?php echo e(get_phrase('Email')); ?></label>
                                    <input type="email" class="form-control eForm-control" value="<?php echo e($user->email); ?>" id="email" name = "email" required>
                                </div>

                                <?php 
                                $info = json_decode($user->user_information);
                                ?>

                                <div class="fpb-7">
                                    <label for="birthdatepicker" class="eForm-label"><?php echo e(get_phrase('Birthday')); ?></label>
                                    <input type="text" class="form-control eForm-control inputDate" id="birthday" name="birthday" value="<?php echo e(date('m/d/Y', $info->birthday)); ?>" />
                                </div>

                                <div class="row">
                                    <div class="form-group col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12 pt-2">
                                        <label for="class_id" class="eForm-label"><?php echo e(get_phrase('Class')); ?></label>
                                        <select name="class_id" id="class_id" class="form-select eForm-select eChoice-multiple-with-remove" onchange="classWiseSection(this.value)">
                                            <option value=""><?php echo e(get_phrase('Select a class')); ?></option>
                                            <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($class->id); ?>"><?php echo e($class->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12 pt-2">
                                        <label for="section_id" class="eForm-label"><?php echo e(get_phrase('Section')); ?></label>
                                        <select name="section_id" id="section_id" class="form-select eForm-select eChoice-multiple-with-remove">
                                            <option value=""><?php echo e(get_phrase('Select section')); ?></option>
                                        </select>
                                    </div>
                                </div>

                                <div id="first_row">

                                    <div class="row p-0">
                                        <div class="form-group col-xl-10 col-lg-5 col-md-5 col-sm-12 col-xs-12 pt-2">
                                            <label for="student_id[]" class="eForm-label"><?php echo e(get_phrase('Child')); ?></label>
                                            <select name="student_id[]" id="student_id_1" class="form-select eForm-select eChoice-multiple-with-remove" >
                                                <option value=""></option>
                                            </select>
                                        </div>

                                        <div class="col-xl-1 col-lg-1 col-md-2 col-sm-12 mb-3 mb-lg-0 pt-3">
                                            <label for="student_id[]" class="eForm-label"><?php echo e(get_phrase('')); ?></label>
                                            <button type="button" class="btn btn-icon btn-success" onclick="appendRow()"> <i class="bi bi-plus"></i> </button>
                                        </div>
                                    </div>
                                    
                                </div>


                                <?php 
                                $childs = DB::table('users')->where('parent_id', $user->id)->get();
                                ?>

                                <?php if(count($childs) > 0): ?>
                                    <?php $__currentLoopData = $childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        
                                        <div id="existing_row<?php echo e($child->id); ?>">
                                            <div class="child_existing_row row">
                                                <div class="form-group col-xl-10 col-lg-5 col-md-5 col-sm-12 col-xs-12 pt-2">
                                                    <input type="text" name="student_name[]" id="student_id_<?php echo e($child->id); ?>" class="student_id form-control eForm-control" value="<?php echo e($child->name); ?>" readonly>
                                                </div>

                                                <input type="text" name="student_id[]" id="student_id_<?php echo e($child->id); ?>" class="student_id form-control eForm-control" value="<?php echo e($child->id); ?>" readonly hidden>

                                                <div class="col-xl-1 col-lg-1 col-md-2 col-sm-12 mb-3 mb-lg-0 pt-2">
                                                    <button type="button" class="delete_child btn btn-icon btn-danger" id="delete_child" onclick="removeExistingRow(this)"> <i class="bi bi-x"></i> </button>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>


                                <div id="blank_row">
                                    <div class="child_added_row row p-0 m-0">
                                        <div class="form-group col-xl-10 col-lg-5 col-md-5 col-sm-12 col-xs-12 pt-2">
                                            <input type="text" name="student_name[]" id="student_name" class="student_name form-control eForm-control" readonly>
                                        </div>

                                        <input type="text" name="student_id[]" id="student_id" class="student_id form-control eForm-control" readonly hidden>

                                        <div class="col-xl-1 col-lg-1 col-md-2 col-sm-12 mb-3 mb-lg-0 pt-2">
                                            <button type="button" class="delete_child btn btn-icon btn-danger" id="delete_child" onclick="removeRow(this)"> <i class="bi bi-x"></i> </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="fpb-7">
                                    <label for="gender" class="eForm-label"><?php echo e(get_phrase('Gender')); ?></label>
                                    <select name="gender" id="gender" class="form-select eForm-select eChoice-multiple-with-remove"  required>
                                        <option value=""><?php echo e(get_phrase('Select gender')); ?></option>
                                        <option value="Male" <?php echo e($info->gender == 'Male' ?  'selected':''); ?> ><?php echo e(get_phrase('Male')); ?></option>
                                        <option value="Female" <?php echo e($info->gender == 'Female' ?  'selected':''); ?>><?php echo e(get_phrase('Female')); ?></option>
                                        <option value="Others" <?php echo e($info->gender == 'Others' ?  'selected':''); ?>><?php echo e(get_phrase('Others')); ?></option>
                                    </select>
                                </div>

                                <div class="fpb-7">
                                    <label for="blood_group" class="eForm-label"><?php echo e(get_phrase('Blood group')); ?></label>
                                    <select name="blood_group" id="blood_group" class="form-select eForm-select eChoice-multiple-with-remove">
                                        <option value=""><?php echo e(get_phrase('Select a blood group')); ?></option>
                                        <option value="a+" <?php echo e($info->blood_group == 'a+' ?  'selected':''); ?> ><?php echo e(get_phrase('A+')); ?></option>
                                        <option value="a-" <?php echo e($info->blood_group == 'a-' ?  'selected':''); ?> ><?php echo e(get_phrase('A-')); ?></option>
                                        <option value="b+" <?php echo e($info->blood_group == 'b+' ?  'selected':''); ?> ><?php echo e(get_phrase('B+')); ?></option>
                                        <option value="b-" <?php echo e($info->blood_group == 'b-' ?  'selected':''); ?> ><?php echo e(get_phrase('B-')); ?></option>
                                        <option value="ab+" <?php echo e($info->blood_group == 'ab+' ?  'selected':''); ?> ><?php echo e(get_phrase('AB+')); ?></option>
                                        <option value="ab-" <?php echo e($info->blood_group == 'ab-' ?  'selected':''); ?> ><?php echo e(get_phrase('AB-')); ?></option>
                                        <option value="o+" <?php echo e($info->blood_group == 'o+' ?  'selected':''); ?> ><?php echo e(get_phrase('O+')); ?></option>
                                        <option value="o-" <?php echo e($info->blood_group == 'o-' ?  'selected':''); ?> ><?php echo e(get_phrase('O-')); ?></option>
                                    </select>
                                </div>

                                <div class="fpb-7">
                                    <label for="address" class="eForm-label"><?php echo e(get_phrase('Address')); ?></label>
                                    <textarea class="form-control eForm-control" id="address" name = "address" rows="5" required><?php echo e($info->address); ?></textarea>
                                </div>

                                <div class="fpb-7">
                                    <label for="phone" class="eForm-label"><?php echo e(get_phrase('Phone')); ?></label>
                                    <input type="text" class="form-control eForm-control" value="<?php echo e($info->phone); ?>" id="phone" name = "phone" required>
                                </div>

                                <div class="fpb-7">
                                    <label for="formFile" class="eForm-label"><?php echo e(get_phrase('Photo')); ?></label>
                                    <input class="form-control eForm-control-file" id="photo" name="photo" accept="image/*" type="file" />
                                </div>

                                <div class="fpb-7 pt-2">
                                    <button class="btn-form" type="submit"><?php echo e(get_phrase('Update')); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    "use strict";

     // CREATING BLANK ALLOWANCE INPUT
    var blank_field = '';
    var student_array = [];

    $(document).ready(function () {
        $('#blank_row').hide();
        blank_field = $('#blank_row').html();
    });

    $(function () {
      $('.inputDate').daterangepicker(
        {
          singleDatePicker: true,
          showDropdowns: true,
          minYear: 1901,
          maxYear: parseInt(moment().format("YYYY"), 10),
        },
        function (start, end, label) {
          var years = moment().diff(start, "years");
        }
      );
    });

    
    function classWiseSection(classId) {
        let url = "<?php echo e(route('class_wise_sections', ['id' => ":classId"])); ?>";
        url = url.replace(":classId", classId);
        $.ajax({
            url: url,
            success: function(response){
                $('#section_id').html(response);
                loadStudent(classId);
            }
        });
    }

    function loadStudent(classId) {
        let url = "<?php echo e(route('class_wise_student', ['id' => ":classId"])); ?>";
        url = url.replace(":classId", classId);
        $.ajax({
            url: url,
            success: function(response){
                $('#student_id_1').html(response);
            }
        });
    }

    var child_count     = 1;

    function appendRow() {
        child_count++;
        var id=$('#student_id_1').val();
        var class_id=$('#class_id').val();
        var section_id=$('#section_id').val();

        if(class_id != '' && section_id != '' && id != '' && !student_array.includes(id)) {
            student_array.push(id);
            $('#first_row').append(blank_field);
            $('#student_id').attr('id', 'student_id_' + child_count);
            $('#student_name').attr('id', 'student_name_' + child_count);
           

            var name = "";

            let url = "<?php echo e(route('id_wise_user_name', ['id' => ":id"])); ?>";
            url = url.replace(":id", id);
            $.ajax({
                url: url,
                success: function(response){
                    name=response;
                    
                    $('#student_name_' + child_count).val(name);
                    $('#student_id_' + child_count).val(id);
                }
            });

            document.getElementById("student_id_1").value = "";
        } else {
            if(class_id == '' || section_id == '' || id == '') {
                toastr.warning('Select all the field');
            } else {
                toastr.warning('Student already added');
            }
        }
    }

    function removeRow(elem) {
        $(elem).closest('.child_added_row').remove();
    }
    
    function removeExistingRow(elem) {
        $(elem).closest('.child_existing_row').remove();
    }

</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Ekattor8\resources\views/admin/parent/edit_parent.blade.php ENDPATH**/ ?>