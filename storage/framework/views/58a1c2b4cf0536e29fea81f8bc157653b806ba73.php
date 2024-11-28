

<?php $__env->startSection('content'); ?>
<style>
.card {
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
}

.card-header {
    background-color: #f8f9fa;
}

.card-footer {
    background-color: #f8f9fa;
    font-size: 14px;
}

strong {
    font-weight: bold;
}
</style>
<div class="mainSection-title">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center flex-wrap gr-15">
                <div class="d-flex flex-column">
                    <h4><?php echo e(get_phrase('Print Admit Card
                        ')); ?></h4>
                    <ul class="d-flex align-items-center eBreadcrumb-2">
                        <li><a href="#"><?php echo e(get_phrase('Home')); ?></a></li>
                        <li><a href="#"><?php echo e(get_phrase('Examination')); ?></a></li>
                        <li><a href="#"><?php echo e(get_phrase('Admit Card')); ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="eSection-wrap">
            <div class="row mt-3">

                <div class="col-md-3">
                    <!-- <label for="Select Category" class="eForm-label"><?php echo e(get_phrase('Select Category')); ?></label> -->
                    <select class="form-select eForm-select eChoice-multiple-with-remove" id="session_to"
                        name="session_to">
                        <option value=""><?php echo e(get_phrase('Select Category')); ?></option>
                        <?php $__currentLoopData = $sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($session->id); ?>"><?php echo e($session->session_title); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="col-md-3">
                    <!-- <label for="class_id_from" class="eForm-label"><?php echo e(get_phrase('Select Class')); ?></label> -->
                    <select name="class_id_from" id="class_id_from"
                        class="form-select eForm-select eChoice-multiple-with-remove" required
                        onchange="classWiseSectionFrom(this.value)">
                        <option value=""><?php echo e(get_phrase('Select Class')); ?></option>
                        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($class->id); ?>"><?php echo e($class->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="col-md-3">
                    <!-- <label for="section_id_from" class="eForm-label"><?php echo e(get_phrase('Select a Section')); ?></label> -->
                    <select name="section_id_from" id="section_id_from"
                        class="form-select eForm-select eChoice-multiple-with-remove" required>
                        <option value=""><?php echo e(get_phrase('Select a Section')); ?></option>
                    </select>
                </div>

                <div class="col-md-3"></div>

                <div class="col-md-3 mt-4">
                    <!-- <label for="session_from" class="eForm-label"><?php echo e(get_phrase('Select A Session')); ?></label> -->
                    <select class="form-select eForm-select eChoice-multiple-with-remove" id="session_from"
                        name="session_from">
                        <option value=""><?php echo e(get_phrase('Select A Session')); ?></option>
                        <?php $__currentLoopData = $sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($session->id); ?>"><?php echo e($session->session_title); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="col-md-3 ">
                    <button class="eBtn eBtn btn-secondary mt-4" type="button" id="manage_student"
                        onclick="manage_student()"><?php echo e(get_phrase('Filter')); ?></button>
                </div>

                <div class="card-body table-responsive subject_content">
                    <div class="empty_box center">
                        <img class="mb-3" width="150px" src="<?php echo e(asset('assets/images/empty_box.png')); ?>" />
                    </div>
                </div>

            </div>


        </div>
    </div>
</div>

<!-- // Boxes For Preview -->
<div class="container m-auto">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-4">
                <div class="text-center">
                    <h3>Harward Secondary School</h3>
                    <h5>Semester Final Examination 2024</h5>
                    <h2 class=m-0>Final Exam</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row mb-3">
                                <div class="d-flex align-items-center">
                                    <strong>ROLL NUMBER</strong>
                                    <h2></h2>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="col-md-4"><strong>CANDIDATE'S<br> NAME</strong></div>
                                    <div class="col-md-5">
                                        <p class="ms-4 m-0 fs-6">Raymond Key</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="col-md-4"><strong>D.O.B</strong></div>
                                    <div class="col-md-5">
                                        <p class="ms-4 m-0 fs-6">09 Sep 2011</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="col-md-4"><strong>PARENTS NAME</strong></div>
                                    <div class="col-md-5">
                                        <p class="ms-4 m-0 fs-6">Linus Fernandez</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="col-md-4"><strong>ADDRESS</strong></div>
                                    <div class="col-md-5">
                                        <p class="ms-4 m-0 fs-6">Dicta quos excepteur</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="col-md-4"><strong>SCHOOL NAME</strong></div>
                                    <div class="col-md-5">
                                        <p class="ms-4 m-0 fs-6">Harward Secondary School</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="col-md-4"><strong>CLASS</strong></div>
                                    <div class="col-md-5">
                                        <p class="ms-4 m-0 fs-6">Two</p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="col-md-4"><strong>SECTION</strong></div>
                                        <div class="col-md-5">
                                            <p class="ms-4 m-0 fs-6">A</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="col-md-4"><strong>GENDER</strong></div>
                                        <div class="col-md-5">
                                            <p class="ms-4 m-0 fs-6">Male</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="col-md-4"><strong>CONTACT</strong></div>
                                        <div class="col-md-5">
                                            <p class="ms-4 m-0 fs-6">+1(443)147-7943</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="col-md-4"><strong>EXAM CENTER</strong></div>
                                        <div class="col-md-5">
                                            <p class="ms-4 m-0 fs-6">India</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 text-center">
                            <!-- <img src="<?php echo e(asset('images/student-photo.jpg')); ?>" alt="Student Photo"
                                class="img-fluid rounded-circle" width="200"> -->
                            <img src="<?php echo e(asset('assets/images/person.png')); ?>" alt="person" width="100%">
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <hr>
                    <img src="<?php echo e(asset('assets/images/signature.png')); ?>" alt="Signature" width="20%">
                    <p class="fs-6 m-0">_________________________</p>
                    <h3 class="fs-6 m-0">Signature</h3>
                </div>
            </div>
        </div>
    </div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Ekattor8\resources\views/admin/admit_card/printadmitcard.blade.php ENDPATH**/ ?>