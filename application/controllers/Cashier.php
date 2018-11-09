<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cashier extends CI_Controller {

	public function __construct(){
        parent::__construct();
    
        $this->load->model('cashier_model');
        $this->load->model('cafeteria_model');


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
	



	//FETCH SALES PRODUCTS LIST FOR A PARTICULAR DATE
	public function fetch_sales_product_list(){
		$data['products']=$this->cashier_model->fetch_sales_product_list(date('Y-m-d'));
		$this->load->view('cashier/products/salesproducts', $data);
	}



	public function submitOrders(){
		//$this->verify();
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


	public function cashier_current_sales(){
		echo $this->cashier_model->cashier_sales_day($_SESSION['staff_id']);
	}



	//MY PROFILE
	public function my_profile(){
		$this->verify();
		$data['title']=$this->cashier_model->fetch_cafeteria()->NAME." :: Dashboard";
		$this->load->view('cashier/parts/head', $data);
		$this->load->view('cashier/profile', $data);
		$this->load->view('cashier/parts/bottom', $data);
	}


	//UPDATE PASSWORD 
	public function update_password(){
		$this->verify();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');
		if($this->form_validation->run()){

			$password=md5(strtolower(trim($this->input->post('password'))));
			
			if($this->cashier_model->update_password($password)){
				echo "Password has been changed";
				$_SESSION['password']=$password;
			}
			
		}
		else{
			$error='';
			if(form_error('password')){
				$error.=form_error('password');
			}

			if(form_error('cpassword')){
				$error.=form_error('cpassword');
			}
			echo $error;
		}
	}


	public function staff_orders_no(){
		$order=$this->cafeteria_model->fetch_no_order_staff();
		echo $order;
	}

	public function change(){
		$data['title']=$this->cashier_model->fetch_cafeteria()->NAME." :: Change";
		$data['cafeteria']=$this->cashier_model->fetch_cafeteria()->NAME;
		$this->load->view('cashier/parts/head', $data);
		$this->load->view('cashier/change/change', $data);
		$this->load->view('cashier/parts/bottom', $data);
	}

	 public function pinGenerator(){
	 	$this->load->helper('string');
		return random_string('numeric', 6);
	 }


	//GENERATE PIN
		public function generatePin(){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('phone', 'Phone', 'required');
			$this->form_validation->set_rules('amount', 'Amount', 'required|numeric');
			if($this->form_validation->run()){
				$pinData=array(
					'PIN'=>$this->pinGenerator(),
					'NAME'=>ucwords($this->input->post('name')),
					'PHONE'=>trim($this->input->post('phone')),
					'AMOUNT'=>$this->input->post('amount'),
					'STATUS'=>"NOT PAID",
					'CREATED_BY'=>$_SESSION['staff_id'],
					'DATE_CREATED'=>date('Y-m-d H:i:s')
					);
				echo $this->cashier_model->create_pin($pinData);
			}
			else{
				$error="";

				if(form_error('name')){
					$error.=form_error('name');
				}

				if(form_error('phone')){
					$error.=form_error('phone');
				}

				if(form_error('amount')){
					$error.=form_error('amount');
				}

				echo $error;
			}
		}


	//PRINTABLE PIN PAGE
	public function get_pin($pin){
		$data['pin']=$this->cashier_model->fetch_pin($pin);
		$data['cafeteria']=$this->cashier_model->fetch_cafeteria()->NAME;
		$this->load->view('cashier/change/pin', $data);
	}

	//GET PIN INFORMATION
		public function get_pin_info(){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('pin', 'Pin', 'required|numeric');
			if($this->form_validation->run()){
				$data['pin']=$this->cashier_model->search_pin($this->input->post('pin'));
				$this->load->view('cashier/change/pininfo', $data);
			}
		}

		//CLEARED CHANGE
		public function pay_change(){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('pin_id', 'Pin', 'required|numeric');
			if($this->form_validation->run()){
				echo $this->cashier_model->pay_change($this->input->post('pin_id'));
			}
		}



		//GET CHANGE SUMMARY FOR A STAFF

		public function change_summary(){
			$data['not_paid_day']=$this->cashier_model->change_not_paid_by_staff_day($_SESSION['staff_id']);
			$data['not_paid_month']=$this->cashier_model->change_not_paid_by_staff_month($_SESSION['staff_id']);

			$this->load->view('cashier/change/summary', $data);
		}




	






	
	
	
	

    






	
	


}
