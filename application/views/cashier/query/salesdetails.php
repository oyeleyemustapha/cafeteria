<?php

if($order){
    echo'


    <div class="col-lg-12 salesTicket">

    <h3><span>ORDER NO : </span>'.$order[0]->ORDER_NO.'</h3>
    <h3><span>TICKET ISSUED BY : </span>'.$order[0]->NAME.'</h3>
    <h3><span>DATE ISSUED : </span>'.date('F d, Y', strtotime($order[0]->SALES_DATE)).'</h3>
        <table class="table table-bordered table-condensed">
    <thead>
        <tr>
            <th>ID</th>
            <th>PRODUCT</th>
            <th>QUANTITY</th>
            <th>AMOUNT</th>
            <th>STATUS</th>
        </tr>
    </thead> <tbody>
    ';
    $counter=1;
    $total_amount=0;
    foreach ($order as $orders) {


        if($orders->STATUS=='Confirmed'){
            $status="<badge class='badge badge-success'>Confirmed</badge>";
        }
        else{
              $status="<badge class='badge badge-danger'>Canceled</badge>";
        }
        $total_amount+=$orders->AMOUNT;

        echo"

            <tr>
                <td>$counter</td>
                <td>$orders->PRODUCT</td>
                <td>$orders->QUANTITY_SOLD</td>
                <td>&#8358; $orders->AMOUNT</td>
                <td>$status</td>
                
            </tr>
        ";

        $counter++;
    }


    echo' </tbody></table>


<h3><span>TOTAL AMOUNT : </span> &#8358;'.number_format($total_amount).'</h3>



    </div>
    ';
}
else{
    echo "<br><div class='alert alert-info'><h3 class='text-center'>Ticket does not exist</h3></div>";
}


  
       
   

?>