<div class="page-content project-details-view clearfix">
    <div class="container-fluid">
        <div class="clearfix default-bg">

            <div class="row">
                <div class="col-md-12">
                    <h1 class="pl0 text-black" style="font-size:20px;">Tender Overview</h1>
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                        <?php echo view("tenders/tender_detail"); ?>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <?php echo view("tenders/tender_sitevisit"); ?>
                            <?php echo view("tenders/tender_sitevisit_expenses"); ?>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <?php echo view("tenders/tender_bq"); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>