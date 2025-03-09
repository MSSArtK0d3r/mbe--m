<?php echo form_open(get_uri("tender/save_bq")); ?>
<div class="modal-body clearfix">
    
    <!-- Task Name Input -->
    <div class="col-md-6 mb-3">
        <label for="amount" class="form-label">BQ Amount</label>
        <input type="text" class="form-control" id="amount" name="amount" required value="<?= esc($bqData->amount ?? 0) ?>">
        <input type="hidden" class="form-control" id="tid" name="tid" required value="<?= esc($tid)?>">
    </div>

    <div class="col-md-6 mb-3">
        <label for="bc" class="form-label">Bank Checker %:</label>
        <input type="text" class="form-control" id="bc" name="bc" required placeholder="5 (equals 5%)" >
    </div>

    <div class="col-md-6 mb-3">
        <label for="bqstatus" class="form-label">BQ Status:</label>
        <select class="form-control" id="bqstatus" name="bqstatus" required>
            <option value="review">Under Review</option>
            <option value="approved">Approved</option>
           
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
<script>
document.getElementById("amount").addEventListener("input", function (e) {
    let value = e.target.value.replace(/[^0-9]/g, ""); // Remove non-numeric characters
    let formatted = Number(value).toLocaleString("en-US"); // Format with commas
    e.target.value = formatted;
});
</script>
<?php echo form_close(); ?>