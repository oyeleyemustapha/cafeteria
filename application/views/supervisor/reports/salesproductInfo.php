<?php

if($product){
    echo'
    <form method="post" id="updateSalesproductForm">
      <input type="hidden" name="id" value="'.$product->ID.'">

      <div class="form-group">
                                                      
                                                               <select id="productsSelect" class="form-control" name="product" required>
                                                               <option value="'.$product->PRODUCT_ID.'" selected>'.$product->PRODUCT.'<option>
                                                                 
                                                               </select>
                                                           </div>

                                                           <div class="form-group">
                                                               <input type="text" name="quantity" class="form-control" placeholder="Quantity" required="" value="'.$product->QUANTITY.'">
                                                           </div>

                                                           <button class="btn btn-primary">Update</button>
                                                
    </form>
       
    ';
}



?>