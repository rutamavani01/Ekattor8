

<?php $__env->startSection('content'); ?>

<div class="mainSection-title">
    <div class="row">
        <div class="col-12">
            <div
              class="d-flex justify-content-between align-items-center flex-wrap gr-15"
            >
                <div class="d-flex flex-column">
                    <h4><?php echo e(get_phrase('Invoice')); ?></h4>
                    <ul class="d-flex align-items-center eBreadcrumb-2">
                        <li><a href="#"><?php echo e(get_phrase('Home')); ?></a></li>
                        <li><a href="#"><?php echo e(get_phrase('Accounting')); ?></a></li>
                        <li><a href="#"><?php echo e(get_phrase('Student Fee Manager')); ?></a></li>
                        <li><a href="#"><?php echo e(get_phrase('Invoice')); ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
  <div class="col-12">
    <div class="eSection-wrap-2">
      <div id="printableDiv">
        <h4 class="invoice_title pb-21"><?php echo e(get_phrase('INVOICE')); ?></h4>
        <!-- Invoice Info -->
        <div
          class="row flex-wrap justify-content-md-between align-items-start"printableDiv
        >
          <div class="col-sm-7">
            <div class="invoice_details">
              <div class="item">
                <div class="title"><?php echo e($student_details['name']); ?></div>
                <p class="sub-title"><?php echo e(get_phrase('Please find below the invoice')); ?></p>
              </div>
              <div class="item pt-57">
                <div class="title"><?php echo e(get_phrase('Billing Address')); ?></div>
                <p class="sub-title"><?php echo e($student_details['address']); ?><br>
                <abbr title="Phone">P:</abbr> <?php echo e($student_details['phone'] == "" ? '('.get_phrase('Phone number not found').')' : $student_details['phone']); ?><br></p>
              </div>
            </div>
          </div>
          <div class="col-sm-5">
            <div class="invoice_details text-sm-end">
              <div class="item">
                <p class="sub-title"><?php echo e(get_phrase('Invoice no')); ?></p>
                <div class="title"><?php echo e(sprintf('%08d', $invoice_details['id'])); ?></div>
              </div>
              <div class="item">
                <p class="sub-title"><?php echo e(get_phrase('Date')); ?></p>
                <div class="title"><?php echo e(date('D, d-M-Y')); ?></div>
              </div>
                <?php if(strtolower($invoice_details['status']) == 'paid'): ?>
                  <span class="eBadge ebg-soft-success"><?php echo e(get_phrase('Paid')); ?></span>
                <?php else: ?>
                  <span class="eBadge ebg-soft-danger"><?php echo e(get_phrase('Unpaid')); ?></span>
                <?php endif; ?>
            </div>
          </div>
        </div>
        <!-- Invoice Summary -->
        <div class="invoice_summary d-flex flex-column">
          <div class="invoice_summary_item">
            <div class="table-responsive">
              <table class="table eTable eTable-2 tbody-border">
                <thead>
                  <tr>
                    <th scope="col"><?php echo e(get_phrase('ID')); ?></th>
                    <th scope="col"><?php echo e(get_phrase('Invoice Title')); ?></th>
                    <th scope="col"><?php echo e(get_phrase('Total Amount')); ?></th>
                    <th scope="col"><?php echo e(get_phrase('Paid Amount')); ?></th>
                    <th scope="col"><?php echo e(get_phrase('Due Amount')); ?></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">
                      <p class="row-number"><?php echo e('1'); ?></p>
                    </th>
                    <td>
                      <div class="dAdmin_info_name min-w-100px">
                        <p><span><?php echo e($invoice_details['title']); ?></span></p>
                        <?php
                        $created_at = strtotime($invoice_details['created_at']);
                        $created_at = date('d-M-Y',$created_at);
                        ?>
                        <p><?php echo e($created_at); ?></p>
                      </div>
                    </td>
                    <td>
                      <div class="dAdmin_info_name min-w-100px">
                        <p><?php echo e(school_currency($invoice_details['total_amount'])); ?></p>
                      </div>
                    </td>
                    <td>
                      <div class="dAdmin_info_name">
                        <div class="dAdmin_info_name min-w-100px">
                          <p><?php echo e(school_currency($invoice_details['paid_amount'])); ?></p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="dAdmin_info_name min-w-150px">
                        <p><?php echo e(school_currency($invoice_details['total_amount'] - $invoice_details['paid_amount'])); ?></p>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="salary_table">
              <div class="table-responsive">
                <table class="table eTable eTable-2">
                  <tbody>
                    <tr>
                      <td>
                        <div class="dAdmin_info_name">
                          <p><?php echo e(get_phrase('Subtotal')); ?></p>
                        </div>
                      </td>
                      <td>
                        <div class="dAdmin_info_name">
                          <p><?php echo e(school_currency($invoice_details['total_amount'])); ?></p>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="dAdmin_info_name">
                          <p><?php echo e(get_phrase('Due')); ?></p>
                        </div>
                      </td>
                      <td>
                        <div class="dAdmin_info_name">
                          <p><?php echo e(school_currency($invoice_details['total_amount'] - $invoice_details['paid_amount'])); ?></p>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="dAdmin_info_name">
                          <p><span><?php echo e(get_phrase('Grand Total')); ?></span></p>
                        </div>
                      </td>
                      <td>
                        <div class="dAdmin_info_name">
                          <p><span><?php echo e(school_currency($invoice_details['total_amount'])); ?></span></p>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <a href="javascript:0" onclick="printableDiv('printableDiv')" class="print_invoice_btn" id="printPageButton">
        <span>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="16.202"
            height="16.202"
            viewBox="0 0 16.202 16.202"
          >
            <path
              id="print-solid"
              d="M14.176,6.076H2.025A2.026,2.026,0,0,0,0,8.1v3.038a1.013,1.013,0,0,0,1.013,1.013H2.025v3.038A1.013,1.013,0,0,0,3.038,16.2H13.164a1.013,1.013,0,0,0,1.013-1.013V12.151h1.013A1.013,1.013,0,0,0,16.2,11.139V8.1A2.027,2.027,0,0,0,14.176,6.076Zm-2.025,8.1H4.05V11.139h8.1Zm1.519-4.81a.759.759,0,1,1,.759-.759A.76.76,0,0,1,13.67,9.367ZM4.05,2.025h7.262l.839.839v2.2h2.025V2.444a1.012,1.012,0,0,0-.3-.716L12.448.3a1.012,1.012,0,0,0-.714-.3h-8.7A1.013,1.013,0,0,0,2.025,1.013v4.05H4.05Z"
              fill="#fff"
            />
          </svg>
        </span>
        <span><?php echo e(get_phrase('Print Invoice')); ?></span>
      </a>
    </div>
  </div>
</div>


<script type="text/javascript">

  "use strict"

  function printableDiv(printableAreaDivId) {
    var printContents = document.getElementById(printableAreaDivId).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
  }
</script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Ekattor8\resources\views/admin/student_fee_manager/invoice.blade.php ENDPATH**/ ?>