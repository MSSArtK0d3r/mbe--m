<?php echo form_open(get_uri("tender/edit_bq")); ?>
<div class="modal-body clearfix">
    
    <!-- Task Name Input -->
    <div class="col-md-6 mb-3">

        <label for="amount" class="form-label">Contract Value</label>
        <input type="text" class="form-control" id="amount" name="amount" required 
    value="<?= number_format(($bqData->amount ?? 0), 2, '.', ',') ?>">
        <input type="hidden" class="form-control" id="tid" name="tid" required value="<?= esc($tid)?>">
    </div>

    <div class="col-md-6 mb-3">
        <label for="bc" class="form-label">Bank Checker %:</label>
        <input type="text" class="form-control" id="bc" name="bc" required value="<?= esc($bqData->bc ?? 0) ?>" >
    </div>

    <?php 
    $currentStatus = isset($bqData->bqstatus) ? $bqData->bqstatus : ''; 
    ?>
        <div class="col-md-6 mb-3">
            <label for="bqstatus" class="form-label">BQ Status:</label>
            <select class="form-control" id="bqstatus" name="bqstatus" required>
                <option value="review" <?= ($currentStatus == "review") ? "selected" : ""; ?>>Under Review</option> 
                <option value="approved" <?= ($currentStatus == "approved") ? "selected" : ""; ?>>Approved</option>
            </select>
        </div>
        
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-bs-dismiss="modal">
        <span data-feather="x" class="icon-16"></span> <?php echo app_lang('close'); ?>
    </button>
    
    <button type="submit" class="btn btn-primary">
        <span data-feather="check-circle" class="icon-16"></span> <?php echo app_lang('save'); ?>
    </button>
</div>

<?php echo form_close(); ?>