


        <div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                           
                            <h4 class="page-title">Settings</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


          
                <div class="row">
                   

                    <div class="col-md-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <h4 class="mt-0 header-title"><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">Change Cafeteria Name</button></h4>

                               
                                <?php

                                if($cafeteria){
                                  echo "
                                  <p class='text-center'><img src='".base_url()."assets/images/dish.png'></p>

                                  <h2 class='text-center'>".strtoupper($cafeteria->NAME)."</h2>";
                                }

                                ?>
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
                                                        <h5 class="modal-title mt-0" id="myModalLabel">Cafeteria Name</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                       <form method="post" id="updateCafeteriaName">
                                                          

                                                           <div class="form-group">
                                                               <input type="text" name="name" class="form-control" placeholder="Cafeteria Name" required="" value="<?php echo $cafeteria->NAME; ?>">
                                                           </div>

                                                           
                                                           <button class="btn btn-danger">Update</button>
                                                       </form>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->



