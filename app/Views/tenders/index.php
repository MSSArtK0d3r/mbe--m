<div id="page-content" class="page-wrapper clearfix">
    <div class="card grid-button">
        <div class="page-title clearfix projects-page">
            <h1>Tenders</h1>
            <div class="title-button-group">
                <?php
                    echo modal_anchor(get_uri("tender/modal_create"), "<i data-feather='plus-circle' class='icon-16'></i> " . 'Add Tender', array("class" => "btn btn-default", "title" => 'Add New Tender'));
                ?>
            </div>
        </div>

        <div class="table-responsive">
            <table id="task-table" class="display xs-hide-dtr-control no-title dataTable no-footer text-black" cellspacing="0" width="100%" role="grid" aria-describedby="task-table_info">  
                <thead>
                    <tr>
                        <th>Tender Name</th>
                        <th>Client</th>
                        <th>Submission Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($tender_list)) : ?>
                        <?php foreach ($tender_list as $tender) : ?>
                           
                            <tr>
                                <td class="text-black"><a href="./tender/tender_detail?tid=<?= esc($tender->tid) ?>"><?= esc($tender->tname) ?></a></td>
                                <td class="text-black"><?= esc($tender->company_name) ?></td>
                                <td class="text-black"><?= esc($tender->sub_date) ?></td>
                                <td class="text-black">
                                <?= esc(
                                    $tender->tstatus == 1 ? "Document Paid" :
                                    ($tender->tstatus == 2 ? "Site Visit" :
                                    ($tender->tstatus == 3 ? "BQ / Interview" : "Unknown Status"))
                                ) ?>
                            </td>

                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="4" class="text-center text-muted">No tenders available.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
