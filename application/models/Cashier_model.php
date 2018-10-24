<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 class cashier_model extends CI_Model{


 	//FETCH CAFETERIA SETTING
 	function fetch_cafeteria(){
 		$this->db->select('*');
 		$this->db->from('setting');
 		$query= $this->db->get();
 		if ($query->num_rows()==1) {
 			return $query->row();
 		}
 		else{
 			return false;
 		}
 	}

 	//LOG STAFF LOG IN
 	function log_staff($log){
 		if($this->db->insert('logs', $log)){
 			return true;
 		}
 		else{
 			return false;
 		}
 	}


 	//PROCESS LOGIN
 	function process_login($username, $password){
 		$this->db->select('*');
 		$this->db->from('staff');
 		$this->db->where('USERNAME', $username);
 		$this->db->where('PASSWORD', $password);
 		$query= $this->db->get();
 		if ($query->num_rows()==1) {
 			return $query->row();
 		}
 		else{
 			return false;
 		}
 	}

 	//VERIFY USER
 	function verify_user($username, $password){
 		$this->db->select('*');
 		$this->db->from('staff');
 		$this->db->where('USERNAME', $username);
 		$this->db->where('PASSWORD', $password);
 		$this->db->where('ROLE', 'Cashier');
 		$query= $this->db->get();
 		if ($query->num_rows()==1) {
 			return true;
 		}
 		else{
 			return false;
 		}
 	}

 	
 	//=========================
 	//=========================
 	//PROCESS SALES
 	//=========================
 	//=========================
 

 	//PROCESS SALES
 	function process_sales($sales){
 		if($this->db->insert('sales', $sales)){
 			$this->update_sales_products($sales);
 			return true;
 		}
 	}


 	//UPDATE SALES PRODUCT
 	function update_sales_products($sales){
 		$sales_quantity=$sales['QUANTITY_SOLD'];
 		$this->db->set('QUANTITY', "QUANTITY-$sales_quantity", FALSE);
 		$this->db->where('PRODUCT_ID', $sales['PRODUCT_ID']);
 		$this->db->where('DATE_ADDED', $sales['SALES_DATE']);
		$this->db->update('products_to_sell');	
 	}

 	//FETCH PRODUCTS LIST
 	function fetch_product_list(){
 		$this->db->select('*');
 		$this->db->from('products');
 		$this->db->order_by('PRODUCT_ID', 'DESC');
 		$query=$this->db->get();
 		if($query->num_rows()>0){
 			return $query->result();
 		}
 		else{
 			return false;
 		}
 	}


 	//FETCH ORDER INFORMATION
 	function fetch_order_info($order_no){
 		$this->db->select('products.PRODUCT, sales.AMOUNT, sales.SALES_DATE, sales.ORDER_NO, sales.QUANTITY_SOLD, staff.NAME');
 		$this->db->from('sales');
 		$this->db->join('products', 'products.PRODUCT_ID=sales.PRODUCT_ID', 'left');
 		$this->db->join('staff', 'sales.STAFF_ID=staff.STAFF_ID', 'left');
 		$this->db->where('sales.ORDER_NO', $order_no);
 		$query=$this->db->get();
 		if($query->num_rows()>0){
 			return $query->result();
 		}
 		else{
 			return false;
 		}
 	}



 	//FETCH SALES PRODUCTS LIST FOR A PARTICULAR DATE
 	function fetch_sales_product_list($date){
 		$this->db->select('products.PRODUCT_ID, products.PRODUCT, products_to_sell.QUANTITY, products_to_sell.ID, products_to_sell.DATE_ADDED, products.LABEL_NAME, products.SALES_PRICE');
 		$this->db->from('products_to_sell');
 		$this->db->join('products', 'products_to_sell.PRODUCT_ID=products.PRODUCT_ID', 'left');
 		$this->db->where('products_to_sell.DATE_ADDED', $date);
 		$query=$this->db->get();
 		if($query->num_rows()>0){
 			return $query->result();
 		}
 		else{
 			return false;
 		}
 	}


 	//FETCH SALES TICKET 
 	function fetch_ticket($order_no){
 		$this->db->select('products.PRODUCT, sales.QUANTITY_SOLD, sales.AMOUNT, sales.ORDER_NO');
 		$this->db->from('sales');
 		$this->db->join('products', 'sales.PRODUCT_ID=products.PRODUCT_ID', 'left');
 		$this->db->where('sales.ORDER_NO', $order_no);
 		$query=$this->db->get();
 		if($query->num_rows()>0){
 			return $query->result();
 		}
 		else{
 			return false;
 		}
 	}


 	//QUERY SALES RECORDS
 	function query_sales_record($order_no){
 		$this->db->select('products.PRODUCT, sales.AMOUNT, sales.SALES_DATE, sales.ORDER_NO, sales.QUANTITY_SOLD, staff.NAME, sales.STATUS');
 		$this->db->from('sales');
 		$this->db->join('products', 'products.PRODUCT_ID=sales.PRODUCT_ID', 'left');
 		$this->db->join('staff', 'sales.STAFF_ID=staff.STAFF_ID', 'left');
 		$this->db->where('sales.ORDER_NO', $order_no);
 		$query=$this->db->get();
 		if($query->num_rows()>0){
 			return $query->result();
 		}
 		else{
 			return false;
 		}
 	}

 	
 	




}


?>