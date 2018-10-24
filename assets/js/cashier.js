$(document).ready(function(){

	 var base_url=location.protocol+"//"+location.host+"/cafeteria/cashier/";
	 

myOrder="";
    
	var sales_product_cb=function(){
		   
        $('.resetOrder').click(function(){
          location.reload();
        });
      $('.Selectproduct').click(function(){
        $('.resetOrder, .submitOrder').show();

        var quantity=$(this).attr('data-quantity')-1; //REDUCE THE QUANTITY
        $(this).attr("data-quantity", quantity);
        $(this).children('span').text(quantity);
         var sales_order=parseInt($(this).attr('data-order'))+1;
         $(this).attr("data-order", sales_order);
         var sales_price=parseInt($(this).attr('data-price'));
         var amount= sales_order * sales_price;
         var product=$(this).attr('data-product-id');
         var customer_orders=$('.orders').attr('data-customerOrders');
         customer_orders="<tr class='label customerOrders'><td class='productName customerProduct' data-product-id='"+product+"'>"+$(this).attr('data-label')+"</td>";
         customer_orders+="<td class='customerQty'>"+sales_order+"</td>";
         customer_orders+="<td class='total_amt'>"+amount+"</td></tr>";
         
        

         $('.orders').attr("data-customerOrders", customer_orders);

          if($("tr.label:contains('"+$(this).attr('data-label')+"')" ).length>0){
            $("tr.label:contains('"+$(this).attr('data-label')+"')" )[$("tr.label:contains('"+$(this).attr('data-label')+"')" ).length-1].remove();
          }

          
         $('.orders tbody').append($('.orders').attr("data-customerOrders"));


         var total_amt=parseInt($('.total').attr('data-totalAMount'));
         total_amt+=sales_price;
         $('.total').attr('data-totalAMount', total_amt);
         $('.total').text($('.total').attr('data-totalAMount'));


     });
	}
	$('.salesProduct').load(base_url+'fetch_sales_product_list', sales_product_cb);

	 //SUBMITY CUSTOMER ORDERS
    $('.submitOrder').click(function(){
      order_array=[];
        $( "tr.customerOrders" ).each(function( index ) {
          var product_ordered=$(this).children('.customerProduct').attr('data-product-id');
          var quantity_ordered=$(this).children('.customerQty').text();
          var amount=$(this).children('.total_amt').text();
          order_array[index]={
                "product":product_ordered,
                "quantity":quantity_ordered,
                "amount":amount
              } 
          Orders={
            "customerOrders":order_array
          }
          Orders=JSON.stringify(Orders);
          Orders=JSON.parse(Orders);
        });
        $.post( 
          base_url+"submitOrders", 
          Orders, 
          function(data){
            var link=base_url+"get_order_info/"+data;
            var options="menubar=no, location=no width=300, height=400, resizable=no, status=no";
            window.open(link, 'Meal Ticket', options);
            //$('.msg').html(data);
            $('.total').attr('data-totalAMount', 0);
            $('.total').text($('.total').attr('data-totalAMount'));

            $( "tbody tr" ).detach();
            $('.salesProduct').load(base_url+'fetch_sales_product_list', sales_product_cb);
          });
    });


    //QUERY SALES RECORD
    $('.query').keyup(function(){
        if($(this).val().length=='6'){
             $.post( 
                base_url+"query_sales_record", 
                {query: $(this).val()}, 
                function(data){
                  $('.queryResult').html(data);
            });
              $(document).ajaxSend(function(event, xhr, settings) {$(".preloader").fadeIn();});
              $(document).ajaxComplete(function(event, xhr, settings) {$(".preloader").fadeOut();});
        }
    });
	


	

	


    
                            
        



   


  
    


    
	
   


});