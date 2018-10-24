<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cashier extends CI_Controller {

	public function __construct(){
        parent::__construct();
    
        $this->load->model('cashier_model');


    }	

	//VERIFY USER FOR SECURITY PURPOSES
    public function verify(){
    	if(is_null($this->session->userdata('username')) && is_null($this->session->userdata('password'))){
			redirect(base_url());
		}
		else{
			if($this->cashier_model->verify_user($this->session->userdata('username'),$this->session->userdata('password'))==false){
				redirect(base_url());
			}
		}
    }

    //DASHBOARD
	public function index(){
		$this->verify();
		$data['title']=$this->cashier_model->fetch_cafeteria()->NAME." :: Dashboard";
		$data['cafeteria']=$this->cashier_model->fetch_cafeteria()->NAME;
		$this->load->view('cashier/parts/head', $data);
		$this->load->view('cashier/dashboard', $data);
		$this->load->view('cashier/parts/bottom', $data);
	}
	




	//FETCH SUBEJCT LIST [TO BE USED IN SELECT2 PLUGIN]
	public function get_product_list_plugin(){
		$this->verify();
		$products=$this->cafeteria_model->fetch_product_list_select($_GET['search']);
		foreach ($products as $key => $value) {
			$data[] = array('id' => $value['PRODUCT_ID'], 'text' => $value['PRODUCT']);			 	
   		}
		echo json_encode($data);
	}


	//FETCH SALES PRODUCTS LIST FOR A PARTICULAR DATE
	public function fetch_sales_product_list(){
		$data['products']=$this->cashier_model->fetch_sales_product_list(date('Y-m-d'));
		$this->load->view('cashier/products/salesproducts', $data);
	}



	public function submitOrders(){
		$this->verify();
		$this->load->helper('string');
		$orders=$_POST['customerOrders'];
		$order_number=random_string('numeric', 6);
		foreach ($orders as $order) {
			$order=array(
				'ORDER_NO'=> $order_number,
				'PRODUCT_ID'=>$order['product'],
				'QUANTITY_SOLD'=>$order['quantity'],
				'AMOUNT'=>$order['amount'],
				'SALES_DATE'=>date('Y-m-d'),
				'STAFF_ID'=>$_SESSION['staff_id'],
				'STATUS'=>"Confirmed"
			);
			$this->cashier_model->process_sales($order);
		}	
		$data['ticket']=$this->cashier_model->fetch_ticket($order['ORDER_NO']);

		echo $order['ORDER_NO'];
	}


	public function get_order_info($order_no){
		$data['cafeteria']=$this->cashier_model->fetch_cafeteria()->NAME;
		$data['order']=$this->cashier_model->fetch_order_info($order_no);
		$this->load->view('cashier/sales/salesdetails', $data);
	}



	 //QUERY PAGE
	public function query(){
		$this->verify();
		$data['title']=$this->cashier_model->fetch_cafeteria()->NAME." :: Query Ticket";
		$data['cafeteria']=$this->cashier_model->fetch_cafeteria()->NAME;
		$this->load->view('cashier/parts/head', $data);
		$this->load->view('cashier/query/query', $data);
		$this->load->view('cashier/parts/bottom', $data);
	}

	//SEARCH SALES RECORD 
	public function query_sales_record(){
		$this->verify();

		$this->load->library('form_validation');
		$this->form_validation->set_rules('query', 'Order No', 'required|numeric');
		if($this->form_validation->run()){
			$data['cafeteria']=$this->cashier_model->fetch_cafeteria()->NAME;
			$data['order']=$this->cashier_model->query_sales_record($this->input->post('query'));
			$this->load->view('cashier/query/salesdetails', $data);
		}
	}
	





	






	
	
	
	

    






	
	


}
