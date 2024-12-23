<form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="<?php echo e(route('admin.create.fee_manager', ['value' => 'single'])); ?>">
	<?php echo csrf_field(); ?> 
	<div class="form-row">
		<div class="fpb-7">
            <label for="class_id_on_create" class="eForm-label"><?php echo e(get_phrase('Class')); ?></label>
            <select name="class_id" id="class_id_on_create" class="form-select eForm-control" required onchange="classWiseStudentOnCreate(this.value)" required>
                <option value=""><?php echo e(get_phrase('Select a class')); ?></option>
                <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($class->id); ?>"><?php echo e($class->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

		<div class="fpb-7">
            <label for="section_id_on_taking_attendance" class="eForm-label"><?php echo e(get_phrase('Section')); ?></label>
            <select name="section_id" id="section_id_on_taking_attendance" class="form-select eForm-control" required required onchange="classWiseStudentOnList(this.value)">
                <option value=""><?php echo e(get_phrase('Select section')); ?></option>
            </select>
        </div>

		<div class="fpb-7">
		  <label for="student_id_on_create" class="eForm-label"><?php echo e(get_phrase('Select student')); ?></label>
		  <div id = "student_content">
		    <select name="student_id" id="student_id_on_create" class="form-select eForm-control" required >
		      	<option value=""><?php echo e(get_phrase('Select a student')); ?></option>
		    </select>
		  </div>
		</div>

		<div class="fpb-7">
			<label for="title" class="eForm-label"><?php echo e(get_phrase('Invoice title')); ?></label>
			<input type="text" class="form-control eForm-control" id="title" name = "title" required>
		</div>

		<div class="fpb-7">
			<label for="total_amount" class="eForm-label"><?php echo e(get_phrase('Total amount').'('.school_currency().')'); ?></label>
			<input type="number" class="form-control eForm-control" id="total_amount" name = "total_amount" required>
		</div>

		<div class="fpb-7">
			<label for="paid_amount" class="eForm-label"><?php echo e(get_phrase('Paid amount').'('.school_currency().')'); ?></label>
			<input type="number" class="form-control eForm-control" id="paid_amount" name = "paid_amount" required>
		</div>

		<div class="fpb-7">
			<label for="status" class="eForm-label"><?php echo e(get_phrase('Status')); ?></label>
			<select name="status" id="status" class="form-select eForm-control" required >
				<option value=""><?php echo e(get_phrase('Select a status')); ?></option>
				<option value="paid"><?php echo e(get_phrase('Paid')); ?></option>
				<option value="unpaid"><?php echo e(get_phrase('Unpaid')); ?></option>
			</select>
		</div>

		<div class="fpb-7">
			<label for="payment_method" class="eForm-label"><?php echo e(get_phrase('Payment method')); ?></label>
			<select name="payment_method" id="payment_method" class="form-select eForm-control">
				<option value=""><?php echo e(get_phrase('Select a payment method')); ?></option>
				<option value="cash"><?php echo e(get_phrase('Cash')); ?></option>
				<option value="paypal"><?php echo e(get_phrase('Paypal')); ?></option>
				<option value="paytm"><?php echo e(get_phrase('Paytm')); ?></option>
				<option value="razorpay"><?php echo e(get_phrase('Razorpay')); ?></option>
				<option value="stripe"><?php echo e(get_phrase('Stripe')); ?></option>
				<option value="flutterwave"><?php echo e(get_phrase('Flutterwave')); ?></option>
				
			</select>
		</div>

	</div>
	<div class="form-group  col-md-12">
		<button class="btn-form" type="submit"><?php echo e(get_phrase('Create invoice')); ?></button>
	</div>
</form>

<script type="text/javascript">

  "use strict";
	
	
	function classWiseStudentOnCreate(classId) {
        let url = "<?php echo e(route('admin.class_wise_sections', ['id' => ":classId"])); ?>";
        url = url.replace(":classId", classId);
        $.ajax({
            url: url,
            success: function(response){
                $('#section_id_on_taking_attendance').html(response);
            }
        });
    }

	function classWiseStudentOnList(sectionId, classId) {
        let url = "<?php echo e(route('admin.class_wise_student_invoice', ['id' => ":sectionId"],['id' => ":classId"])); ?>";
        url = url.replace(":sectionId", sectionId, ":classId", classId);
        $.ajax({
            url: url,
            success: function(response){
                $('#student_id_on_create').html(response);
            }
        });
    }
	
  $(document).ready(function () {
    $(".eChoice-multiple-with-remove").select2();
  });	

</script><?php /**PATH C:\xampp\htdocs\Ekattor8\resources\views/admin/student_fee_manager/single.blade.php ENDPATH**/ ?>