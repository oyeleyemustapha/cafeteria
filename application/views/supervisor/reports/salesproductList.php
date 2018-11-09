<?php

if($products){
    echo'

    <h4 class="text-center">'.date('F d, Y', strtotime($products[0]->DATE_ADDED)).'</h4>

        <table class="table table-bordered table-condensed table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>PRODUCT</th>
                                            <th>QUANTITY</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>';
                                    $counter=1;
                                    foreach ($products as $product) {
                                        echo"
                                            <tr>
                                                <td>$counter</td>
                                                <td><a href='#' class='editSalesProduct' id='$product->ID'>$product->PRODUCT</a></td>
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

    echo "<div class='alert alert-info'>
<h3 class='text-center'><i class='fa fa-info-circle fa-2x'></i><br>No record found</h3>
    </div>";
}



?>