<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('Main_modal','',TRUE);
		$this->load->library('form_validation');
		date_default_timezone_set('Asia/Bangkok');
	}

	//New
	function index()
	{
		if($this->session->userdata('log_in'))
		{
			$data['firstChart'] = $this->Main_modal->firstChart();

			$this->load->view('dashboard', $data);
		}
		else
		{
			redirect('Main/login');
		}
	}

	//new
	function menus()
	{
		if($this->session->userdata('log_in'))
		{
			$data['menus'] = $this->Main_modal->getItems();
			$this->load->view('menus',$data);
		}
		else
		{
			redirect('Main/login');
		}
	}

	//new
	function customers()
	{
		if($this->session->userdata('log_in'))
		{
			$data['customers'] = $this->Main_modal->customers();
			$this->load->view('customers',$data);
		}
		else
		{
			redirect('Main/login');
		}
	}

	//new
	function updatecustomer()
	{
		if($this->session->userdata('log_in'))
		{
			$data['updatecustomer'] = $this->Main_modal->updatecustomer();
			$this->load->view('customers',$data);
		}
		else
		{
			redirect('Main/login');
		}
	}	

	//new
	function customerdelete()
	{
		if($this->session->userdata('log_in'))
		{
			$data['customerdelete'] = $this->Main_modal->customerdelete();
			$this->load->view('customers',$data);
		}
		else
		{
			redirect('Main/login');
		}
	}	

	//new
	function invoice()
	{
		if($this->session->userdata('log_in'))
		{
			$orderId = $this->uri->segment(3);
			$data['orderDetails'] = $this->Main_modal->orderDetails($orderId);
			$data['orders'] = $this->Main_modal->orders($orderId);


			$this->load->view('invoice',$data);
		}
		else
		{
			redirect('Main/login');
		}
	}

	//check mobile number
	function checkMobile()
	{
		$mobileNumber = $this->input->post('mobileNumber');

		echo $data['result'] = $this->Main_modal->checkMobile($mobileNumber);
	}

	function checkMobileExists()
	{
		$mobileNumber = $this->input->post('mobileNumber');

		echo $data['result'] = $this->Main_modal->checkMobileExists($mobileNumber);
	}

	//new
	function newOrder()
	{
		if($this->session->userdata('log_in'))
		{
			$data['menus'] = $this->Main_modal->getItems();
			$data['products'] = $this->Main_modal->allProducts();
			$this->load->view('newOrder',$data);
		}
		else
		{
			redirect('Main/login');
		}
	}

	//New
	function addOrder()
	{
		$result = $this->Main_modal->addOrder();

		redirect('Main/invoice/'.$result);
	}

	//New
	function login()
	{
		if(!$this->session->userdata('log_in'))
		{
			$this->load->view('login');
		}
		else
		{
			redirect('Main/');
		}
	}

	//New
	public function ajaxPrice()
	{
		$name = $this->input->post('product');
		$result = $this->Main_modal->ajaxPrice($name);
		echo $result;
	}

	//New
	function todaysOrder()
	{
		$data['todaysOrder'] = $this->Main_modal->todaysOrder();
		$this->load->view('todaysOrder', $data);
	}

	function updateStatus()
	{
		$updateStatus = $this->Main_modal->updateStatus();
		if($updateStatus)
		{
			echo "yes";
		}	
	}

	//New
	function allOrder()
	{
		$data['allOrder'] = $this->Main_modal->allOrder();
		$this->load->view('allOrder', $data);
	}

	//New
	function loginchk()
	{
		$this->form_validation->set_rules('username', 'User Name', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if($this->form_validation->run() == FALSE)
		{
			redirect('Main/login/incorrect');
		}
		else
		{
			$res = $this->Main_modal->loginchk();

			if($res == "wrong")
			{
				redirect('Main/login/incorrect');
			}
			else
			{
				foreach($res as $row)
				{
					$sess_array = array(
								'email' => $row->username,
								'name' => 'Admin'
								);
					$this->session->set_userdata('log_in', $sess_array);
				}

				redirect('Main/index');	
			}
			
		}
	}

	//New
	function additem()
	{
		$this->form_validation->set_rules('itemName', 'Item', 'trim|required|is_unique[items.itemName]');
		$this->form_validation->set_rules('itemPrice', 'Price', 'trim|required');
		$this->form_validation->set_message('is_unique', 'This Item already exists!!');
		if($this->form_validation->run() == FALSE)
		{
			$this->menus();
		}
		else
		{
			$this->Main_modal->addmenu();
			redirect('Main/menus/added');
		}
	}

	//New
	function updatemenu()
	{
		$id = $this->input->post('id');
		$itemname = $this->input->post('itemname');
		$itemprice = $this->input->post('itemprice');
		$array = array(
					'itemName' =>$itemname ,
					'itemPrice' =>$itemprice 
					);
		$this->Main_modal->updatecategory($array, $id);
		echo 'done';
	}

	//New
	function deleteItem()
	{
		$id = $this->input->post('itemId');
		$this->Main_modal->deleteItem($id);
		echo 'done';
	}

	function logout()
	{	
	   session_destroy();
	   redirect('Main');
	}
}