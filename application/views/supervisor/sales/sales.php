


        <div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                           
                            <h4 class="page-title">Sales Records</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


          
                <div class="row">
                   

                    <div class="col-md-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="btn-group"><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">Individual Sales</button>


                                  <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal2">General Sales</button>

                                  <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal3">Query Ticket</button>
                                  
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
                                        <div id="myModal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title mt-0" id="myModalLabel">Individual Sales</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                       <form method="post" action="<?php echo base_url(); ?>supervisor/sales_reports_day_staff" target="_blank">
                                                          

                                                            <div class="form-group">
                                                              
                                                                  
                                                                <select name="staff" class="form-control" id="staff-List">
                                                                      <option value=""></option>
                                                                <?php
                                                                  echo $staffList;
                                                                ?>
                                                              </select>
                                                           
                                                            </div>

                                                            <div class="form-group">
                                                              <div class="input-group">
                                                                  <div class="input-group-addon"><i class="fa fa-calendar fa-fw"></i>Date</div>
                                                                   <input type="text" name="date" class="form-control date"autocomplete="off">
                                                                  </div>
                                                            </div>

                                                             <div class="form-group">
                                                              <div class="input-group">
                                                                  <div class="input-group-addon"><i class="fa fa-calendar fa-fw"></i>Month</div>
                                                                  <select class="form-control" name="month">
                                                                    <?php echo $month; ?>
                                                                  </select>
                                                                  
                                                                  </div>
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
                                                        <h5 class="modal-title mt-0" id="myModalLabel">General Sales</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                       <form method="post" action="<?php echo base_url(); ?>supervisor/sales_reports_day_general" target="_blank">
                                                            <div class="form-group">
                                                              <div class="input-group">
                                                                  <div class="input-group-addon"><i class="fa fa-calendar fa-fw"></i>Date</div>
                                                                   <input type="text" name="date" class="form-control date"  autocomplete="off">
                                                                  </div>
                                                            </div>

                                                            <div class="form-group">
                                                              <div class="input-group">
                                                                  <div class="input-group-addon"><i class="fa fa-calendar fa-fw"></i>Month</div>
                                                                  <select class="form-control" name="month">
                                                                    <?php echo $month; ?>
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
                                                        <h5 class="modal-title mt-0" id="myModalLabel">Search Sales Record</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                       <form method="post" id="searchSales">
                                                            

                                                           <div class="form-group">
                                                                 <input type="text" name="search" class="SearchSalesRecord form-control form-control-lg" placeholder="Type Order No ">
                                                           </div>
                                                           
                                                          
                                                       </form>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->



