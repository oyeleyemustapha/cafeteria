<?php

if($daily_sales){
    echo'

    <h4 class="text-center">Sales Reports for '.date('F d, Y',strtotime($daily_sales[0]->SALES_DATE)).'</h4>

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
                                    foreach ($daily_sales as $product) {

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



?>