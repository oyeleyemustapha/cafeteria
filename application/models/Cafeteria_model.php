<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 class Cafeteria_model extends CI_Model{


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
 		$this->db->where('ROLE', 'Administrator');
 		$query= $this->db->get();
 		if ($query->num_rows()==1) {
 			return true;
 		}
 		else{
 			return false;
 		}
 	}

 	//=========================
 	//==========================
 	//STAFF
 	//=========================
 	//=========================
 

 	//ADD STAFF
 	function add_staff($staff_info){
 		if($this->db->insert('staff', $staff_info)){
 			return true;
 		}
 		else{
 			return false;
 		}
 	}

 	//FETCH STAFF LIST
 	function fetch_staff_list(){
 		$this->db->select('*');
 		$this->db->from('staff');
 		$this->db->order_by('STAFF_ID', 'ASC');
 		$query=$this->db->get();
 		if($query->num_rows()>0){
 			return $query->result();
 		}
 		else{
 			return false;
 		}
 	}


 	//DELETE STAFF
 	function delete_staff($staff_id){
 		$this->db->where('STAFF_ID', $staff_id);
 		if($this->db->delete('staff')){
 			return true;
 		}
 		else{
 			return false;
 		}
 	}

 	//FETCH STAFF INFO
 	function fetch_staff_info($staff_id){
 		$this->db->select('*');
 		$this->db->from('staff');
 		$this->db->where('STAFF_ID', $staff_id);
 		$query=$this->db->get();
 		if($query->num_rows()==1){
 			return $query->row();
 		}
 		else{
 			return false;
 		}
 	}

 	//UPDATE STAFF ACCOUNT
 	function update_staff($staff){
 		$this->db->where('STAFF_ID', $staff['STAFF_ID']);
		if($this->db->update('staff', $staff)){
			return true;
		}
		else{
			return false;
		}
 	}


 	//FETCH LOGS
 	function fetch_logs(){
 		$this->db->select('STAFF.NAME, STAFF.ROLE, logs.TIME_LOGGED');
 		$this->db->from('logs');
 		$this->db->join('staff', 'staff.STAFF_ID=logs.STAFF_ID', 'left');
 		$this->db->order_by('logs.TIME_LOGGED', 'DESC');
 		$query=$this->db->get();
 		if($query->num_rows()>0){
 			return $query->result();
 		}
 		else{
 			return false;
 		}
 	}


 	//=========================
 	//==========================
 	//PRODUCTS
 	//=========================
 	//=========================
 

 	//ADD PRODUCT
 	function add_product($product){
 		if($this->db->insert('products', $product)){
 			return true;
 		}
 		else{
 			return false;
 		}
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


 	//FETCH PRODUCT INFO
 	function fetch_product_info($product_id){
 		$this->db->select('*');
 		$this->db->from('products');
 		$this->db->where('PRODUCT_ID', $product_id);
 		$query=$this->db->get();
 		if($query->num_rows()==1){
 			return $query->row();
 		}
 		else{
 			return false;
 		}
 	}

 	//UPDATE PRODUCT INFOMATION
 	function update_product($product){
 		$this->db->where('PRODUCT_ID', $product['PRODUCT_ID']);
		if($this->db->update('products', $product)){
			return true;
		}
		else{
			return false;
		}
 	}


 	//FETCH PRODUCT LIST TO BE USED IN SELECT2 PLUGIN
 	function fetch_product_list_select($search){
 		$this->db->select('PRODUCT_ID, PRODUCT');
 		$this->db->from('products');
 		$this->db->where('PRODUCT REGEXP', $search);
 		$query=$this->db->get();
 		return $query->result_array();
 	}



 	//=========================
 	//==========================
 	//SALES PRODUCTS
 	//=========================
 	//=========================
 

 	//ADD SALES PRODUCT
 	function add_sales_products($product){
 		$this->db->select('*');
 		$this->db->from('products_to_sell');
 		$this->db->where('PRODUCT_ID', $product['PRODUCT_ID']);
 		$this->db->where('DATE_ADDED', $product['DATE_ADDED']);
 		$query=$this->db->get();
 		if($query->num_rows()==1){
 			return false;
 		}
 		else{
 			if($this->db->insert('products_to_sell', $product)){
	 			return true;
	 		}
	 		else{
	 			return false;
	 		}
 		}
 		
 	}


 	//FETCH SALES PRODUCTS LIST FOR A PARTICULAR DATE
 	function fetch_sales_product_list($date){
 		$this->db->select('products.PRODUCT, products_to_sell.QUANTITY, products_to_sell.ID, products_to_sell.DATE_ADDED');
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


 	//FETCH PRODUCT INFO
 	function fetch_sales_product_info($id){
 		$this->db->select('products.PRODUCT, products_to_sell.QUANTITY, products_to_sell.ID, products.PRODUCT_ID');
 		$this->db->from('products_to_sell');
 		$this->db->join('products', 'products_to_sell.PRODUCT_ID=products.PRODUCT_ID', 'left');
 		$this->db->where('products_to_sell.ID', $id);
 		$query=$this->db->get();
 		if($query->num_rows()==1){
 			return $query->row();
 		}
 		else{
 			return false;
 		}
 	}


 	//UPDATE SALES PRODUCT INFOMATION
 	function update_sales_product($product){
 		$this->db->where('ID', $product['ID']);
		if($this->db->update('products_to_sell', $product)){
			return true;
		}
		else{
			return false;
		}
 	}


 	//UPDATE CAFETERIA NAME
 	function update_cafeteria_name($name){
		if($this->db->update('setting', $name)){
			return true;
		}
		else{
			return false;
		}
 	}



 	//FETCH DAILY SALES FOR THE CURRENT DAY
 	function fetch_daily_sales_report(){
 		$this->db->select('products.PRODUCT, SUM(sales.QUANTITY_SOLD) SALES, products.COST_PRICE, products.SALES_PRICE, sales.SALES_DATE');
 		$this->db->from('sales');
 		$this->db->join('products', 'products.PRODUCT_ID=sales.PRODUCT_ID', 'left');
 		$this->db->where('sales.SALES_DATE', date('Y-m-d'));
 		$this->db->group_by('sales.PRODUCT_ID');
 		$query=$this->db->get();
 		if($query->num_rows()>0){
 			return $query->result();
 		}
 		else{
 			return false;
 		}
 	}


 	//FETCH DAILY SALES FOR THE CURRENT DAY
 	function sales_report_day($date){
 		$this->db->select('products.PRODUCT, SUM(sales.QUANTITY_SOLD) SALES, products.COST_PRICE, products.SALES_PRICE, sales.SALES_DATE');
 		$this->db->from('sales');
 		$this->db->join('products', 'products.PRODUCT_ID=sales.PRODUCT_ID', 'left');
 		$this->db->where('sales.SALES_DATE', $date);
 		$this->db->group_by('sales.PRODUCT_ID');
 		$query=$this->db->get();
 		if($query->num_rows()>0){
 			return $query->result();
 		}
 		else{
 			return false;
 		}
 	}



 	//FETCH DAILY SALES FOR THE CURRENT DAY FOR A PARTICULAR STAFF USUALLY A CASHIER
 	function sales_report_day_staff($report){
 		$this->db->select('products.PRODUCT, products.COST_PRICE, products.SALES_PRICE, sales.SALES_DATE, sales.ORDER_NO, sales.QUANTITY_SOLD, staff.NAME, sales.STATUS');
 		$this->db->from('sales');
 		$this->db->join('products', 'products.PRODUCT_ID=sales.PRODUCT_ID', 'left');
 		$this->db->join('staff', 'sales.STAFF_ID=staff.STAFF_ID', 'left');

 		if($report['SALES_DATE']=="" and isset($report['MONTH'])){
 			$this->db->where('MONTH(sales.SALES_DATE)', $report['MONTH']);
 			$this->db->where('YEAR(sales.SALES_DATE)', date('Y'));
 		}
 		elseif(isset($report['SALES_DATE']) and $report['MONTH']==""){
 			$this->db->where('sales.SALES_DATE', $report['SALES_DATE']);
 		}
 		else{
 			$this->db->where('sales.SALES_DATE', date('Y-m-d'));
 		}
 		$this->db->where('sales.STAFF_ID', $report['STAFF_ID']);
 		$query=$this->db->get();
 		if($query->num_rows()>0){
 			return $query->result();
 		}
 		else{
 			return false;
 		}
 	}

 	//FETCH GENERAL DAILY SALES FOR THE CURRENT DAY
 	function sales_report_day_general($report){
 		$this->db->select('products.PRODUCT, products.COST_PRICE, products.SALES_PRICE, sales.SALES_DATE, sales.ORDER_NO, sales.QUANTITY_SOLD, staff.NAME, sales.STATUS');
 		$this->db->from('sales');
 		$this->db->join('products', 'products.PRODUCT_ID=sales.PRODUCT_ID', 'left');
 		$this->db->join('staff', 'sales.STAFF_ID=staff.STAFF_ID', 'left');

 		if($report['SALES_DATE']=="" and isset($report['MONTH'])){
 			$this->db->where('MONTH(sales.SALES_DATE)', $report['MONTH']);
 			$this->db->where('YEAR(sales.SALES_DATE)', date('Y'));
 		}
 		elseif(isset($report['SALES_DATE']) and $report['MONTH']==""){
 			$this->db->where('sales.SALES_DATE', $report['SALES_DATE']);
 		}
 		
 		$this->db->order_by('sales.STAFF_ID', 'DESC');
 		$this->db->order_by('staff.NAME', 'DESC');
 		$query=$this->db->get();
 		if($query->num_rows()>0){
 			return $query->result();
 		}
 		else{
 			return false;
 		}
 	}


 	//FETCH SALES RECORD BASED ON ORDER NUMBER
 	function sales_records_order_no($order_no){
 		$this->db->select('products.PRODUCT, sales.AMOUNT, sales.SALES_DATE, sales.ORDER_NO,, sales.SALES_ID, sales.QUANTITY_SOLD, staff.NAME, sales.STATUS');
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


 	//FETCH MONTHLY SALES FOR A PARTICULAR MONTH AND YEAR
 	function sales_report_month($month){
 		$this->db->select('products.PRODUCT, SUM(sales.QUANTITY_SOLD) SALES, products.COST_PRICE, products.SALES_PRICE');
 		$this->db->from('sales');
 		$this->db->join('products', 'products.PRODUCT_ID=sales.PRODUCT_ID', 'left');
 		$this->db->where('MONTH(sales.SALES_DATE)', $month['MONTH']);
 		$this->db->where('YEAR(sales.SALES_DATE)', $month['YEAR']);
 		$this->db->group_by('sales.PRODUCT_ID');
 		$query=$this->db->get();
 		if($query->num_rows()>0){
 			return $query->result();
 		}
 		else{
 			return false;
 		}
 	}


 	//FETCH ANNUAL REPORTS FOR A PARTICULAR YEAR
 	function sales_report_annual($year){
 		$this->db->select('products.PRODUCT, SUM(sales.QUANTITY_SOLD) SALES, products.COST_PRICE, products.SALES_PRICE');
 		$this->db->from('sales');
 		$this->db->join('products', 'products.PRODUCT_ID=sales.PRODUCT_ID', 'left');
 		$this->db->where('YEAR(sales.SALES_DATE)', $year);
 		$this->db->group_by('sales.PRODUCT_ID');
 		$query=$this->db->get();
 		if($query->num_rows()>0){
 			return $query->result();
 		}
 		else{
 			return false;
 		}
 	}


 	//CANCEL ALL ORDERS
 	function cancel_orders_all($order_no){
 		$this->db->select('PRODUCT_ID, QUANTITY_SOLD,SALES_DATE');
 		$this->db->from('sales');
 		$this->db->where('ORDER_NO', $order_no);
 		$this->db->where('STATUS', "Confirmed");
 		$query=$this->db->get();
 		if($query->num_rows()>0){

 			$sales=$query->result();

 			foreach ($sales as $sales) {
 				$product=$sales->PRODUCT_ID;
 				$quantity=$sales->QUANTITY_SOLD;
 				$date=$sales->SALES_DATE;

 				$this->db->set('QUANTITY', "QUANTITY+$quantity", FALSE);
 				$this->db->where('PRODUCT_ID', $product);
 				$this->db->where('DATE_ADDED', $date);
 				if($this->db->update('products_to_sell')){

 					$this->db->set('STATUS', "Canceled");
 					$this->db->where('ORDER_NO', $order_no);
 					$this->db->update('sales');		

					return true;
				}
				else{
					return false;
				}
 			}



 		}
 	}




 	


 	






}


?>