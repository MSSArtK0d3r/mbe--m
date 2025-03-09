<?php echo form_open(get_uri("tender/save")); ?>
<div class="modal-body clearfix">
    
    <!-- Task Name Input -->
    <div class="col-md-6 mb-3">
        <label for="tname" class="form-label">Tender Name</label>
        <input type="text" class="form-control" id="tname" name="tname" required>
    </div>

    <div class="col-md-6 mb-3">
        <label for="tcost" class="form-label">Tender Document Cost</label>
        <input type="text" class="form-control" id="tcost" name="tcost" required>
    </div>

    <!-- Client Dropdown -->
    <div class="col-md-6 mb-3">
        <label for="client" class="form-label"><?php echo app_lang('client'); ?></label>
        <select class="form-control" id="client" name="client" required>
            <option value=""><?php echo '-- Select Client --' ?></option>
            <?php foreach ($clients as $client) { ?>
                <option value="<?php echo $client->id; ?>"><?php echo $client->company_name; ?></option>
            <?php } ?>
        </select>
    </div>

    <!-- Submission Date -->
    <div class="col-md-3 mb-3">
        <label for="sub_date" class="form-label">Submission Date</label>
        <input type="date" class="form-control" id="sub_date" name="sub_date" required>
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