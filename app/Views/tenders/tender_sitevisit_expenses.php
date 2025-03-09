<div class="overlay-wrapper mt-3">
    <div class="card m-0 <?= ($tender_data->tstatus == 0) ? 'overlay-active position-relative' : '' ?>">
        
        <!-- Show overlay if status is Completed -->
        <?php if ($tender_data->tstatus == 0) : ?>
            <div class="overlay"></div>
        <?php endif; ?>
        <div class="card card-header mb-0">
            <span>Expenses List</span>
        </div>

        <div class="card-body rounded-bottom" id="invoice-overview-container"
            style="position: relative; overflow-y: scroll;">

            <?php if (!empty($tender_expenses)): ?>
                <?php foreach ($tender_expenses as $expense): ?>
                    <div class="d-flex p-2 justify-content-between">
                        <div class="w40p text-black text-truncate">
                            <span><?= esc($expense->expenses_detail) ?></span><br>
                            <span style="font-size:12px;"><?= esc($expense->cat) ?></span>
                        </div>
                        <div class="w40p text-black text-end">RM <?= number_format($expense->amount, 2) ?> <a href=<?= base_url('tender/expense_delete?id='.esc($expense->texp_id)) ?> <i data-feather='x' class='icon-16'></i></a></div>
                    </div>
                <?php endforeach; ?>

                <!-- Calculate Total Amount -->

            <?php else: ?>
                <div class="text-center text-black p-2">No expenses</div>
            <?php endif; ?>

        </div>
    </div>
</div>