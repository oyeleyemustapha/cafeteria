<?php

if($product_list){
    echo'

        <table class="table table-bordered table-condensed table-hover productList">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>PRODUCT</th>
                                            <th>LABEL NAME</th>
                                            <th>COST PRICE</th>
                                            <th>SALES PRICE</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>';
                                    $counter=1;
                                    foreach ($product_list as $product) {
                                        echo"
                                            <tr>
                                                <td>$counter</td>
                                                <td><a href='#' class='editProduct' id='$product->PRODUCT_ID'>$product->PRODUCT</a></td>
                                                <td>$product->LABEL_NAME</td>
                                                <td>&#8358; $product->COST_PRICE</td>
                                                <td>&#8358; $product->SALES_PRICE</td>
                                
                                            </tr>
                                        ";
                                        $counter++;
                                    }

                                    
                                        
                                    echo'</tbody>
                                </table>



    ';
}



?>