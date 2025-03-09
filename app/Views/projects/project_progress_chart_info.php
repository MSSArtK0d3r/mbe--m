<div class="card">
    <div class="card card-header mb-0" style="background-color:#1a0080;">
        Project Overview
    </div>
    <div class="clearfix text-left mb-1">
    <ul class="list-group list-group-flush">
        <li class="list-group-item border-top text-black">
            <p class='fs-6 fw-bold mb-0 uppercase'><?php echo $project_info->title; ?></p>
        </li>
    <li class="list-group-item border-top text-black">
            <?php echo app_lang("start_date"); ?>: <?php echo is_date_exists($project_info->start_date) ? format_to_date($project_info->start_date, false) : "-"; ?>
        </li>
        <li class="list-group-item border-top text-black">
            <?php echo app_lang("deadline"); ?>: <?php echo is_date_exists($project_info->deadline) ? format_to_date($project_info->deadline, false) : "-"; ?>
        </li>
        <li class="list-group-item border-top text-black">
            <?php echo app_lang("status"); ?> : 
            <span class="<?php echo ($project_info->status == 'completed') ? 'pstatus' : ''; ?>">
                <?php echo $project_info->status; ?>
            </span>
        </li>
        <?php if ($login_user->user_type === "staff" && $project_info->project_type === "client_project") { ?>
            <li class="list-group-item border-top text-black">
                <?php echo app_lang("client"); ?>: <span class="text-white fw-bold"><?php echo anchor(get_uri("clients/view/" . $project_info->client_id), $project_info->company_name? $project_info->company_name: ""); ?></span>
            </li>
        <?php } else { ?>
            <li class="list-group-item border-top text-black">
                <?php echo app_lang("status"); ?>: <?php echo $project_info->title_language_key ? app_lang($project_info->title_language_key) : $project_info->status_title; ?>
            </li>
        <?php } ?>
        </ul>
        <div class="container project-overview-widget project-overview-mod">
            <div class="progress-outline">
                <div class="progress mt5 m-auto position-relative">
                    <div class="progress-bar bg-orange text-black" role="progressbar" style="width:<?php echo $project_progress; ?>%;" aria-valuenow="<?php echo $project_progress; ?>" aria-valuemin="0" aria-valuemax="100">
                        <span class="justify-content-center d-flex position-absolute w-100">Work Progress <?php echo $project_progress; ?>%</span>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

