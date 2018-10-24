


        <div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                           
                            <h4 class="page-title">Products</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


          
                <div class="row">
                   

                    <div class="col-md-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="btn-group"><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">Daily Sales Report</button>


                                  <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal2">Monthly Sales Report</button>

                                  <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal3">Annual Sales Report</button>
                                  
                                </div>



                                <div class="reports"></div>
                                
                            </div>
                        </div>
                    </div>
                </div>

              

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->


<!-- sample modal content -->
                                        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title mt-0" id="myModalLabel">Daily Sales Reports</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                       <form method="post" action="<?php echo base_url(); ?>daily-sales-reports" target="_blank">
                                                           <div class="form-group">
                                                               <input type="text" name="date" class="form-control date" required="" autocomplete="off">
                                                           </div>

                                                           <button class="btn btn-danger">Generate</button>
                                                       </form>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->



 <div id="myModal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title mt-0" id="myModalLabel">Monthly Sales Reports</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                       <form method="post" action="<?php echo base_url(); ?>monthly-sales-reports" target="_blank">
                                                            <div class="form-group">
                                                                 <div class="input-group">
                                                             <div class="input-group-addon">Month</div>
                                                             <select name="month" class="form-control" required="">
                                                                 <?php echo $month; ?>
                                                               </select>
                                                           </div>
                                                           </div>

                                                           <div class="form-group">
                                                                 <div class="input-group">
                                                             <div class="input-group-addon">Year</div>
                                                             <select name="year" class="form-control" required="">
                                                                 <?php echo $year; ?>
                                                               </select>
                                                           </div>
                                                           </div>
                                                           <button class="btn btn-danger">Generate</button>
                                                       </form>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->


<div id="myModal3" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title mt-0" id="myModalLabel">Annual Sales Reports</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                       <form method="post" action="<?php echo base_url(); ?>annual-sales-reports" target="_blank">
                                                            

                                                           <div class="form-group">
                                                                 <div class="input-group">
                                                             <div class="input-group-addon">Year</div>
                                                             <select name="year" class="form-control" required="">
                                                                 <?php echo $year; ?>
                                                               </select>
                                                           </div>
                                                           </div>
                                                           <button class="btn btn-danger">Generate</button>
                                                       </form>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->



