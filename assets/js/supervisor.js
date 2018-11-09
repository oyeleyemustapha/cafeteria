$(document).ready(function(){

	var base_url_admin=location.protocol+"//"+location.host+"/cafeteria/supervisor/";

	$('.date').datepicker({
	 	format:'MM dd, yyyy',
	 	autoclose: true
	});

	$('.month').datepicker({
	 	format:'MM yyyy',
	 	autoclose: true
	});
	
	//STAFF LOGS
	$('.logDiv').load(base_url_admin+'fetchLogs', function(){
		$('.log').DataTable();
	});


	//=========================
	//=========================
	//====PRODUCTS
	//=========================
	//=========================


	var product_cb=function(){
		$('.productList').DataTable({
        
         "drawCallback": function( settings ) {
              //EDIT PRODUCT INFO
              $('.editProduct').click(function(){
                    $.post( 
                        base_url_admin+"fetch_product_info", 
                        {product_id:$(this).attr('id')}, 
                        function(data){
                        	$('#productInfoModal').modal('show');
                        	$('#productInfoModal .modal-body').html(data);

                        	  
                        	//UPDATE PRODUCT INFOMATION
            							$('#updateproductForm').submit(function(){
            						            $.post( 
            						                base_url_admin+"update_product_info", 
            						                $(this).serialize(), 
            						                function(data){
            						                    $('#productInfoModal').modal('hide');
            						                     $.notify({
            						                        message: data
            						                    },{
            						                        
            						                        type: "success",
            						                       
            						                    }); 

            						                    $('.productListDiv').load(base_url_admin+'fetch_product_list', product_cb);
            						                }
            						            );
            						             $(document).ajaxSend(function(event, xhr, settings) {$(".preloader").fadeIn();});
            						             $(document).ajaxComplete(function(event, xhr, settings) {$(".preloader").fadeOut();});
            						             return false;          
						    });	
                        }
                    );
                $(document).ajaxSend(function(event, xhr, settings) {$(".preloader").fadeIn();});
                $(document).ajaxComplete(function(event, xhr, settings) {$(".preloader").fadeOut();});       
              });
        }

    });
	}
	$('.productListDiv').load(base_url_admin+'fetch_product_list', product_cb);


	//ADD PRODUCT
	$('#addProductForm').submit(function(){
            $.post( 
                base_url_admin+"add_product", 
                $(this).serialize(), 
                function(data){
                    $('#myModal').modal('hide');
                     $.notify({
                        message: data
                    },{
                        
                        type: "success",
                       
                    }); 


                    $('#addProductForm')[0].reset();
                    $('.productListDiv').load(base_url_admin+'fetch_product_list', product_cb);
                }
            );
             $(document).ajaxSend(function(event, xhr, settings) {$(".preloader").fadeIn();});
             $(document).ajaxComplete(function(event, xhr, settings) {$(".preloader").fadeOut();});
             return false;          
    });


	//FETCH PRODUCT LIST TO BE USED FOR SELECT2 PLUGIN
    $("#productsSelect").select2({
        placeholder: "Type Product Name",
        allowClear: true, 
        theme: "classic",
        width: '100%',
        //FETCH SUBJECT FROM THE DATABASE
        ajax: {
                url: base_url_admin+"productListSelect",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        search: params.term
                    };
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true
        },
        minimumInputLength: 3
    });


    //ADD SALES PRODUCTS
	$('#addsalesProductForm').submit(function(){
            $.post( 
                base_url_admin+"add_sales_products", 
                $(this).serialize(), 
                function(data){
                    $('#myModal').modal('hide');
                     $.notify({
                        message: data
                    },{
                        
                        type: "success",
                       
                    }); 


                    $('#addsalesProductForm')[0].reset();
                    $("#productsSelect").empty().trigger('change')
                    $('.salesproductListDiv').load(base_url_admin+"fetch_sales_product_list_current", salesProductList_cb);
                }
            );
             $(document).ajaxSend(function(event, xhr, settings) {$(".preloader").fadeIn();});
             $(document).ajaxComplete(function(event, xhr, settings) {$(".preloader").fadeOut();});
             return false;          
    });


    //GENERATE SALES PRODUCTS LIST FOR A PARTICULAR DATE
	$('#generateSalesproducts').submit(function(){
            $.post( 
                base_url_admin+"fetch_sales_product_list", 
                $(this).serialize(), 
                function(data){
                    $('#myModal2').modal('hide');
                    $('.salesproductListDiv').html(data);
                }
            );
             $(document).ajaxSend(function(event, xhr, settings) {$(".preloader").fadeIn();});
             $(document).ajaxComplete(function(event, xhr, settings) {$(".preloader").fadeOut();});
             return false;          
    });



	var salesProductList_cb=function(){

		
			//EDIT PRODUCT INFO
              $('.editSalesProduct').click(function(){
                    $.post( 
                        base_url_admin+"fetch_sales_product_info", 
                        {id:$(this).attr('id')}, 
                        function(data){
                        	$('#productInfoModal').modal('show');
                        	$('#productInfoModal .modal-body').html(data);

                        	  
                        	//UPDATE SALES PRODUCT INFOMATION
							$('#updateSalesproductForm').submit(function(){
						            $.post( 
						                base_url_admin+"update_sales_products", 
						                $(this).serialize(), 
						                function(data){
						                    $('#productInfoModal').modal('hide');
						                     $.notify({
						                        message: data
						                    },{
						                        
						                        type: "success",
						                       
						                    }); 

						                    $('.salesproductListDiv').load(base_url_admin+"fetch_sales_product_list_current", salesProductList_cb);
						                }
						            );
						             $(document).ajaxSend(function(event, xhr, settings) {$(".preloader").fadeIn();});
						             $(document).ajaxComplete(function(event, xhr, settings) {$(".preloader").fadeOut();});
						             return false;          
						    });	
                        }
                    );
                $(document).ajaxSend(function(event, xhr, settings) {$(".preloader").fadeIn();});
                $(document).ajaxComplete(function(event, xhr, settings) {$(".preloader").fadeOut();});       
              });
    };
    $('.salesproductListDiv').load(base_url_admin+"fetch_sales_product_list_current", salesProductList_cb);

  

    $('.reports').load(base_url_admin+"daily_sales_reports",function(){

    });


    //SALES
     $("#staff-List").select2({
        placeholder: "Type Staff Name",
        allowClear: true, 
        theme: "classic",
        width: '100%',
        minimumInputLength: 3
    });


     $('.SearchSalesRecord').keyup(function(){
  
     	if($('.SearchSalesRecord').val().length==6){


			            $.post( 
			                base_url_admin+"sales_records_order_no", 
			                {search:$('.SearchSalesRecord').val()}, 
			                function(data){
			                    $('#myModal3').modal('hide');
			                    $('.reports').html(data);

                          //CANCEL SPECIFIC PRODUCT ORDER
                          $('.cancel-single-order').click(function(){
                              var sales_id=$(this).attr('id');

                                swal({
                                    title: 'Are you sure of this ?',
                                    type: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#D62C1A',
                                    cancelButtonColor: '#2C3E50',
                                    confirmButtonText: 'Yes'
                                }).then(function () {
                                      $.post( 
                                        base_url_admin+"cancel_product_order", 
                                        {sales_id:sales_id}, 
                                        function(data){
                                            swal({
                                              title: 'Order Cancelled',
                                              text: data,
                                              type: 'success',
                                              timer:3000,
                                              showConfirmButton:false
                                            });  
                                        });
                                      });
                                  $(document).ajaxSend(function(event, xhr, settings) {$(".preloader").fadeIn();});
                                  $(document).ajaxComplete(function(event, xhr, settings) {$(".preloader").fadeOut();});   
                          });

								        //CANCEL ALL ORDER
					              $('.CancelOrderall').click(function(){
					                  var order_no=$(this).attr('id');

					                      swal({
					                          title: 'Are you sure of this ?',
					                          type: 'warning',
					                          showCancelButton: true,
					                          confirmButtonColor: '#D62C1A',
					                          cancelButtonColor: '#2C3E50',
					                          confirmButtonText: 'Yes'
					                      }).then(function () {
					                          $.post( 
					                              base_url_admin+"cancel_all_orders", 
					                              {order_no:order_no}, 
					                              function(data){

					                  
					                              		swal({
					                                    title: 'Order Cancelled',
					                                    text: data,
					                                    type: 'success',
					                                    timer:3000,
					                                    showConfirmButton:false,
					                                    onClose:function(){
					                                       
					                                    }
					                                  });
					                              	
					                            }
					                          );
					                        $(document).ajaxSend(function(event, xhr, settings) {$(".preloader").fadeIn();});
					                       $(document).ajaxComplete(function(event, xhr, settings) {$(".preloader").fadeOut();});
					                         
					                      }); 
					              });
			                }
			            );
			             $(document).ajaxSend(function(event, xhr, settings) {$(".preloader").fadeIn();});
			             $(document).ajaxComplete(function(event, xhr, settings) {$(".preloader").fadeOut();});
			             return false;          
     	}
     });


         

    


    
	
   


});