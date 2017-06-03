<?php
class Main_modal extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
		$this->load->helper('url'); 
	}

	//new
	function addmenu()
	{
		$itemName = $this->input->post('itemName');
		$itemPrice = $this->input->post('itemPrice');
		$data = array(
					'itemId' => '',
					'itemName' => $itemName,
					'itemPrice' => $itemPrice
					);
		$this->db->insert('items',$data);
		return true;
	}

	//New
	function getItems()
	{
		$this->db->select('*');
		$this->db->from('items');
		$r = $this->db->get();
		return $r->result();
	}

	//New
	function todaysOrder()
	{
		$date = date('Y-m-d');
		$this->db->select('orders.*, customerdetails.*');
		$this->db->from('orders');
		$this->db->join('customerdetails', 'orders.customerMobile = customerdetails.customerMobile');
		$this->db->where('DATE(orders.orderDate)', $date);
		$r = $this->db->get();
		return $r->result();
	}

	//New
	function updatecategory($array,$id)
	{
		$this->db->where('itemId',$id);
		$this->db->update('items',$array);

		return true;
	}

	//New
	function deleteItem($id)
	{
		$this->db->where('itemId',$id);
		$this->db->delete('items');

		return true;
	}

	
	function blogDetails($blogId)
	{
		$this->db->select('*');
		$this->db->from('blogs');
		$this->db->where('blogId', $blogId);
		$r = $this->db->get();
		return $r->result();
	}

	function loginchk()
	{
		$email = $this->input->post('username');
		$password = $this->input->post('password');

		$this->db->select('*');
		$this->db->from('login');
		$this->db->where('username', $email);
		$this->db->where('password', $password);
		$query = $this->db->get();

		$count = $query->num_rows(); 

		if($count == 0)
		{
			echo "wrong";
		}
		else
		{
			return $query->result();
		}
	}

	function checkMobile($mobileNumber)
	{
		$this->db->select('*');
		$this->db->from('customerdetails');
		$this->db->where('customerMobile', $mobileNumber);
		$query = $this->db->get();
		$result = $query->result();
		$count = $query->num_rows(); 

		if($count == 0)
		{
			echo "no";
		}
		else
		{
			foreach($result as $value){
				echo '<tr>
 						<td>'.ucwords($value->customerName).'</td>
 						<td>'.$value->customerMobile.'</td>
 						<td>'.$value->customerEmail.'</td>
 						<td>'.$value->CustomerAge.'</td>
 						<td>'.ucwords($value->customerAddress).'</td>
 						<td><input type="submit" class="btn btn-primary btn-sm" value="Select" onclick="setMobileNo(\''.$value->customerMobile.'\'); return false;">
 						</td>
 					</tr>';
			}	
		}
	}

	function ajaxPrice($name)
	{
		$this->db->select('*');
		$this->db->from('items');
		$this->db->where('itemName', $name);
		$query = $this->db->get();
		$result = $query->result();

		if($result)
		{
			foreach($result as $value)
			{
				echo $value->itemPrice;
			}
		}
		else
		{
			echo "no";
		}
	}

	function allProducts()
	{
		$this->db->select('*');
		$this->db->from('items');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	function addOrder()
	{
		$this->db->trans_begin();

		$guestType = $this->input->post('guestType');

		$paymentType = $this->input->post('paymentType');

		if($guestType == 'new')
		{
			$fullName = $this->input->post('fullName');
			$mobileNumber = $this->input->post('mobileNumber');
			$email = $this->input->post('email');
			$address = $this->input->post('address');

			//Insert into customer details
			$array = array("customerId" => "",
							"customerName" => $fullName,
							"customerEmail" => $email,
							"customerMobile" => $mobileNumber,
							"CustomerAge" => "",
							"CustomerGender" => "",
							"customerAddress" => $address,	
							);
			$this->db->insert('customerdetails', $array);

		}
		else
		{
			$mobileNumber = $this->input->post('selectedGuest');

		}

		$productname = $this->input->post('productName');
		$productQuantity = $this->input->post('productQuantity');
		$priceProduct = $this->input->post('priceProduct');
		$amount = $this->input->post('amount');

		$a = 0;
		foreach($amount as $v)
		{
			$a += $v;
		}

		$now = date('Y-m-d H:m:s');
		//Order insert
		$orders = array("orderId" => "",
							"customerMobile" => $mobileNumber,
							"totalAmount" => $a,
							"paymentType" => $paymentType,
							"orderStatus" => "pending",
							"orderDate" => $now
							);
		$this->db->insert('orders', $orders);

		$last_id = $this->db->insert_id();

		foreach ($productname as $key => $value) {
			
			$price = $priceProduct[$key];
			$quantity = $productQuantity[$key];  

			$productOrder = array(
								"orderItemId" => "",
								"itemName" => $value,
								"quantity" => $quantity,
								"price" => $price,
								"orderId" => $last_id
							);
			$this->db->insert('orderitems', $productOrder);
		}

		if ($this->db->trans_status() === FALSE)
		{
		        $this->db->trans_rollback();
		}
		else
		{
		        $this->db->trans_commit();
		}

		return $last_id;
	}

	function orderDetails($orderId)
	{
		$this->db->select('*');
		$this->db->from('orders');
		$this->db->join('customerdetails', 'customerdetails.customerMobile =  orders.customerMobile');
		$this->db->where('orderId', $orderId);

		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	function orders($orderId)
	{
		$this->db->select('*');
		$this->db->from('orderitems');
		$this->db->where('orderId', $orderId);

		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	function firstChart()
	{
		$stop_date = date('Y-m-d');
		
		$array = array();

		for ($i=1; $i<= 7 ; $i++) { 
			$stop_date = date('Y-m-d', strtotime($stop_date . '-1 day'));
			$array[$i] = $stop_date;
		}
		
		$sales = array();
		foreach ($array as $key => $value) {
			$this->db->select('*');
			$this->db->from('orders');
			$this->db->where('date(orderDate)', $value);

			$query = $this->db->get();
			$result = $query->result();
			$amount = 0;
			foreach($result as $k)
			{
				$amount += $k->totalAmount;
			}
			$sales[$key] = $amount;
		}

		$finalArray = array("days" => $array, "sales" => $sales);
		return $finalArray;
	}
}