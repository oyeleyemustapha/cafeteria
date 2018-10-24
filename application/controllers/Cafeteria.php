<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cafeteria extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('cafeteria_model');  

    }

    
	//HOME PAGE
	public function index(){
		$data['cafeteria_name']=$this->cafeteria_model->fetch_cafeteria()->NAME;
		$this->load->view('login' , $data);
	}

	//PROCESS LOGIN
	public function login(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if($this->form_validation->run()){
			$username=strtoupper(trim($this->input->post('username')));
			$password=md5(strtolower(trim($this->input->post('password'))));
			if($this->cafeteria_model->process_login($username, $password)){
				$staff=$this->cafeteria_model->process_login($username, $password);
					$staff_id=$staff->STAFF_ID;
					$username=$staff->USERNAME;
					$password=$staff->PASSWORD;
					$name=$staff->NAME;
					$role=$staff->ROLE;
					$session_data=array(
						'username' => $username, 
						'password' => $password, 
						'staff_id'=>$staff_id, 
						'name'=>$name,
						'role'=>$role
					);

					$log=array(
						'STAFF_ID'=>$staff_id,
						'TIME_LOGGED'=>time()
					);

				$this->cafeteria_model->log_staff($log);
				$this->session->set_userdata($session_data);

				switch ($role) {
					case 'Administrator':
						redirect(base_url()."administrator");	
						break;
					case 'Supervisor':
						redirect(base_url()."supervisor");	
						break;
					case 'Cashier':
						redirect(base_url()."cashier");	
						break;
					case 'Stock Manager':
						redirect(base_url()."stock-manager");	
						break;
				}	
			}
			else{
				$this->session->set_flashdata('error', 'Invalid Username or password');
				redirect(base_url());
			}	
		}
		else{
			$this->index();
		}
	}

	//LOGOUT
	public function logout(){
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('password');
		$this->session->unset_userdata('staff_id');
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('role');
		redirect(base_url());
	}

	//VERIFY USER FOR SECURITY PURPOSES
    public function verify(){
    	if(is_null($this->session->userdata('username')) && is_null($this->session->userdata('password'))){
			redirect('admin');
		}
		else{
			if($this->cafeteria_model->verify_user($this->session->userdata('username'),$this->session->userdata('password'))==false){
				redirect(base_url());
			}
		}
    }
	

	//==============================
    //==============================
    //ADMINISTRATOR
    //==============================
    //==============================

	public function administrator(){
		$this->verify();
		$data['admin']=$this->admin_model->fetch_admin_list();
		$data['pageTitle']="Administrator";
		$this->load->view('parts/head',$data);
		$this->load->view('administrator/admin',$data);
		$this->load->view('parts/bottom',$data);
	}
		
	//ADD ADMINISTRATOR
	public function add_admin(){
		$this->verify();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[admin.USERNAME]', array('is_unique' => 'Username has been taken'));
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('cpassword', 'Password', 'required|matches[password]');
		if($this->form_validation->run()){
			$admin_info=array(
				'NAME'=>trim($this->input->post('name')),
				'USERNAME'=>strtolower(trim($this->input->post('username'))),
				'PASSWORD'=>md5(strtolower(trim($this->input->post('password')))),
			);
			if($this->admin_model->add_admin($admin_info)){
				echo "Administrator has been added";
			}
		}
		else{

			if(form_error('name')){
				echo form_error('name');
			}

			if(form_error('username')){
				echo form_error('username');
			}

			if(form_error('password')){
				echo form_error('password');
			}

			if(form_error('cpassword')){
				echo form_error('cpassword');
			}
		}
	}


	//UPDATE ADMINISTRATOR
	public function update_admin(){
		$this->verify();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('admin_id', 'ADMIN ID', 'required|numeric');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('cpassword', 'Password', 'required|matches[password]');
		if($this->form_validation->run()){
			$admin_info=array(
				'NAME'=>trim($this->input->post('name')),
				'USERNAME'=>strtolower(trim($this->input->post('username'))),
				'PASSWORD'=>md5(strtolower(trim($this->input->post('password')))),
				'ADMIN_ID'=>$this->input->post('admin_id')
			);

			if($this->admin_model->update_admin($admin_info)){

				if($_SESSION['admin_id']==$this->input->post('admin_id')){
					$session_data=array('username' => $admin_info['USERNAME'], 'password' => $admin_info['PASSWORD'], 'name'=> $admin_info['NAME']);
					$this->session->set_userdata($session_data);
					echo "Administrator has been updated";
				}
				else{
					echo "Administrator has been updated";
				}
			}
		}
		else{
			if(form_error('username')){
				echo form_error('username');
			}

			if(form_error('password')){
				echo form_error('password');
			}

			if(form_error('cpassword')){
				echo form_error('cpassword');
			}
		}
	}

	//DELETE ADMINISTRATOR
	public function delete_admin(){
		$this->verify();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('admin_id', 'Admin ID', 'required|numeric');
	
		if($this->form_validation->run()){

			if($_SESSION['admin_id']==$this->input->post('admin_id')){
				echo "You can't delete your account while logged in";
			}
			else{
				if($this->admin_model->delete_admin($this->input->post('admin_id'))){
					echo "Administrator has been deleted";
				}
			}
		}
	}

	//FETCH ADMINISTRATOR INFO
	public function fetch_admin_info(){
		$this->verify();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('admin_id', 'Admin ID', 'required|numeric');
		if($this->form_validation->run()){
			$data['admin']= $this->admin_model->fetch_admin_info($this->input->post('admin_id'));
			$this->load->view('administrator/adminInfo', $data);
		}
	}

	


}
