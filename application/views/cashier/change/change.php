


        <div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            
                            <h4 class="page-title">Change <span class="currentOrder1"></span></h4>
                            
                           
                        </div>
                    </div>
                </div>

              

                <div class="btn-group">
                    <button class="btn btn-primary" data-toggle="modal" href='#myModal1'>Create Pin</button>
                                <button class="btn btn-info" data-toggle="modal" href='#myModal2'>Query Pin</button>
                </div>
                <div class="clearfix"></div>
                <br>


                  <div class="row summary">
                    
                   
                </div>

            </div> 
        </div>
      



      <div id="myModal1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title mt-0" id="myModalLabel">Generate Pin</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                       <form method="post" id="generatePinform">
                                                            

                                                           <div class="form-group">
                                                                 <input type="text" name="name" class="SearchSalesRecord form-control form-control-lg" placeholder="Name of Customer" required>
                                                           </div>

                                                            <div class="form-group">
                                                                 <input type="text" name="phone" class="SearchSalesRecord form-control form-control-lg" placeholder="Phone Number of Customer" required>
                                                           </div>
                                                           

                                                           <div class="form-group">
                                                                 <input type="text" name="amount" class="SearchSalesRecord form-control form-control-lg" placeholder="Change Amount" required>
                                                           </div>

                                                           <button class="btn btn-primary">Generate</button>
                                                           
                                                          
                                                       </form>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->


<div id="myModal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title mt-0" id="myModalLabel">Query Pin</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                      
                                                            

                                                           <div class="form-group">
                                                                 <input type="text" name="pin" class="SearchPin form-control form-control-lg" placeholder="Type pin here" required>
                                                           </div>

                                                            
                                                           
                                                          
                                                      <div class="pinResult"></div>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->



