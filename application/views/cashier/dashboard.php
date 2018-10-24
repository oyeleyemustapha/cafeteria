


        <div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            
                            <h4 class="page-title">Dashboard</h4>
                        </div>
                    </div>
                </div>

              

                <div class="row">
                    <div class="col-md-6">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="salesProduct"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="orders" data-customerOrders="">
                                    <button class="btn btn-warning resetOrder btn-sm pull-right">Reset Order</button>
                                    <button class="btn btn-info submitOrder btn-sm pull-right">Submit Order</button>
                                    
                                    <div class="clearfix"></div>

                                    <div class="Ticket">
                                        <h3 class="text-center"><?php echo $cafeteria; ?></h3>
                                        <table class="table table-striped table-bordered table-condensed">
                                        <thead>
                                            <tr>
                                                <th>PRODUCTS</th>
                                                <th>QTY</th>
                                                <th>AMOUNT</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>
                                    <p><strong>Total : </strong>&#8358; <span class="total" data-totalAMount="0">0</span></p>
                                    </div>
                                    
                                </div>

                                <div class="msg"></div>

                               
                                
                            </div>
                        </div>
                    </div>

                   
                </div>
            </div> 
        </div>
      

