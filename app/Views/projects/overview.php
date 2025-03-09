<div class="clearfix default-bg">

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3 col-sm-12">
                    <?php echo view("projects/project_progress_chart_info"); ?>
                </div>
                <div class="col-md-3 col-sm-12">
                    <?php echo view("projects/project_value"); ?>
                    
                 </div>
                 <div class="col-md-3 col-sm-12">
                 <?php echo view("projects/project_claim"); ?>
                 </div>
                 <div class="col-md-3 col-sm-12">
                    <?php echo view("projects/project_expenses"); ?>
                 </div>

                

                

            </div>
        </div>
    </div>
    <!-- Expenses detail -->
    <div class="row">
        <h1 style="font-size:20px;">Expenses Details</h1>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3 col-sm-12">
                    <?php echo view("projects/project_expenses_material"); ?>
                </div>
                <div class="col-md-3 col-sm-12">
                    <?php echo view("projects/project_expenses_tools"); ?>
                </div>
                <div class="col-md-3 col-sm-12">
                    <?php echo view("projects/project_expenses_labour"); ?>
                </div>
                <div class="col-md-3 col-sm-12">
                    <?php echo view("projects/project_expenses_others"); ?>
                </div>
            </div>
        </div>
     </div>
</div>