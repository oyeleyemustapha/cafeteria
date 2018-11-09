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
 		//$this->db->or_where('ROLE', 'Administrator');
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

 	//GET CASHIER SALES FOR THE DAY
 	public function cashier_sales_day($staff_id){
 		$this->db->select('SUM(AMOUNT) AS TOTAL');
 		$this->db->from('sales');
 		$this->db->where('STAFF_ID', $staff_id);
 		$this->db->where('SALES_DATE', date('Y-m-d'));
 		$this->db->where('STATUS', "Confirmed");
 		$query=$this->db->get();
 		
 			if($query->row()->TOTAL!=null){
 				return $query->row()->TOTAL;
 			}
 			else{
	 			return 0;
	 		}
	}

	//UPDATE PASSWORD
	public function update_password($password){
		$this->db->set('PASSWORD', $password);
 		$this->db->where('STAFF_ID', $_SESSION['staff_id']);
		if($this->db->update('staff')){
			return true;
		}
		else{
			return false;
		}
	}



	//create pin for change
 	function create_pin($pinData){
 		$this->db->select('PIN');
 		$this->db->from('pin');
 		$this->db->where('PIN', $pinData['PIN']);
 		$query=$this->db->get();
 		if ($query->num_rows()==1) {
 			$pin=& get_instance();
 			$pinData['PIN']=$pin->pinGenerator();
 		}
 		
 			if($this->db->insert('pin', $pinData)){
 				return $pinData['PIN'];
	 		}
	 		else{
	 			return "There is a Problem Generating Pin";
	 		}
 	}

 	//FETCH PIN
 	function fetch_pin($pin){
 		$this->db->select('pin.NAME, pin.DATE_CREATED, staff.NAME staff, pin.PIN');
 		$this->db->from('pin');
 		$this->db->join('staff', 'pin.CREATED_BY=staff.STAFF_ID', 'left');
 		$this->db->where('pin.PIN', $pin);
 		$query=$this->db->get();
 		if($query->num_rows()==1){
 			return $query->row();
 		}
 	}

 	//FETCH PIN  INFO
 	function search_pin($pin){
 		$this->db->select('pin.ID, pin.NAME NAME, pin.PIN, pin.PHONE, pin.AMOUNT, pin.DATE_CREATED DATE_CREATED, pin.STATUS STATUS, pin.DATE_CLEARED,pin.CLEARED_BY, staff.NAME STAFF_CREATED');
 		$this->db->from('pin');
 		$this->db->join('staff', 'pin.CREATED_BY=staff.STAFF_ID', 'left');
 		$this->db->where('pin.PIN', $pin);
 		$query=$this->db->get();
 		if($query->num_rows()==1){
 			return $query->row();
 		}
 	}


 	//GET STAFF NAME
 	function staff_name($id){
 		$this->db->select('NAME');
 		$this->db->from('staff');
 		$this->db->where('STAFF_ID', $id);
 		$query=$this->db->get();
 		return $query->row();
 	}


 	//CLEAR CHANGE
 	function pay_change($pin_id){
 		$this->db->set('DATE_CLEARED', date('Y-m-d H:i:s'));
 		$this->db->set('CLEARED_BY', $_SESSION['staff_id']);
 		$this->db->set('STATUS', 'PAID');
 		$this->db->where('ID', $pin_id);
 		if($this->db->update('pin')){
 			return "Change has been paid for this pin";
 		}
 		else{
 			return"There is an error paying Change";
 		}
 	}



 	//CHANGES NOT PAID BY STAFF FOR THE CURRENT DATE
 	function change_not_paid_by_staff_day($staff_id){
 		$this->db->select('SUM(AMOUNT) AMOUNT');
 		$this->db->from('pin');
 		$this->db->where('CREATED_BY', $staff_id);
 		$this->db->where('STATUS', 'NOT PAID');
 		$this->db->where('DATE(DATE_CREATED)', date('Y-m-d'));
 		$query=$this->db->get();
 		if($query->row()->AMOUNT){
 			return $query->row()->AMOUNT;
 		}
 		else{
 			return 0;
 		}
 		
 	}

 
 	//CHANGES NOT PAID BY STAFF FOR THE CURRENT MONTH
 	function change_not_paid_by_staff_month($staff_id){
 		$this->db->select('SUM(AMOUNT) AMOUNT');
 		$this->db->from('pin');
 		$this->db->where('CREATED_BY', $staff_id);
 		$this->db->where('STATUS', 'NOT PAID');
 		$this->db->where('MONTH(DATE_CREATED)', date('m'));
 		$query=$this->db->get();
 		if($query->row()->AMOUNT){
 			return $query->row()->AMOUNT;
 		}
 		else{
 			return 0;
 		}
 	}

 	
 	




}


?>