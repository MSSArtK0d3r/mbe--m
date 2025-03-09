<div class="card">
    <div class="card card-header mb-0" style="background-color: #3262d0;">
        Claim Overview
        
    </div>
 <ul class="list-group list-group-flush">
        <li class="list-group-item border-top text-black">
            Total Claim: <strong><?php echo 'RM ' . (isset($project_claim->invoice_total) ? number_format($project_claim->invoice_total, 2) : '0.00'); ?></strong>
        </li>
        <li class="list-group-item border-top text-black">
            Total Claim (Paid): <strong><?php echo 'RM ' . ($project_claim_payments ? number_format($project_claim_payments, 2) : '0.00'); ?></strong>
        </li>
        <li class="list-group-item border-top text-black">
            Total Claim (Unpaid): <strong><?php echo 'RM ' . number_format(($project_claim->invoice_total - $project_claim_payments), 2); ?></strong>
        </li>
        <li class="list-group-item border-top text-black">
            Claimable Retention: <strong><?php echo 'RM ' . number_format($project_total_retention->discount_total ?? 0, 2); ?></strong>
        </li>
        <?php
                echo modal_anchor(get_uri("invoices/modal_form?project_id=$project_info->id&client_id=$project_info->client_id"), 
                "<i data-feather='edit-3' class='icon-16'></i> Add Claim", 
                array("class" => "btn btn-default py-3 btnMbe", "title" => "Add New Claim"));
        ?>
    </ul>
</div>


