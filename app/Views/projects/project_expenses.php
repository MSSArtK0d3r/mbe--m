<div class="card bg-white">
        <div class="card-header">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text icon-16"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg> &nbsp;Expenses Overview
                    </div>
        <div class="card-body rounded-bottom" id="invoice-overview-container" style="position: relative; overflow-y: scroll;">

                <!-- <div class="d-flex p-2 justify-content-between">
                    <div class="w40p text-truncate">
                        <div style="background-color: #F5325C;" class="color-tag border-circle wh10"></div>Overdue</div>
                    <div class="w40p text-end">RM 345,000.56</div>
                </div> -->
                <?php if (!empty($project_expenses_list)): ?>
                    <?php foreach ($project_expenses_list as $row): ?>
                        <div class="d-flex p-2 justify-content-between">
                            <div class="w40p text-black">
                                <div style="background-color: #F5325C;" class="color-tag border-circle wh10"></div>
                                <?= htmlspecialchars($row->cat) ?>
                            </div>
                            <div class="w40p text-end">RM <?= number_format($row->total, 2) ?></div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No expenses found for this project.</p>
                <?php endif; ?>
            
            <div class="widget-footer">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col widget-expenses mt-4 mb-2">
                            <div>Total Expenses</div>
                            <div class="fw-bold">RM <?php echo number_format($project_expenses_total->amount,2); ?></div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <?php
                echo modal_anchor(get_uri("expenses/modal_form?project_id=$project_info->id"), 
                "<i data-feather='edit-3' class='icon-16'></i> Add Expenses", 
                array("class" => "btn btn-default py-3 btnMbe", "title" => "Add New Expenses"));
        ?>
    </div>