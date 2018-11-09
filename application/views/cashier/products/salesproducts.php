<?php

if($products){

    foreach ($products as $product) {

    	if($product->QUANTITY==0){
    		echo "<button class='btn btn-default btn-lg'>".ucwords($product->LABEL_NAME)." <span class='badge badge-warning'>$product->QUANTITY</span></button> ";
    	}
    	elseif ($product->QUANTITY<=10) {
    		echo "<button class='btn btn-warning btn-lg Selectproduct' data-quantity='$product->QUANTITY'  data-label='".ucwords($product->LABEL_NAME)."' data-product-id='$product->PRODUCT_ID' data-order='0' data-price='$product->SALES_PRICE'>".ucwords($product->LABEL_NAME)." <span class='badge badge-info'>$product->QUANTITY</span></button> ";
    	}
    	else{
    		echo "<button class='btn btn-info btn-lg Selectproduct' data-quantity='$product->QUANTITY'  data-label='".ucwords($product->LABEL_NAME)."' data-product-id='$product->PRODUCT_ID' data-order='0' data-price='$product->SALES_PRICE'>".ucwords($product->LABEL_NAME)." <span class='badge badge-warning'>$product->QUANTITY</span></button> ";
    	}
        
    }
    

  
}


?>