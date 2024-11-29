

<?php $__env->startSection('content'); ?>

<style>
.table>:not(caption)>*>* {
    padding: 1.5rem .5rem;
}

@media (min-width: 576px) {
    .modal-dialog {
        max-width: 100%;
        margin: 1.75rem auto;
    }
}
</style>

<div class="mainSection-title">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center flex-wrap gr-15">
                <div class="d-flex flex-column">
                    <h4><?php echo e(get_phrase('Admit Card')); ?></h4>
                    <ul class="d-flex align-items-center eBreadcrumb-2">
                        <li><a href="#"><?php echo e(get_phrase('Home')); ?></a></li>
                        <li><a href="#"><?php echo e(get_phrase('Examination')); ?></a></li>
                        <li><a href="#"><?php echo e(get_phrase('Admit Card')); ?></a></li>
                    </ul>
                </div>
                <div class="export-btn-area">
                    <a href="javascript:;" class="export_btn"
                        onclick="rightModal('<?php echo e(route('admin.admit_card.open_modal')); ?>', '<?php echo e(get_phrase('Create Admit Card')); ?>')"><?php echo e(get_phrase('+Create New Admit Card')); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="eSection-wrap">
            <table class="table ">
                <thead>
                    <tr style="font-size: 13px; font-weight: 300; color: #797c8b;">
                        <th>#</th>
                        <th><?php echo e(get_phrase('Template Name')); ?></th>
                        <th><?php echo e(get_phrase('Admit Card')); ?></th>
                        <th><?php echo e(get_phrase('Actions')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $admitcards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admitcard): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="m-3"><?php echo e($loop->index + 1); ?></td>
                        <td><?php echo e($admitcard->template); ?></td>
                        <td><a href="#" class=" btn-sm " data-bs-toggle="modal" data-bs-target="#admitCardModal">See
                                Admit Card</a></td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="  eBtn eBtn-black dropdown-toggle table-action-btn-2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end eDropdown-menu-2 eDropdown-table-action showmenu"
                                    style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(12px, 37px);">
                                    <a class="dropdown-item" href="javascript:;"
                                        onclick="rightModal('<?php echo e(route('admin.edit.admit_card')); ?>', '<?php echo e(get_phrase('Edit Grade')); ?>')"><?php echo e(get_phrase('Edit')); ?></a>
                                    <li><a class="dropdown-item" href="#"
                                            onclick="confirmModal('<?php echo e(route('admin.admit_card.delete',['id'=>$admitcard->id])); ?>','undefined')">Delete</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>


            <!-- admit card modal box -->

            <div class="modal fade" id="admitCardModal" tabindex="-1" aria-labelledby="admitCardModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xxl">
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
                                                        <div class="col-md-4"><strong>CANDIDATE'S<br> NAME</strong>
                                                        </div>
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
                                                <img src="<?php echo e(asset('assets/images/person.png')); ?>" alt="person"
                                                    width="100%">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <hr>
                                        <img src="<?php echo e(asset('assets/images/signature.png')); ?>" alt="Signature"
                                            width="20%">
                                        <p class="fs-6 m-0">_________________________</p>
                                        <h3 class="fs-6 m-0">Signature</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Ekattor8\resources\views/admin/admit_card/admitcard.blade.php ENDPATH**/ ?>