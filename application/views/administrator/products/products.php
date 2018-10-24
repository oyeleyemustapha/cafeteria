


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
                                <h4 class="mt-0 header-title"><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">Add Products</button>
                                  
                                </h4>

                                <div class="productListDiv"></div>
                                
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
                                                        <h5 class="modal-title mt-0" id="myModalLabel">Add Product</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                       <form method="post" id="addProductForm">
                                                           <div class="form-group">
                                                               <input type="text" name="product" class="form-control" placeholder="Product Name" required="">
                                                           </div>

                                                           <div class="form-group">
                                                               <input type="text" name="labelname" class="form-control" placeholder="Label Name" required="">
                                                           </div>

                                                           <div class="form-group">
                                                               <input type="text" name="costPrice" class="form-control" placeholder="Cost Price" required="">
                                                           </div>

                                                           <div class="form-group">
                                                               <input type="text" name="salesPrice" class="form-control" placeholder="Sales Price" required="">
                                                           </div>

                                                            

                                                           <button class="btn btn-danger">Add</button>
                                                       </form>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->



<div id="productInfoModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title mt-0" id="myModalLabel">Product Information</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                      
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->

