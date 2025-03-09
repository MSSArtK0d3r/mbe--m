<?php echo form_open(get_uri("tender/save_expenses")); ?>
<div class="modal-body clearfix">
    
    <!-- Task Name Input -->
    <div class="col-md-6 mb-3">

        <label for="expenses_detail" class="form-label">Expenses Detail</label>
        <input type="text" class="form-control" id="expenses_detail" name="expenses_detail" required>
        <input type="hidden" class="form-control" id="tid" name="tid" required value="<?= esc($tid)?>">
    </div>

    <div class="col-md-6 mb-3">
        <label for="cat" class="form-label">Expenses for:</label>
        <select class="form-control" id="cat" name="cat" required>
            <option value="claim">Transportation</option>
            <option value="other">Accommodation</option>
            <option value="Meals & Entertainment">Meals & Entertainment</option>
            <option value="insurance">Insurance</option>
            <option value="pb">Performance Bond</option>
            <option value="other">Others</option>
        </select>

    </div>

    <div class="col-md-6 mb-3">
        <label for="tcoamountst" class="form-label">Expenses amount:</label>
        <input type="text" class="form-control" id="amount" name="amount" required>
    </div>


    <!-- Submission Date -->
    <div class="col-md-3 mb-3">
        <label for="expenses_date" class="form-label">Expenses Date</label>
        <input type="date" class="form-control" id="expenses_date" name="expenses_date" required>
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