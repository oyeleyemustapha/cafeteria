


        <div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                           
                            <h4 class="page-title">Staff</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


          
                <div class="row">
                   

                    <div class="col-md-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <h4 class="mt-0 header-title"><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">Add Staff</button></h4>

                                <div class="staffListDiv"></div>
                                
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
                                                        <h5 class="modal-title mt-0" id="myModalLabel">Add Staff Record</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                       <form method="post" id="addStaffForm">
                                                           <div class="form-group">
                                                               <input type="text" name="name" class="form-control" placeholder="Staff Name" required="">
                                                           </div>

                                                            <div class="form-group">
                                                               <select name="role" class="form-control" required="">
                                                                   <option value="">Choose Role</option>
                                                                   <option value="Administrator">Administrator</option>
                                                                   <option value="Supervisor">Supervisor</option>
                                                                   <option value="Cashier">Cashier</option>
                                                                   <option value="Stock Manager">Stock Manager</option>
                                                               </select>
                                                           </div>

                                                           <div class="form-group">
                                                               <input type="text" name="username" class="form-control" placeholder="Username" required="">
                                                           </div>

                                                            <div class="form-group">
                                                               <input type="password" name="password" class="form-control" placeholder="Password" required="">
                                                           </div>
                                                           <div class="form-group">
                                                               <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password" required="">
                                                           </div>

                                                           <button class="btn btn-danger">Add</button>
                                                       </form>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->



<div id="staffInfoModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title mt-0" id="myModalLabel">Staff Record</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                      
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->

