<div class="modal fade" id="wipCompletion" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-white" id="exampleModalLongTitle">WIP Completion List</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mt-1">

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 col-12">
                            <div class="mb-2">
                                <label class="col-sm-0 control-label" for="number">Work Order Number</label>
                                <input type="text" name="work_order_number" class="form-control" readonly value="<?php echo e($wo->work_order_number); ?>" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="mb-2">
                                <label class="col-sm-0 control-label" for="number">Source</label>
                                <input type="text"  class="form-control" readonly value="<?php echo e($wo->source_line_ref); ?>" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="mb-2">
                                <label class="col-sm-0 control-label" for="number">Product</label>
                                <input type="text"  class="form-control" readonly value="<?php echo e($wo->bom->parent_item); ?> - <?php echo e($wo->bom->parent_description); ?>" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-1 col-12">
                            <div class="mb-2">
                                <label class="col-sm-0 control-label" for="number">GSM</label>
                                <input type="text"  class="form-control" readonly value="<?php echo e((int)$wo->attribute_float1 ?? 0); ?> GSM" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-1 col-12">
                            <div class="mb-2">
                                <label class="col-sm-0 control-label" for="number">Length</label>
                                <input type="text"  class="form-control" readonly value="<?php echo e((int)$wo->attribute_float10 ?? 0); ?> CM" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-1 col-12">
                            <div class="mb-2">
                                <label class="col-sm-0 control-label" for="number">Width</label>
                                <input type="text"  class="form-control" readonly value="<?php echo e((int)$wo->attribute_float2 ?? 0); ?> CM" autocomplete="off" required>
                            </div>
                        </div>
                    </div>



                    <div class="box-body scrollx" style="height: 300px;overflow: scroll;">
                    <table class="table table-striped tableFixHead" id="tab_logic">
                        <thead>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col" class="text-center">Completion Number</th>
                            <th scope="col" class="text-center">Big Roll Code</th>
                            <th scope="col" class="text-center">Qty (kg)</th>
                            <th scope="col" class="text-center" >Product Detail (GSM L x  W)</th>
                            </tr>
                        </thead>
                        <tbody class="completion_container">
                                <?php $jumbo = 0; $jumb_qty=0; ?>
                                <?php $__currentLoopData = $serial; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="tr_input">
                                        <td width="auto" align="center"><?php echo e($key+1); ?></td>
                                        <td width="30%">
                                            <input type="hidden" class="line_id" id="line_id_<?php echo e($key +1); ?>" name="line_id[]" value="<?php echo e($s->id); ?>">
                                            <input type="text" class="form-control search_sales" id="item_sales_<?php echo e($key+1); ?>"  value="<?php echo e($s->serial_number ?? $s->id); ?>" name="serial_number[]" autocomplete="off" required>
                                        </td>
                                        <td width="auto">
                                            <input type="text" id="harga_<?php echo e($key+1); ?>" class="form-control harga" name="job_definition_name[]" value="<?php echo e($s->job_definition_name ?? $s->uniq_attribute_roll); ?> "  required>
                                        </td>
                                        <td width="auto">
                                            <input type="number" class="form-control recount text-end" id="jumlah_<?php echo e($key+1); ?>" name="quantity_usage[]" value="<?php echo e($s->quantity_usage ?? $wo->planned_start_quantity); ?>" required>
                                        </td>
                                        <td width="25%">
                                            <div class="col-xs-2">
                                                <input class="form-control text-center" id="gsm_<?php echo e($key+1); ?>" name='attribute_char1[]' type="text" value="<?php echo e($s->attribute_char1 ?? $s->attribute_number_gsm); ?>"   style="width: 30%;">/
                                                <input class="form-control text-center" id="l_<?php echo e($key+1); ?>" name='attribute_char2[]' type="text" value="<?php echo e($s->attribute_char2 ?? $s->attribute_number_l); ?>"  style="width: 30%;">/
                                                <input class="form-control text-center" id="w_<?php echo e($key+1); ?>" name='attribute_char20[]' type="text" value="<?php echo e($s->attribute_char20 ?? $s->attribute_number_w); ?>"  style="width: 30%;">
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $jumbo = $key+1; $jumb_qty +=$s->quantity_usage  ??  $wo->planned_start_quantity; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        
                            <tr>
                                <th colspan="2" class="text-end">
                                    <b>Total Roll :</b>
                                </th>
                                <th  class="text-start">
                                    <b><?php echo e($jumbo); ?></b>
                                </th>
                                <th width="auto">
                                    <input type="number" class="form-control recount text-end"  value="<?php echo e($jumb_qty); ?>" required>
                                </th>
                                <th></th>
                            </tr>
                            <tr>
                                <th colspan="2" class="text-end">
                                    <b>Outstanding Roll :</b>
                                </th>
                                <th  class="text-start">
                                    <b><?php echo e($planning[0]->total_roll_by_line -$jumbo); ?></b>
                                </th>
                                <th width="auto">
                                    <input type="number" class="form-control recount text-end"  value="<?php echo e($wo->planned_start_quantity-$jumb_qty); ?>" required>
                                </th>
                                <th></th>
                            </tr>
                        
                    </table>
                    </div>


                </div>
                <div class="modal-footer">
                    
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('script'); ?>
<script>
    $(document).ready(function() {
        //completion
        $(document).on('click', '.add_completion', function () {
            var identifier = $('.line_id').last().attr('id');
            var split_id = identifier.split('_');
            var index = Number(split_id[2]);

            var date = $("#countDate_" + index).val();
            var completion_code = $("#count_" + index).val();
            var item = $("#item_1").val();
            var pm = $("#pm").val();

            index = index + 1;
            // date++;
            completion_code++;
            date++;
            //Bigroll Code
            var now = new Date();
            var year = now.getFullYear();
            var code = "J" + pm + " " + (year.toString().slice(-2)) + " " + (('0' + (now.getMonth() + 1)).slice(-2)) + " " + (('0' + (now.getDate())).slice(-2)) + " " + date;

            //completion_code
            var comp_code = item + "_" + completion_code;
            console.log(item);
            // completion_code ++;
            $('.completion_container').append(
                '<tr class="tr_input" id="rowTab1_' + index + '">\
                    <td width="30%">\
                        <input type="hidden" class="line_id" id="line_id_'+ index + '" name="line_id[]" value="">\
                        <input type="text" id="item_sales_'+ index + '" class="form-control search_sales" value="' + comp_code + '" name="serial_number[]" autocomplete="off" >\
                        <input type="hidden" id="id_'+ index + '" class="search_inventory_item_id" name="item_sales[]">\
                    </td>\
                    <td width="auto">\
                        <input type="text" id="harga_'+ index + '" required class="form-control harga" name="job_definition_name[]" value = "' + code + '">\
                        <input type="hidden" id="count_'+ index + '" class="form-control harga text-end" name="unit_selling_price[]" value="' + completion_code + '"  required>\
                        <input type="hidden" id="countDate_'+ index + '" class="form-control harga text-end" name="unit_selling_price[]" value="' + date + '"  required>\
                    </td>\
                    <td width="auto">\
                        <input type="number" id="jumlah_'+ index + '" class="form-control recount text-end" name="quantity_usage[]" required>\
                        </td>\
                    <td width="25%">\
                        <div class="col-xs-2">\
                            <input class="form-control text-center" id="gsm_'+ index + '" name="attribute_char1[]" type="text" placeholder="GSM" style="width: 30%;">/\
                            <input class="form-control text-center" id="l_'+ index + '" name="attribute_char2[]" type="text" placeholder="L"  style="width: 30%;">/\
                            <input class="form-control text-center" id="w_'+ index + '" name="attribute_char20[]" type="text" placeholder="W"  style="width: 30%;">\
                        </div>\
                    </td>\
                    <td width="auto">\
                        <button type="button" class="btn btn-danger remove_tr_sales">&times;</button>\
                    </td>\
                </tr>');


        });

    });

</script>
<?php $__env->stopPush(); ?>
<?php /**PATH /var/www/html/resources/views/admin/workOrder/wipCompletion.blade.php ENDPATH**/ ?>