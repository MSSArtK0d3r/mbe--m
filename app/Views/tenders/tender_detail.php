
    <div class="card m-0 ">
        
        <!-- Show overlay if status is Completed -->


        <div class="card-header mb-0">
            <div class="d-flex justify-content-between"><span>Tender Detail(s)</span><?= ($tender_data->tstatus == 0) ?  view("tenders/tender_inprogress") :  view("tenders/tender_complete"); ?></div>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item border-top text-black">
               Tender Name: <strong><?= esc($tender_data->tname) ?></strong>
            </li>
            <li class="list-group-item border-top text-black">
                Submission Date: <strong><?= date('d M Y', strtotime($tender_data->sub_date)) ?></strong>
            </li>
            <li class="list-group-item border-top text-black">
                Client: <strong><?= esc($client_data->company_name) ?></strong>
            </li>
            <li class="list-group-item border-top text-black">
                Tender Cost: <strong>RM <?= number_format($tender_data->tcost,2) ?></strong>
            </li>
            <?php
                if (!$tender_project) {
                echo modal_anchor(get_uri("tender/modal_edit_tender?tid=$tender_data->tid"), 
                "<i data-feather='edit-3' class='icon-16'></i> Edit", 
                array("class" => "btn btn-default py-3 btnMbe", "title" => "Edit Tender Detail"));
                }
                if($tender_data->isBq == 1 && !$tender_project){  
                    echo modal_anchor(get_uri("tender/generate_project?tid=$tender_data->tid"), 
                    "<i data-feather='edit-3' class='icon-16'></i> Generate This Project", 
                    array("class" => "btn btn-default py-3 btnMbeGreen", "title" => "Create New Project"));
                }
            ?>
            
            <?php if ($tender_data->tstatus != 1) : ?>
                <form action="<?= base_url('tender/change_tstatus_done') ?>" method="post">
                    <div class="d-flex justify-content-end align-items-center">
                       
                        <input type="hidden" class="form-control" id="tid" name="tid" required value="<?= esc($tender_data->tid) ?>">
                        <button type="submit" class="btn btn-primary m-3">Done</button>
                    </div>
                </form>
            <?php endif; ?>
            <?php if ($tender_project) { ?>
                <a class="btn btn-default py-3 btnMbeGreen" href=<?= base_url('projects/view/' . $tender_project->id) ?>">
                View Project
                </a>
            <?php } ?>

        </ul>
    </div>
