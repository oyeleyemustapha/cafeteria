<!DOCTYPE html>
<html>
<head>
    <?php
        echo'
             <title>Left Over Report</title>
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

    <h4 class="text-center">Left Over Reports for '.date('F d, Y',strtotime($report[0]->DATE_ADDED)).'</h4>

        <table class="table table-bordered table-condensed table-hover productList">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>PRODUCTS</th>
                                            <th>QUANTITY</th>
                                           
                                         
                                            
                                           
                                        </tr>
                                    </thead>
                                    <tbody>';
                                    $counter=1;
                                    
                                    foreach ($report as $product) {

                                        
                                        echo"
                                            <tr>
                                                <td>$counter</td>
                                                <td>$product->PRODUCT</td>
                                                <td>$product->QUANTITY</td>
                                               
                                               
                                            </tr>
                                        ";
                                        $counter++;
                                    }

                                    
                                        
                                    echo'</tbody>
                                </table>




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