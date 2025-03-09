<div class="card">
    <div class="card card-header mb-0" style="background-color:blue;">
        Project Value
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item border-top text-black">
            Project Value: <strong><?php echo 'RM '.number_format($project_info->price ?? 0,2); ?></strong>
        </li>
        <li class="list-group-item border-top text-black">
            Performance Bond: <strong><?php echo 'RM '.number_format($project_info->pb ?? 0,2); ?></strong>
        </li>
        <li class="list-group-item border-top text-black">
            Project VO: <strong><?php echo 'RM ' . number_format($project_vo->amount ?? 0, 2); ?></strong>
        </li>
        <li class="list-group-item border-top text-black">
            Total Project Value: <strong><?php echo 'RM ' . number_format($project_info->price + $project_vo->amount, 2); ?></strong>
        </li>
        <li class="list-group-item border-top text-black">
            Claim Balance: <strong><?php echo 'RM '.number_format($project_info->price + $project_vo->amount - $project_claim->invoice_total,2); ?></strong>
        </li>

        <?php
                echo modal_anchor(get_uri("projects/modal_vo?pid=$project_info->id"), 
                "<i data-feather='edit-3' class='icon-16'></i> Add VO", 
                array("class" => "btn btn-default py-3 btnMbe", "title" => "Add New VO"));
        ?>
    </ul>
</div>


