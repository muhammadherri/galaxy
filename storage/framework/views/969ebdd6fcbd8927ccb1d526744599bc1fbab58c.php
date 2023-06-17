<?php $__env->startSection('styles'); ?>
<style>
    @page  {
        margin: 0 !important;
        margin-top: 0 !important;
        /* padding: 5px !important; */
        size: auto;
        /*  auto is the current printer page size */

    }

    *

    /** Define the header rules **/
    header {
        position: fixed;
        top: 10px;
        left: 20px;
        right: 20px;
        height: 3cm;
    }

    /** Define the footer rules **/
    footer {
        position: relative;
        top: 26cm;
        bottom: 0cm;
        left: 0cm;
        right: 1cm;
        height: 1cm;
        text-align: right;
        margin-right: 20px;
    }


    #footer .page::before {
        /* counter-increment: page; */
        content: counter(page);
    }

    /* p{
                        counter-reset: page;
                    } */

    /* body{
                font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                color:#333;
                text-align:left;
                font-size:12;
                margin-top: 2cm;
                margin-left: 20px;
                margin-right: 20px;
                font-size: 11px;
            } */
    .container {
        /* to centre page on screen*/
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        color: #333;
        text-align: left;
        font-size: 12;
        margin-left: 0px;
        margin-right: 20px;
        font-size: 11px;
    }

    table {
        width: 100%;
        padding-left: 0;
        padding: 50px;
        margin-top: 10px;
        border-collapse: collapse;
    }

    tr,
    th {
        /* padding-right:3px; */
        padding: 10px;
        width: auto;
    }

    th {
        /* background-color: #E5E4E2; */
        font-size: 11px;
        /* width: 98%; */
        margin: 10px;
        text-align: center;
        border-top: 1px solid #000000;
        border-bottom: 1px solid #000000;
    }

    h4,
    p {
        margin: 0px;
        font-size: 14px;
    }

    td {
        padding: 5px;
        font-size: 12px;
        /* vertical-align: text-top; */
        width: auto;
    }

    .table-footer {
        margin-top: 10% !important;
        text-align: center;
        font-size: 14px;
        object-position: center bottom !important;
    }

    .bg {
        background-color: #E5E4E2;
    }

    tfoot {
        margin-top: 5% !important;
        border-top: 1px solid #cacaca;
        border-bottom: 1px dashed #cacaca;
    }

    .page_break {
        page-break-before: always;
    }

    hr {
        color: green;
    }

    .table-content {
        padding: 15px !important;
    }

    page {
        background: white;
        display: block;
        margin: 0 auto;
        margin-bottom: 0.5cm;
        box-shadow: 0 0 0.1cm rgba(0, 0, 0, 0.2);
    }

    page[size="A4"] {
        width: 21cm;
        height: 29.7cm;
    }

</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumbs'); ?>
<a href="<?php echo e(route("admin.orders.index")); ?>" class="breadcrumbs__item"><?php echo e(trans('cruds.quotation.po')); ?> </a>
<a href="<?php echo e(route("admin.orders.index")); ?>" class="breadcrumbs__item">Purchase Order List </a>
<a href="" class="breadcrumbs__item active"><?php echo e(trans('cruds.purchaseOrder.report')); ?> </a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<ul class="nav navbar-nav align-items-end ms-auto">
    <li class="nav-item dropdown dropdown-user nav-item has">
        <button type="button" class="btn btn-primary btn-icon" id="dropdown-user" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="feather-16" data-feather="settings"> </i>
        </button>
        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
            <a class="dropdown-item" href="javascript:if(window.print)window.print()"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer font-small-4 me-50">
                        <polyline points="6 9 6 2 18 2 18 9"></polyline>
                        <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                        <rect x="6" y="14" width="12" height="8"></rect>
                    </svg>Print</span></a>
            <a class="dropdown-item" href="" data-toggle="modal"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard font-small-4 me-50">
                        <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                        <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                    </svg>Export To Pdf</span></a>
            <a class="dropdown-item" href="#demoModal" data-toggle="modal"> <i class="me-50 feather-16" data-feather="sliders"> </i> More Filter</a>
        </div>
    </li>
</ul>
<page size="A4">
    <body>
        <div class="container">
            <table>
                <tr style="height:90px">
                    <td style="width: 85%;">
                        <img style="width: 12%; float:left" src="<?php echo e(asset('app-assets/images/logo/favicon.png')); ?>" alt="buana-megah">
                        <p style="font-size:14px;"><b style="color: green;"> &nbsp;&nbsp;PT. Buana Megah</b><br>
                        <b> &nbsp;&nbsp;Head Office : </b>Jl. Argopuro 42, Surabaya 60251, East Java, Indonesia<br>&nbsp;
                        <b>Pasuruan Office : </b>Jalan Raya Cangkringmalang km. 40, Beji Pasuruan 67154 East Java, Indonesia<br>&nbsp;
                        <b>Tel. </b><a href="tel:+62343656288">656288</a>, <a href="tel:+62343656289">656289</a>  Fax. <a href="fax:+62343655054">655054</a><br></p></td>
                    </td>
                    <td><img style="float:right" src="data:image/png;base64,<?php echo e(DNS2D::getBarcodePNG('https://www.google.com/', "QRCODE", )); ?>"></td>
                </tr>
            </table>
            <hr>

            <?php $__currentLoopData = $header; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $raw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <div class="container ">
                <table>
                    <tr>
                        <td colspan="4">
                            <h3 style="text-align: center"><b>Purchase Order</b></h3>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: text-top; !important">
                            <h4>Supplier</h4>
                        </td>
                        <td style="vertical-align: text-top; !important">
                            <p>: (<?php echo e($raw->vendor_id ?? ''); ?>) - <?php echo e($raw->vendor->vendor_name ?? ''); ?>

                                <br> <?php echo e($raw->vendor->address1 ?? ''); ?>

                                <?php echo e($raw->vendor->city ?? ''); ?>, <?php echo e($raw->vendor->province ?? ''); ?>

                                <br><?php echo e($raw->vendor->phone ?? ''); ?>

                            </p>
                        </td>
                        <td style="width: 100px; vertical-align: text-top; !important">
                            <h4>Delivery To</h4>
                        </td>
                        <td style="vertical-align: text-top; !important">
                            <p>: (<?php echo e($raw->ship_to_location ?? ''); ?>) <?php echo e($raw->site->address1); ?>

                                <br> <?php echo e($raw->site->address2); ?> <?php echo e($raw->site->city ?? ''); ?>, <?php echo e($raw->site->province ?? ''); ?>

                                <br><?php echo e($raw->site->phone ?? ''); ?>

                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Term</h4>
                        </td>
                        <td>
                            <p>: <?php echo e($raw->term_id ?? ''); ?> </p>
                        </td>
                        <td>
                            <h4> Number</h4>
                        </td>
                        <td>
                            <p>: <?php echo e($raw->segment1 ?? ''); ?> </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4 style="text-align: top">Freight</h4>
                        </td>
                        <td>
                            <p>: <?php echo e($raw->freight ?? ''); ?> </p>
                        </td>
                        <td>
                            <h4> Date</h4>
                        </td>
                        <td>
                            <p>: <?php echo e($raw->created_at ?? ''); ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4 style="text-align: top">Carrier</h4>
                        </td>
                        <td>
                            <p>: <?php echo e($raw->carrier ?? ''); ?></p>
                        </td>
                        <td>
                            <h4>Curenncy</h4>
                        </td>
                        <td>
                            <p>: <?php echo e($raw->currency_code ?? ''); ?></p>
                        </td>
                    </tr>
                </table>
                <table>
                    <tbody>
                        <?php $subtotal=0; ?>
                        <tr>
                            <th>#</th>
                            <th>Item</th>
                            <th>Description</th>
                            <th>Unit Cost</th>
                            <th>Qty</th>
                            <th>Total</th>
                        </tr>

                        
                        <?php $line = 0; ?>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($row->po_header_id==$raw->id): ?>
                        <?php $line ++;?>
                        <tr>
                            <td align="center"><?php echo e($row->line_id ?? ''); ?></td>
                            <td><?php echo e($row->itemMaster->item_code ?? ''); ?></td>
                            <td><?php echo e($row->item_description ?? ''); ?></td>
                            <td align="right"> <?php echo e(number_format($row->unit_price, 2, ',', '.')); ?></td>
                            <td align="right"><?php echo e($row->po_quantity ?? ''); ?></td>
                            <td align="right"><?php echo e(number_format($row->unit_price * $row->po_quantity, 2, ',', '.')); ?></td>
                        </tr>
                        
                        <?php $subtotal+=($row->unit_price * $row->po_quantity);?>

                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    
                    <tfoot>
                        <tr>
                            <td colspan="3"></td>
                            <td align="left"><strong>Subtotal</strong></td>
                            <td align="right"><?php echo e($raw->currency_code); ?> </td>
                            <td align="right"><?php echo e(number_format($subtotal, 2, ',', '.')); ?></td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td align="left"><strong>Miscellaneous expense</strong></td>
                            <td align="right"><?php echo e($raw->currency_code); ?></td>
                            <td align="right"><?php echo e(number_format($raw->attribute2, 2, ',', '.')); ?></td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td align="left"><strong><?php echo e($raw->vendor->tax->tax_name); ?></strong></td>
                            <td align="right"><?php echo e($raw->currency_code); ?></td>
                            <td align="right"> <?php echo e(number_format(($subtotal*$raw->vendor->tax->tax_rate), 2, ',', '.')); ?></td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td align="left"><strong>Total</strong></td>
                            <td align="right"><?php echo e($raw->currency_code); ?> </td>
                            <td align="right"> <?php echo e(number_format($subtotal+($subtotal*$raw->vendor->tax->tax_rate)+($raw->attribute2), 2, ',', '.')); ?></td>
                        </tr>
                    </tfoot>
                </table>

                
                <table class="table-footer">
                    <tr>
                        <td>Prepared By,</td>
                        <td>Checked By,</td>
                        <td>Approved By,</td>
                        <td>Receive By,</td>
                    </tr>
                    <tr>
                        <td style="height: 50px"></td>
                    </tr>
                    <tr>
                        <td> __________________ </td>
                        <td> __________________ </td>
                        <td> __________________ </td>
                        <td> Supplier </td>
                    </tr>
                </table>
                <table style="margin-top:10%;">
                    <tr>
                        <td style="height: 50px;">Note : <br><?php echo e($raw->notes); ?></td>
                    </tr>
                </table>
            </div>

            
            <?php if($loop->last): ?>
            <div style="page-break-before: avoid"> </div>
            <?php else: ?>
            <div class="page_break"></div>
            <?php endif; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </body>
</page>
</html>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/purchase/view.blade.php ENDPATH**/ ?>