<?php echo form_open(get_uri("tender/edit")); ?>
<div class="modal-body clearfix">
    
    <!-- Task Name Input -->
    <div class="col-md-6 mb-3">
        <label for="tname" class="form-label">Tender Title</label>
        <input type="text" class="form-control" id="tname" name="tname" required value="<?= esc($tender_data->tname) ?>">
        <input type="hidden" class="form-control" id="tid" name="tid" required value="<?= esc($tender_data->tid) ?>">
    </div>

    <div class="col-md-6 mb-3">
        <label for="tcost" class="form-label">Tender Document Cost</label>
        <input type="text" class="form-control" id="tcost" name="tcost" required value="<?= esc($tender_data->tcost) ?>">
    </div>

    <!-- Client Dropdown -->
    <div class="col-md-6 mb-3">
    <label for="client" class="form-label"><?php echo app_lang('client'); ?></label>
    <select class="form-control" id="client" name="client" required>
        <?php foreach ($clients as $client) { ?>
            <option value="<?php echo $client->id; ?>" 
                <?php echo ($client->id == $selected_client_id) ? 'selected' : ''; ?>>
                <?php echo $client->company_name; ?>
            </option>
        <?php } ?>
    </select>
</div>


    <!-- Submission Date -->
    <div class="col-md-3 mb-3">
        <label for="sub_date" class="form-label">Submission Date</label>
        <input type="date" class="form-control" id="sub_date" name="sub_date" required  value="<?= esc($tender_data->sub_date) ?>">
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