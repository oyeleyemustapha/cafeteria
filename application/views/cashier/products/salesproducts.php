<?php

if($products){

    foreach ($products as $product) {
        echo "<button class='btn btn-info btn-lg Selectproduct' data-quantity='$product->QUANTITY'  data-label='$product->LABEL_NAME' data-product-id='$product->PRODUCT_ID' data-order='0' data-price='$product->SALES_PRICE'>$product->LABEL_NAME <span class='badge badge-warning'>$product->QUANTITY</span></button> ";
    }
    
}


?>