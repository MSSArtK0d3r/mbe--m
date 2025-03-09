<?php echo form_open(get_uri("projects/save_vo"), array("id" => "project-form", "class" => "general-form", "role" => "form")); ?>
<div id="projects-dropzone" class="post-dropzone">
<div class="modal-body clearfix">
    <div class="container-fluid">
        <div class="col-md-6 mb-3">

        <label for="title" class="form-label">VO Detail</label>
        <input type="text" class="form-control" id="title" name="title" required>
        <input type="hidden" class="form-control" id="pid" name="pid" required value="<?= $pid ?>">
        </div>


        <div class="col-md-6 mb-3">
        <label for="tcoamountst" class="form-label">VO amount:</label>
        <input type="text" class="form-control" id="amount" name="amount" required>
        </div>


        <!-- Submission Date -->
        <div class="col-md-3 mb-3">
        <label for="vo_date" class="form-label">VO Date</label>
        <input type="date" class="form-control" id="vo_date" name="vo_date" required>
        </div>
        
    </div>
</div>

<div class="modal-footer">

    <button type="button" class="btn btn-default" data-bs-dismiss="modal"><span data-feather="x" class="icon-16"></span> <?php echo app_lang('close'); ?></button>

    <button type="submit" class="btn btn-primary"><span data-feather="check-circle" class="icon-16"></span> <?php echo app_lang('save'); ?></button>
</div>
</div>
<?php echo form_close(); ?>
