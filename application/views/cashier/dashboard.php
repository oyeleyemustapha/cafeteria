


        <div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            
                            <h4 class="page-title pull-left">Sales Order : <span class="currentOrder"></span> </h4>
                            
                            <h4 class="page-title pull-right">Current Sales [<?php echo date('F d, Y'); ?>]: &#8358; <span class="currentSales"></span></h4>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

              

                <div class="row">
                    <div class="col-md-8">
                        <div class="card m-b-30">
                            <div class="card-body">
                               
                                <div class="salesProduct"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 foodTicket">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="orders" data-customerOrders="">
                                   
                                    
                                    <div class="clearfix"></div>

                                    <div class="Ticket">
                                        <h3 class="text-center"><?php echo $cafeteria; ?></h3>
                                        <table class="table table-bordered table-condensed">
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
                                    <div class="btn-group">
                                         <button class="btn btn-info submitOrder btn-sm">Submit Order</button>
                                        <button class="btn btn-warning resetOrder btn-sm">Cancel Order</button>
                                   
                                    </div>
                                     
                                    <div class="clearfix"></div>
                                    </div>
                                    
                                </div>

                                <div class="msg"></div>

                               
                                
                            </div>
                        </div>
                    </div>

                   
                </div>
            </div> 
        </div>
      

