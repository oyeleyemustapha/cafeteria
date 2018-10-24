<?php

if($order){
    echo'


<!doctype html>
<html class="no-js " lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title>Meal Ticket</title>
<link rel="stylesheet" href="'.base_url().'assets/plugins/bootstrap/css/bootstrap.min.css">
  <link href="'.base_url().'assets/css/style.css" rel="stylesheet" type="text/css" />
</head>
<body class="ticketBody">
    <div class="col-lg-8 salesTicket2">
    <h2 class="text-center">'.$cafeteria.'</h2>
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
        </tr>
    </thead> <tbody>
    ';
    $counter=1;
    $total_amount=0;
    foreach ($order as $orders) {
        $total_amount+=$orders->AMOUNT;

        echo"

            <tr>
                <td>$counter</td>
                <td>$orders->PRODUCT</td>
                <td>$orders->QUANTITY_SOLD</td>
                <td>$orders->AMOUNT</td>
                
            </tr>
        ";

        $counter++;
    }


    echo' </tbody></table>


<h3><span>TOTAL AMOUNT : </span> &#8358;'.number_format($total_amount).'</h3>



    </div>
    <body>



      <script src="'.base_url().'assets/js/jquery.min.js"></script>
        <script src="'.base_url().'assets/js/popper.min.js"></script>

        <script type="text/javascript">

        $(document).ready(function(){
            window.print();
            });
        </script>
    </html>';
}


  
       
   

?>