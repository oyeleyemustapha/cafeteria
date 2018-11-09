<!DOCTYPE html>
<html>
<head>
    <?php
        echo'
             <title>Sales Report : '.date('F d, Y',strtotime($date)).'</title>
            <link href="'.base_url().'assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
            <link href="'.base_url().'assets/css/style.css" rel="stylesheet" type="text/css" />

        ';


    ?>

    <style type="text/css">
        body, html{
            background: #fff;
        }


        .table>tbody>tr>td,  .table>thead>tr>td {padding: 5px 5px !important;}
        .table-bordered td, .table-bordered th {border: 1px solid #000 !important;}
        .table-bordered thead th {
            border-bottom-width: 2px;
            background: transparent !important;
            color: #000  !important;
            font-weight: 600;
}

.table th {
    padding: 5px !important;}
    </style>
   
</head>
<body>


    <div class="container-fluid">
        <?php


            if($report){
                 echo'
                 <h2 class="text-center">'.strtoupper($cafeteria).'</h2>
                 <hr>

    <h4 class="text-center">Sales Reports for '.date('F d, Y',strtotime($report[0]->SALES_DATE)).'</h4>

        <table class="table table-bordered table-condensed table-hover productList">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>PRODUCT</th>
                                            <th>QUANTITY SOLD</th>
                                            <th>AMOUNT</th>
                                         
                                            
                                           
                                        </tr>
                                    </thead>
                                    <tbody>';
                                    $counter=1;
                                    $total_amt=0;
                                    $total_profit=0;
                                    foreach ($report as $product) {

                                        $cost_price_sum=$product->SALES*$product->COST_PRICE;

                                        $amount=$product->SALES*$product->SALES_PRICE;

                                        $profit=$amount-$cost_price_sum;
                                        $total_profit+=$profit;
                                        $total_amt+=$amount;
                                        echo"
                                            <tr>
                                                <td>$counter</td>
                                                <td>$product->PRODUCT</td>
                                                <td>$product->SALES</td>
                                                <td>&#8358; ".number_format($amount)."</td>
                                               
                                            </tr>
                                        ";
                                        $counter++;
                                    }

                                    
                                        
                                    echo'</tbody>
                                </table>

                                <h5>TOTAL AMOUNT : &#8358; '.number_format($total_amt).' </h5>
                                <h5>PROFIT : &#8358; '.number_format($total_profit).' </h5>




    ';
            }
            else{
                echo'<br><br><br><div class="alert alert-info">

                <h1 class="text-center">No Record found</h1>   
                </div>';
            }


        ?>
       
                
    </div>

</body>
</html>