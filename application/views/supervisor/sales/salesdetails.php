<?php

if($sales){
    echo'
    <div class="col-lg-6 offset-lg-3 salesTicket">
    <div class="pull-right"><button class="btn btn-sm btn-danger CancelOrderall" id="'.$sales[0]->ORDER_NO.'">Cancel Order</button></div>
    <div class="clearfix"></div>
    <h3><span>ORDER NO : </span>'.$sales[0]->ORDER_NO.'</h3>
    <h3><span>TICKET ISSUED BY : </span>'.$sales[0]->NAME.'</h3>
    <h3><span>DATE ISSUED : </span>'.date('F d, Y', strtotime($sales[0]->SALES_DATE)).'</h3>
        <table class="table table-bordered table-condensed">
    <thead>
        <tr>
            <th>ID</th>
            <th>PRODUCT</th>
            <th>QUANTITY</th>
            <th>AMOUNT</th>
            <th>STATUS</th>
            <th></th>
        </tr>
    </thead>  <tbody>
    ';
    $counter=1;
    $total_amount=0;
    foreach ($sales as $sales) {
        $total_amount+=$sales->AMOUNT;

         if($sales->STATUS=="Confirmed"){
                                            $status="<span class='badge badge-success'>Completed</span>";
                                            $action="<button class='btn btn-sm  btn-danger cancel-single-order' id='$sales->SALES_ID'>Cancel</button>";
                                        }
                                        else{
                                            $status="<span class='badge badge-danger'>Cancelled</span>";
                                            $action="<button class='btn btn-sm btn-default' disabled>Cancel</button>";
                                        }
        echo"

            <tr>
                <td>$counter</td>
                <td>$sales->PRODUCT</td>
                <td>$sales->QUANTITY_SOLD</td>
                <td>".number_format($sales->AMOUNT)."</td>
                <td>$status</td>
                <td>$action</td>
            </tr>
        ";

        $counter++;
    }


    echo' </tbody></table>

<hr class="totalHr">
<h3><span>TOTAL AMOUNT : </span> &#8358;'.number_format($total_amount).'</h3>

<hr>

    </div>';
}


  
       
   

?>