<div class="overlay-wrapper">
        <div class="card m-0 <?= ($tender_data->isSiteVisit == 0) ? 'overlay-active position-relative' : '' ?>">
        
        <!-- Show overlay if status is Completed -->
        <?php if ($tender_data->isSiteVisit == 0) : ?>
            <div class="overlay"></div>
        <?php endif; ?>
        <div class="card card-header mb-0">
        <div class="d-flex justify-content-between"><span>Contract Value</span><?= ($tender_data->isBq == 0) ?  view("tenders/tender_inprogress") :  view("tenders/tender_complete"); ?></div>
        </div>

        <?php if ($bqData): ?>
            <ul class="list-group list-group-flush">
                <li class="list-group-item border-top text-black">
                    BQ Amount: <strong>RM <?= number_format($bqData->amount, 2) ?></strong>
                </li>
                <li class="list-group-item border-top text-black">
                    Banker Check: 
                    
                    <strong>RM <?= number_format($bqData->bcamount, 2) ?> (<?= $bqData->bc ?>%)</strong>
                </li>
                <li class="list-group-item border-top text-black">
                    Status: <strong><?= esc($bqData->bqstatus) ?></strong>
                </li>
                <?php
                if(!$tender_project){
                    echo modal_anchor(get_uri("tender/modal_bq_edit?tid=$tender_data->tid"),"<i data-feather='edit-3' class='icon-16'></i> Edit BQ",array("class" => "btnMbe btn btn-default py-3 btnMbe", "title" => "BQ Detail"));
                }
                ?>
                <?php if ($tender_data->isBq != 1) : ?>
                <form action="<?= base_url('tender/change_isBq_done') ?>" method="post">
                    <div class="d-flex justify-content-end align-items-center">
                       
                        <input type="hidden" class="form-control" id="tid" name="tid" required value="<?= esc($tender_data->tid) ?>">
                        <button type="submit" class="btn btn-primary m-3">Done</button>
                    </div>
                </form>
            <?php endif; ?>
            </ul>
        <?php else: ?>
            <div class="text-black p-3">No BQ data</div>
            <?php
                    echo modal_anchor(get_uri("tender/modal_bq_save?tid=$tender_data->tid"),"<i data-feather='plus-circle' class='icon-16'></i> Add BQ",array("class" => "btn btn-default py-3 btnMbe", "title" => "BQ Detail"));
            ?>
        <?php endif; ?>
        
    </div>
</div>
