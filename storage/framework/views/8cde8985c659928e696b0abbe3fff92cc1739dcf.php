<?php $__env->startSection('content'); ?>


<?php $__env->startSection('content'); ?>
<div class="card" >
        <div class="card-header  mt-1 mb-1">
            <h6 class="card-title">
                <a href="<?php echo e(route('admin.shipment.index')); ?>" class="breadcrumbs__item"><?php echo e(trans('cruds.OrderManagement.title')); ?> </a>
                <a href="<?php echo e(route('admin.shipment.index')); ?>" class="breadcrumbs__item"><?php echo e(trans('cruds.shiping.title_singular')); ?> </a>
                <a href="<?php echo e(route('admin.shipment.create')); ?>" class="breadcrumbs__item">Create</a></h6>
        </div>
    <hr>
    <br>
    <div class="card-body">
        <form id = "formship" action="<?php echo e(route("admin.shipment.update",$DeliveryHeader->delivery_id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="form-group">
                <div class="form-group row">
                    <div class="col-md-5">
                        <div class="mb-2">
                            <label class="form-label" for="segment1"><?php echo e(trans('cruds.shiping.fields.customer_name')); ?></label>
                            <select type="text" id="customer" name="customer" class="form-control select2" value="<?php echo e($DeliveryHeader->sold_to_party_id); ?>" required>
                                <option value="<?php echo e($DeliveryHeader->cust_party_code); ?>" ><?php echo e($DeliveryHeader->cust_party_code); ?> -<?php echo e($DeliveryHeader->party_name); ?> </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="mb-2">
                            <label class="form-label" for="segment1"><?php echo e(trans('cruds.shiping.fields.customer_shipto')); ?></label>
                            <select type="text" id="customer_shipto" name="customer_shipto" class="form-control select2" value=""  >
                                <option selected value="<?php echo e($DeliveryHeader->ship_to_party_id); ?>"><?php echo e($DeliveryHeader->party_site->site_code); ?>/ <?php echo e($DeliveryHeader->party_site->address1); ?></option>
                                <?php $__currentLoopData = $customershiipto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($DeliveryHeader->ship_to_party_id != $row->site_code): ?>
                                <option value="<?php echo e($row->site_code); ?>" <?php echo e(old('customer_shipto') == $row->site_code ? 'selected' : ''); ?>><?php echo e($row->site_code); ?> / <?php echo e($row->address1); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mb-2">
                            <label class="form-label"
                                for="segment1">Attribute</label>
                            <input type="text" class="form-control" name="text" value="<?php echo e($DeliveryHeader->attribute1); ?>" disabled>
                        </div>
                    </div>

                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <div class="mb-2">
                            <label class="form-label" for="segment1"><?php echo e(trans('cruds.shiping.fields.surat_jalan')); ?></label>
                            <input autocomplete="off" required id="invoice_no" name="invoice_no" class="form-control" value="<?php echo e($DeliveryHeader->delivery_name); ?>">
                        </div>
                    </div>
                    
                            <input type="hidden" readonly="readonly" id="delivery_name" name="delivery_name" class="form-control" value="<?php echo e($DeliveryHeader->delivery_name); ?>">
                            <input type="hidden" id="id" name="id" value="<?php echo e($DeliveryHeader->id); ?>">
                            <input type="hidden" id="delivery_id" name="delivery_id" value="<?php echo e($DeliveryHeader->delivery_id); ?>">
                        
                    <div class="col-md-2">
                        <div class="mb-2">
                            <label class="form-label" for="segment1"><?php echo e(trans('cruds.shiping.fields.note')); ?></label>
                            <input autocomplete="off" required type="text" id="note" name="note" class="form-control" value="" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mb-2">
                            <label class="form-label " for="segment1"><?php echo e(trans('cruds.shiping.fields.invoice_date')); ?></label>
                            <input required autocomplete="off" type="text" id="fp-default" name="invoice_date" class="form-control flatpickr-basic flatpickr-input text-end">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-2">
                            <label class="form-label"for="segment1">
                               Attribute
                            </label>
                            <input type="text" class="form-control" disabled>
                    </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mb-2">
                            <label class="form-label" for="segment1"><?php echo e(trans('cruds.shiping.fields.status')); ?></label>
                            <select type="text" id="status" name="status" class="form-control select2" value="<?php echo e($DeliveryHeader->status_code); ?>">
                                <option value="<?php echo e($DeliveryHeader->status_code); ?>}"><?php echo e($DeliveryHeader->trx_name); ?></option>
                            </select>
                        </div>
                    </div>
                    
                </div>
            </div>
            <br>
            <div class="row mb-4">
                <div class="box box-default overflow-auto">
                    <div class="box-body" style="height: 350px;">
                        <table class="table table-bordered table-striped table-hover datatable">
                            <thead >
                                <tr>
                                    <th>
                                    </th>
                                    <th style="width: 0%">NO</th>
                                    <th class="text-center" style="width: 10%"><?php echo e(trans('cruds.shiping.table.sn')); ?></th>
                                    <th style="width: 0%"><?php echo e(trans('cruds.shiping.modaltable.line')); ?></th>
                                    <th><?php echo e(trans('cruds.shiping.table.custpo')); ?></th>
                                    <th style="width: 10%">
                                        <?php echo e(trans('cruds.shiping.table.item_no')); ?>

                                        <input type="hidden"name="dvdtckcbx"id="dvdtckcbx"class="detilchbx">
                                    </th>

                                    <th><?php echo e(trans('cruds.shiping.table.item_desc')); ?></th>
                                    <th class="text-end" style="width: 0%"><?php echo e(trans('cruds.shiping.modaltable.qty')); ?></th>
                                    <th class="text-center" style="width: 0%"><?php echo e(trans('cruds.shiping.table.uom')); ?></th>
                                    <th style="width: 0%"><?php echo e(trans('cruds.shiping.table.subinventory')); ?></th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $DeliveryDetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deliveryDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(($deliveryDetail->delivery_detail_id)==($DeliveryHeader->delivery_id)): ?>
                                        <tr>
                                            <td style="width: 0%"></td>
                                            <td class="text-center" style="font-size:11px" >
                                                <?php echo e($no++); ?>

                                            </td>
                                            <td class="text-center" style='font-size:11px'>
                                                <?php echo e($deliveryDetail->source_header_number ?? ''); ?>

                                            </td>
                                            <td class="text-end" style='font-size:11px'>
                                                <?php echo e((float)$deliveryDetail->source_line_id ?? ''); ?>

                                            </td>
                                            <td style='font-size:11px'>
                                                <?php echo e($deliveryDetail->cust_po_number ?? ''); ?>

                                            </td>
                                            <td style='font-size:11px'>
                                                <?php echo e($deliveryDetail->item_code); ?>

                                                <input type="hidden" value="<?php echo e($deliveryDetail->id); ?>" name="id[]" class="detilchbx" data-id="<?php echo e($deliveryDetail->header_id); ?>">
                                                <input type="hidden" value="<?php echo e($deliveryDetail->delivery_detail_id); ?>" name="delivery_detail_id[]" class="detilchbx" data-id="<?php echo e($deliveryDetail->delivery_detail_id); ?>">
                                                <input type="hidden" value="<?php echo e($deliveryDetail->source_header_id); ?>" name="source_header_id[]" class="detilchbx" data-id="<?php echo e($deliveryDetail->source_header_id); ?>">
                                                <input type="hidden" value="<?php echo e($deliveryDetail->source_line_id); ?>" name="source_line_id[]" class="detilchbx" data-id="<?php echo e($deliveryDetail->source_line_id); ?>">
                                                <input type="hidden" value="<?php echo e($deliveryDetail->sold_to_contact_id); ?>" name="sold_to_contact_id[]" class="detilchbx" data-id="<?php echo e($deliveryDetail->sold_to_contact_id); ?>">
                                                <input type="hidden" value="<?php echo e($deliveryDetail->delivery_name); ?>" name="delivery_name[]" class="detilchbx" data-id="<?php echo e($deliveryDetail->delivery_name); ?>">
                                            </td>

                                            <td style='font-size:11px'>
                                                <?php echo e($deliveryDetail->item_description ?? ''); ?>

                                            </td>
                                            <td class="text-end" style='font-size:11px'>
                                                <?php echo e($deliveryDetail->requested_quantity ?? ''); ?>

                                            </td>
                                            <td class="text-center" style='font-size:11px'>
                                                <?php echo e($deliveryDetail->requested_quantity_uom ?? ''); ?>

                                            </td>
                                            <td class="text-center" style='font-size:11px'>
                                                <?php echo e($deliveryDetail->subinventory?? ''); ?>

                                            </td>
                                            <td class="text-center" style="width: 0%">
                                                <a class="btn btn-sm btn-delete btn-danger" data-bs-toggle="modal" data-bs-target="#modaldelete"
                                                    value="<?php echo e($deliveryDetail->id); ?>" data-id="<?php echo e($deliveryDetail->id); ?>"data-header_id="<?php echo e($deliveryDetail->source_header_id); ?>"data-line_id="<?php echo e($deliveryDetail->source_line_id); ?>">
                                                    x
                                                </a>
                                                
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                <br>
                <div class="d-flex justify-content-between">
                    <?php if($DeliveryHeader->lvl==6): ?>
                        <button class="btn btn-warning resetbtn" type="button"><i data-feather='refresh-ccw'></i> Reset</button>
                        <button class="btn btn-primary btn-submit"name='action' value="create" id="add_all" type="submit"><i data-feather='save'></i> <?php echo e(trans('global.save')); ?></button>
                    <?php endif; ?>
                </div>
            </div>
        </form>
        <div class="modal fade" id="modaldelete" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form id = "formship" action="<?php echo e(route("admin.shipment.update",$DeliveryHeader->delivery_id)); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="container">
                                <p class="text-center"><?php echo e(trans('cruds.shiping.modaltable.areyousure')); ?></p>
                                <hr>
                                <div class="col text-center">
                                    <button type="submit" name="action" value="delete" class="btn btn-primary pull-center"><i class="fa fa-plus"></i> <?php echo e(trans('cruds.shiping.modaltable.yes')); ?> </button>
                                    <input type="hidden" id="id" name="id" class="form-control">
                                    <input type="hidden" id="header_id" name="header_id" class="form-control">
                                    <input type="hidden" id="line_id" name="line_id" class="form-control">

                                    <button type="button"class="btn btn-danger pull-center" data-bs-dismiss="modal"><i class="fa fa-plus"></i> <?php echo e(trans('cruds.shiping.modaltable.no')); ?> </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
<script>
        ///////////// DELETE BUTTON//////////////
    function deleteItem(id) {
        console.log(id);
        var check = confirm("Are you sure you want to Delete this row?");
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
        if(check == true){
            console.log(check);
            $.ajax({
                url:"./../shipment/destroy"+id,
                type:"DELETE",
                data:{id:id,},
                success: function(result) {
                    location.reload();
                    alert('Success');
                },
                error:function(result){
                    alert('Success');
                    location.reload();

                }
            });
        }
	}
        ///////////// DELETE BUTTON//////////////

    $(document).ready( function () {
        var xid = $('#masterckcbx').val();
        var xhead = $('#inputhead').val();
        var xlineid = $('#lineid').val();
        var xorderfrom = $('#orderfrom').val();
        var xorderto = $('#orderto').val();
        var xitemfrom = $('#itemfrom').val();
        var xitemto = $('#itemto').val();
        // checked//
            // // checked//
            // // submit//
        $('.add_all').on('click', function(e) {
            var allVals = [];
            $(".sub_chk:checked").each(function() {
                allVals.push($(this).attr('data-id'));
            });
            console.log(allVals);
            if(allVals.length <=0)
            {
                alert("Please select row.");

            }  else {
                var check = alert("Add Row Success");
                if(check == true){
                    var join_selected_values = allVals.join(",");
                    $.ajax({
                        url: $(this).data('url'),
                        type: 'POST',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'ids='+join_selected_values,
                        success: function (data) {
                            // alert(data['success']);
                        },
                        error: function (data) {
                            // alert(data.responseText);
                        }
                    });
                }
            }
        });

        $(document).on('confirm', function (e) {
            var ele = e.target;
            e.preventDefault();
            $.ajax({
                url: ele.href,
                type: 'POST',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                    if (data['success']) {
                        $("#" + data['tr']).slideUp("slow");
                        alert(data['success']);
                    } else if (data['error']) {
                        alert(data['error']);
                    } else {
                        alert('Whoops Something went wrong!!');
                    }
                },
                error: function (data) {
                    alert(data.responseText);
                }
            });
            return false;
        });
            // // submit//

        ///////////// RESET BUTTON//////////////
        $(".resetbtn").click(function(){
            $("#formship").trigger("reset");
        });
        ///////////// RESET BUTTON//////////////
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/shipments/create.blade.php ENDPATH**/ ?>