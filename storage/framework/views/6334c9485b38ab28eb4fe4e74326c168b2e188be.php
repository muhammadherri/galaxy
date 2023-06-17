
<div class="modal fade" id="cancel" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-white" id="exampleModalLongTitle">Close Production</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mt-1">
                <div class="card-body">
                        <div class="col-12 mb-2">
                            <div class="row">
                                <div class="col-4">
                                    <label class="col-sm-0 control-label" for="number">Change Status :</label>
                                </div>
                                <div class="col-8 ">
                                    <select name="wostatus" id="customer" class="select2"  required>
                                        <option hidden selected></option>
                                        <option value="1">Cancel</option>
                                        <option value="0">Close</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4">
                                    <label class="col-sm-0 control-label" for="number">Reason Change :</label>
                                </div>
                                <div class="col-8 ">
                                    <textarea type="text" class="form-control" aria-valuetext="<?php echo e($wo->status_change_reason ?? ''); ?><?php echo e($wo->canceled_reason??''); ?>" name="status_change_reason"></textarea>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning "  name='action' value="cancel" data-dismiss="modal"><i data-feather='alert-circle'></i><?php echo e(trans('global.add')); ?></button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /var/www/html/resources/views/admin/workOrder/cancel.blade.php ENDPATH**/ ?>