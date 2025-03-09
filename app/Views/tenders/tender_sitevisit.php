<div class="overlay-wrapper">
    <div class="card m-0 <?= ($tender_data->tstatus == 0) ? 'overlay-active position-relative' : '' ?>">
        
        <!-- Show overlay if status is Completed -->
        <?php if ($tender_data->tstatus == 0) : ?>
            <div class="overlay"></div>
        <?php endif; ?>
        <div class="card card-header mb-0">
        <div class="d-flex justify-content-between"><span>Expenses Summary</span><?= ($tender_data->isSiteVisit == 0) ?  view("tenders/tender_inprogress") :  view("tenders/tender_complete"); ?></div>
        </div>

        <div class="card-body rounded-bottom" id="invoice-overview-container"
            style="position: relative; overflow-y: scroll;">

            <?php if (!empty($tender_expenses_summary)): ?>
                <?php foreach ($tender_expenses_summary as $expense): ?>
                    <div class="d-flex p-2 justify-content-between">
                        <div class="w40p text-black text-truncate">
                            <div style="background-color: #F5325C;" class="color-tag border-circle wh10"></div>
                            <?= esc($expense->cat) ?>
                        </div>
                        <div class="w40p text-black text-end">RM <?= number_format($expense->total_amount, 2) ?></div>
                    </div>
                <?php endforeach; ?>

                <!-- Calculate Total Amount -->
                <?php $totalSum = array_sum(array_column($tender_expenses_summary, 'total_amount')); ?>

                <div class="widget-footer">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col widget-expenses mt-4 mb-2">
                                <div>Total</div>
                                <div class="fw-bold text-black">RM <?= number_format($totalSum, 2) ?></div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php else: ?>
                <div class="text-center text-black p-2">No expenses</div>
            <?php endif; ?>
            <div class="button-action d-flex align-items-center justify-content-between">
            <?php
                if(!$tender_project){
                echo modal_anchor(get_uri("tender/modal_add_expenses?tid=$tender_data->tid"), 
                "<i data-feather='plus-circle' class='icon-16'></i> Add Expenses", 
                array("class" => "btn btn-default", "title" => "Add Expenses Detail"));
                }
            ?>
            <?php if ($tender_data->isSiteVisit != 1) : ?>
                <form action="<?= base_url('tender/change_isSiteVisit_done') ?>" method="post">
                    <div class="d-flex justify-content-end align-items-center">
                       
                        <input type="hidden" class="form-control" id="tid" name="tid" required value="<?= esc($tender_data->tid) ?>">
                        <button type="submit" class="btn btn-primary m-3">Done</button>
                    </div>
                </form>
            <?php endif; ?>
            </div>

        </div>
    </div>
</div>