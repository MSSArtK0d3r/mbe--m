<?php echo form_open(get_uri("tender/save_project")); ?>
<div class="modal-body clearfix">
    
    <!-- Task Name Input -->
    <div class="col-md-6 mb-3">
        <label for="title" class="form-label">Project Title</label>
        <input type="text" class="form-control" id="title" name="title" required value="<?= esc($tender_data->tname) ?>">
        <input type="hidden" class="form-control" id="tid" name="tid" value="<?= esc($tender_data->tid) ?>">
        <input type="hidden" class="form-control" id="client_id" name="client_id" value="<?= esc($tender_data->client_id) ?>">
    </div>

    <div class="col-md-6 mb-3">
        <label for="price" class="form-label">Project Value</label>
        <input type="text" class="form-control" id="price" name="price" required value="<?= esc($tender_price->amount) ?>">
        <input type="hidden" class="form-control" id="pb" name="pb" required value="<?= esc($tender_price->bcamount) ?>">
    </div>

    <!-- Submission Date -->
    <div class="col-md-3 mb-3">
        <label for="start_date" class="form-label">Start Date</label>
        <input type="date" class="form-control" id="start_date" name="start_date" required>
    </div>

    <div class="col-md-3 mb-3">
        <label for="deadline" class="form-label">Deadline</label>
        <input type="date" class="form-control" id="deadline" name="deadline">
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