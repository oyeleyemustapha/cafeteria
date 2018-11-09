<!DOCTYPE html>
<html>
<head>
    <?php
        echo'
             <title>Change Report </title>
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
   
                 
                if($_POST['status']=='PAID'){

                 echo '<h4 class="text-center">Changes Paid by '.$report[0]->STAFF_CREATED.'</h4>';
                }
                else{
                   echo '<h4 class="text-center">Changes Yet to be paid by '.$report[0]->STAFF_CREATED.'</h4>';
                }

    echo'
   

        <table class="table table-bordered table-condensed table-hover productList">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>CUSTOMER</th>
                                            <th>PHONE</th>
                                            <th>AMOUNT</th>
                                            <th>PIN</th>
                                            <th>DATE CREATED</th>
                                            <th>DATE PAID</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>';
                                    $counter=1;
                                    $total_amt=0;
                               
                                    foreach ($report as $report) {

                                        

                                        $date_created=date('F d, Y H:i:s', strtotime($report->DATE_CREATED) );

                                        if($report->DATE_CLEARED){
                                          $date_cleared=date('F d, Y H:i:s', strtotime($report->DATE_CLEARED) );
                                        }
                                        else{
                                          $date_cleared="";
                                        }
                                        $total_amt+=$report->AMOUNT;
                                        echo"
                                            <tr>
                                                <td>$counter</td>
                                                <td>$report->CUSTOMER</td>
                                                <td>$report->PHONE</td>
                                                <td>&#8358; ".number_format($report->AMOUNT)."</td>
                                                <td>$report->PIN</td>
                                                <td>$date_created</td>
                                                <td>$date_cleared</td>
                                                
                                               
                                            </tr>
                                        ";
                                        $counter++;
                                    }

                                    
                                        
                                    echo'</tbody>
                                </table>

                                <h5>Total Paid : &#8358;  '.number_format($total_amt).'</h5>
                                


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

