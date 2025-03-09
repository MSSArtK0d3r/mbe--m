<div id="page-content" class="page-wrapper clearfix">
    <?php if (!empty($error)): ?>
    <div class="alert alert-danger">
        <?= esc($error); ?>
        <!-- Display error message -->
    </div>
    <?php endif; ?>
    <div class="row mb-3">
        <?php echo view("projects/tabs"); ?>
       

        <!-- Toggle Button for Past Years -->

    </div>
    <div class="row">
        <div class="card grid-button">
            <div class="page-title clearfix projects-page">
                <h1><?php echo app_lang('projects'); ?></h1>
                <div class="title-button-group">
                    <?php
                if ($can_create_projects) {
                    // if ($can_edit_projects) {
                    //     echo modal_anchor(get_uri("labels/modal_form"), "<i data-feather='tag' class='icon-16'></i> " . app_lang('manage_labels'), array("class" => "btn btn-default", "title" => app_lang('manage_labels'), "data-post-type" => "project"));
                    // }
                    
                    // echo modal_anchor(get_uri("projects/import_modal_form"), "<i data-feather='upload' class='icon-16'></i> " . app_lang('import_projects'), array("class" => "btn btn-default", "title" => app_lang('import_projects')));

                    echo modal_anchor(get_uri("projects/modal_form"), "<i data-feather='plus-circle' class='icon-16'></i> " . app_lang('add_project'), array("class" => "btn btn-default", "title" => app_lang('add_project')));
                }
                ?>
                </div>
            </div>
            <?php ?>
            <div class="table-responsive">
                <table id="task-table" class="display xs-hide-dtr-control no-title dataTable no-footer text-black"
                    cellspacing="0" width="100%" role="grid" aria-describedby="task-table_info">
                    <thead>
                        <tr>

                            <th>Title</th>
                            <th>Price</th>
                            <th>Start Date</th>
                            <th>Deadline</th>

                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($projects)) : ?>
                        <?php foreach ($projects as $project) : ?>
                        <tr>

                            <td class="text-black"><a
                                    href="<?= base_url('projects') ?>/view/<?= esc($project->id) ?>"><?= esc($project->title) ?></a>
                            </td>
                            <td class="text-black">RM <?= esc(number_format($project->price, 2)) ?></td>
                            <td class="text-black"><?= esc(date('d M Y', strtotime($project->start_date))) ?></td>
                            <td class="text-black"><?= esc(date('d M Y', strtotime($project->deadline))) ?></td>
                            <td class="text-black">
                                <span class="<?= ($project->status == 'completed') ? 'pstatus' : '' ?>">
                                    <?= esc($project->status) ?>
                                </span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php else : ?>
                        <tr>
                            <td colspan="7">No projects found.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- <script>
    $(document).ready(function () {
        const currentYear = new Date().getFullYear();
        const startYear = currentYear - 6;
        const months = [
            { name: "Jan", number: "01" }, { name: "Feb", number: "02" }, { name: "Mar", number: "03" },
            { name: "Apr", number: "04" }, { name: "May", number: "05" }, { name: "Jun", number: "06" },
            { name: "Jul", number: "07" }, { name: "Aug", number: "08" }, { name: "Sep", number: "09" },
            { name: "Oct", number: "10" }, { name: "Nov", number: "11" }, { name: "Dec", number: "12" }
        ];

        let yearTabs = "";
        let yearContent = "";

        for (let year = currentYear; year >= startYear; year--) {
            let activeClass = (year === currentYear) ? "active" : "";

            // Create tab link for each year
            yearTabs += `<li class="${activeClass}">
                            <a href="#year-${year}" data-toggle="tab">${year}</a>
                         </li>`;

            // Create tab content for each year
            let monthsButtons = months.map(month => 
                `<button type="button" class="btn btn-default m-1 month-btn" 
                    data-date="${year}-${month.number}">
                    ${month.name} ${year}
                </button>`
            ).join('');

            yearContent += `<div id="year-${year}" class="tab-pane fade in ${activeClass}">
                                <div class="mt-3">${monthsButtons}</div>
                            </div>`;
        }

        // Inject the tabs and content into the page
        $("#yearTabs").html(yearTabs);
        $("#yearTabContent").html(yearContent);

        // Click event for month buttons - updates URL with YYYY-MM parameter
        $(document).on("click", ".month-btn", function () {
            let selectedDate = $(this).data("date"); // YYYY-MM format
            let url = new URL(window.location.href);
            
            url.searchParams.set("date", selectedDate);
            
            window.location.href = url.toString(); // Redirect with YYYY-MM param
        });
    });
</script> -->