<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Products extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }    

    public function index()
    {
		
		$data['title'] = 'PenziPet shop';
		$data['products']= $this->product_model->getRows();
        $data['cartItems'] = $this->cart->contents();
		$this->load->view('common/header',$data); 		// Load the  header view
        $this->load->view('main/shop',$data);// Load the product shop view 
		$this->load->view('common/footer',$data);		// Load the footer view
    }
public function getProductdetails(string $id){
		$data['title'] = 'Product View';
		$data['products']= $this->product_model->getRows();
        $data['cartItems'] = $this->cart->contents();
        $output = $this->product_model->getProductDetails($id, 'id');
        if($output){
            $data['product'] = $output;
            $this->load->view('common/header',$data);
            $this->load->view('main/product_view');
            $this->load->view('common/footer');
        }else{
            $data['heading'] = '404 Page Not Found';
            $data['message'] = 'The page you requested was not found.';
            $this->load->view('errors/html/error_404',$data);
        }
	}
	public function addToCart($proID){
        
        // Fetch specific product by ID
        $product = $this->product_model->getRows($proID);
        // Add product to the cart
			$data = array(
				'id'    => $product['id'],
				'qty'    => 1,	
				'price'    => $product['price'],
				'name'    => $product['name'],
				'image' => $product['image']
			);
			if ($this->cart->insert($data)) {
				// $message = array('response' => 'success', 'message' => $product['name'].' added to cart');
				redirect('cart');
			} else {
				// $message = array('response' => 'warning', 'message' => 'Something went | try again later');
			}
		
        // echo json_encode($message);
    }

public function cart(){
		$data['title'] = 'PenziPet Cart';
        $data['cartItems'] = $this->cart->contents(); // Retrieve cart data from the session
		$this->load->view('common/header',$data); 		// Load the  header view
        $this->load->view('pages/cart', $data);  // Load the cart view
		$this->load->view('common/footer',$data);		// Load the footer view
    }
	// Function for removing item from cart
	public function remove_item_from_cart($row_id)
	{
		$row = $this->cart->get_item($row_id);
		$remove_item = array(
			'rowid' => $row_id,
			'qty' => 0
		);
		if ($this->cart->update($remove_item)) {
			$message = array('response' => 'success', 'message' => $row['name'].' removed from cart.');
		} else {
			$message = array('response' => 'error', 'message' => 'Something went wrong | try again later.');
		}
		echo json_encode($message);
	}

	// Function for reducing cart items.
	public function decrement_cart_items($rowid)
	{
		$row = $this->cart->get_item($rowid);
		$increment = array(
			'rowid' => $rowid,
			'qty' => $row['qty'] - 1
		);
		if ($this->cart->update($increment)) {
			$message = array('response' => 'success', 'message' => ''.$row['name'].' quantity has been updated');
		} else {
			$message = array('response' => 'error', 'message' => 'Something went wrong | try again later.');
		}
		echo json_encode($message);
	}

	// Function for increasing cart items
	public function increment_cart_items($rowid)
	{
		$row = $this->cart->get_item($rowid);
		$increment = array(
			'rowid' => $rowid,
			'qty' => $row['qty'] + 1
		);

		if ($this->cart->update($increment)) {
			$message = array('response' => 'success', 'message' => 'One item added to '.$row['name']);
		} else {
			$message = array('response' => 'error', 'message' => 'Something went wrong | try again later.');
		}
		echo json_encode($message);
	}

	public function checkOut()
    {
        if ($this->session->userdata('user_login') != 1) {
            $this->session->set_userdata('redirect-url', base_url('checkout'));
            redirect('account_login');
        }else{
            if($this->cart->total() > 0){
				$data['title'] = 'Checkout Page';// Retrieve cart data from the session
				$data['cartItems'] = $this->cart->contents();
				$data['custData']=$this->auth_model->getuserinfo($this->session->userdata('user_id'));
				$this->load->view('common/header',$data); 		// Load the  header view
				$this->load->view('pages/checkout',$data);       // Load the product shop view 
				$this->load->view('common/footer',$data);
            }else{
                $this->session->set_flashdata('warning','Your shipping cart is empty.');
                redirect('');
            }
        }
    }

	public function checkout_user(){
		$amount = $this->cart->total(); //gets the cart total
       if($amount > 0){}
	    // validate form inputs and return error messages if inputs are incorrect or missing
		$this->form_validation->set_rules('firstname', 'Firstname', 'trim|required');
		$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required');
		$this->form_validation->set_rules('address', 'Address', 'trim|required');

        if ($this->form_validation->run() == false) {
            $message = array(
				'firstname_error' => form_error('firstname'),
				'lastname_error' => form_error('lastname'),
				'email_error' => form_error('email'),
				'phone_error' => form_error('phone'),
				'address_error' => form_error('address')
			);
        }else{
			$user_id = $this->session->userdata('user_id');

			$formData = array(
				'user_id'       => $this->session->userdata('user_id'),
				'firstname' =>html_escape($this->input->post('firstname')),
				'lastname' 	=>html_escape($this->input->post('lastname')),
				'email' 	=>html_escape($this->input->post('email')),
				'phone' 	=>html_escape($this->input->post('phone')),
				'address' 	=>html_escape($this->input->post('address')),
			);
			$result = $this->auth_model->addAddress('address', $formData);
			if($result) {
				$message = '';
				// order creation
				$order = rand(9999, 100000); //creates random order number for id
				$orderId = ('PPORD'.$order);
				$this->session->set_userdata('orderid', $orderId); //saves the order id in the session
				$user_order = $this->session->userdata('orderid');
				$cart = $this->cart->contents();//gets cart contents
				$orderData = array(
					'order_id' => $user_order,
					'customer_id' => $this->session->userdata('user_id'),
					'grand_total' => $amount,
					'is_paid' => 0,
					'order_note' => html_escape($this->input->post('address')),	
					'payment_mode' => 'Payment on delivery',
					'order_status' => 'Pending'
				);
				// saves order data into DB
				$order_id = $this->product_model->insertOrders('orders', $orderData);
				if($order_id){
					$message = array('response' => 'success', 'message' => '✔✔✔ Address successful Entered.');
				}else{
					$message = array('response' => 'error', 'message' => 'Something went wrong |Please try again later.');
				}
				if ($cart){
					foreach ($cart as $cartItems):
						$checkCartData = $this->product_model->getCart('cart', $user_id, $cartItems['id'], 0);
						$product_quantity = $this->db->get_where('products', array('id' => $cartItems['id']))->row()->product_quantity;
						$data = array(
							'order_id' => $user_order,
							'user_id' => $this->session->userdata('user_id'),
							'product_id' => $cartItems['id'],
							'product_qty' => $cartItems['qty'],
							'product_name' => $cartItems['name'],
							'product_price' => $cartItems['price']
						);
						// insert  ordered data into database
						$this->product_model->insert_order_items('cart', $data);	

						// get new product quantity ( DB product quantity - Carts product quantity)
						$productQTY = ($product_quantity - $cartItems['qty']);
						// update new product quantity to database
						$this->product_model->updateProductQTY('products', $cartItems['id'], $productQTY);	

						$notificationData = array(
							'message' => 'You have a new order',
							'order_id' => $user_order,
							'user_id' => $this->session->userdata('user_id'),
						);
						// insert notification in notification table
						$this->product_model->insertNotification('notifications', $notificationData);
						// after checkout destroy cart to zero
						$this->cart->destroy();
						$this->session->unset_userdata('order_id'); // unsets order id from session after complete
					endforeach;
				}
			}
			echo json_encode($message);
		}
	}

	public function orderSuccess(){
        $data['title'] = "Order success Page";
        $data['cartItems'] = $this->cart->contents();
		$data['order'] = $this->product_model->getorderinfo($this->session->userdata('order_id'));
		$this->load->view('common/header',$data);
		$this->load->view('pages/order_success', $data);// Load order details view
		$this->load->view('common/footer',$data);

        // this should return something
	}
}
/* End of file Products.php and path /application/controllers/Product/Products.php */
