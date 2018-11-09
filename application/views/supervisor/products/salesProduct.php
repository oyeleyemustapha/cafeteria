


        <div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                           
                            <h4 class="page-title">Sales Products</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


          
                <div class="row">
                   

                    <div class="col-md-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <h4 class="mt-0 header-title"><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">Add Products</button>
                                  <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal2">View Sales Products</button>
                                </h4>

                              

                                <div class="salesproductListDiv"></div>
                                
                            </div>
                        </div>
                    </div>
                </div>

              

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->


<!-- sample modal content -->
                                        <div id="myModal" class="modal fade"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title mt-0" id="myModalLabel">Add Sales Products</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <?php

                                                        if($products){
                                                          echo "
                                                          <form method='post' id='addsalesProductForm'>
                                                            <table class='table table-hover table-condensed'>
                                                            <thead>
                                                              <tr>
                                                                <th>ID</th>
                                                                <th>PRODUCT</th>
                                                                <th>QUANTITY</th>
                                                              </tr>
                                                            </thead>
                                                            <tbody>

                                                          ";
                                                          $counter=1;
                                                          foreach ($products as $product) {
                                                            echo"
                                                            <tr>
                                                              <td>$counter</td>
                                                              <td>$product->PRODUCT</td>
                                                              <td>
                                                              <input type='hidden' class='form-control' name='product[]' value='$product->PRODUCT_ID'>
                                                                <input type='text' class='form-control' name='quantity[]'>
                                                              </td>

                                                            </tr>


                                                            ";
                                                            $counter++;
                                                          }
                                                        }

                                                        echo'</tbody>
                                                      </table>
                                                      <button class="btn btn-primary">Add</button>
                                                      </form>';

                                                      ?>


                                                          
                                                        
                                                       <!--<form method="post" id="addsalesProductForm">
                                                           <div class="form-group">
                                                      
                                                               <select id="productsSelect" class="form-control" name="product" required>
                                                                 
                                                               </select>
                                                           </div>

                                                           <div class="form-group">
                                                               <input type="text" name="quantity" class="form-control" placeholder="Quantity" required="">
                                                           </div>

                                                           

                                                            

                                                           <button class="btn btn-danger">Add</button>
                                                       </form>-->
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->



 <div id="myModal2" class="modal fade"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title mt-0" id="myModalLabel">Generate Sales Products</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                       <form method="post" id="generateSalesproducts">
                                                           
                                                           <div class="form-group">
                                                               <input type="date" name="date" class="form-control" placeholder="date" required="">
                                                           </div>

                                                           

                                                            

                                                           <button class="btn btn-danger">Generate</button>
                                                       </form>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->



<div id="productInfoModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title mt-0" id="myModalLabel">Sales Product Information</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                      
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->

