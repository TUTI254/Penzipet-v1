<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{	$data['title'] = ' Welcome to Penzi pet store';
		$data['cartItems'] = $this->cart->contents();
		$data['products']= $this->product_model->getRows();
		// $data['trendy'] = $this->product_model->getTrend();
		$this->load->view('home',$data);
	}

	public function getCategory(){
		$result = $this->home_model->getCategories();
		echo json_encode($result);
	}

	public function getByPet(){
		$result = $this->home_model->getByPet();
		echo json_encode($result);
	}

	public function getByBrand(){
		$result = $this->home_model->getByBrand();
		echo json_encode($result);
	}

	public function get_newsletter_emails(){
        $this->form_validation->set_rules(
            'new_user',
            'Email Address',
            'trim|required|valid_email|is_unique[newsletters.customer_email]',
            array('is_unique' => 'The %s you provided already exists. Try another one', 'required' => 'Please provide an email address to continue.')
        );

        if ($this->form_validation->run() == false) {
            $message = array(
                'emailValidation_error' => form_error('new_user')
            );
        } else {
            $customerEmail = $this->input->post('new_user');
            $formData = array(
                'customer_email' => $customerEmail
            );
            if ($this->home_model->save_new_customer_email('newsletters', $formData)) :
				// sendNewsletter();
                $message = array('response' => 'success', 'message' => 'Thank you for subscribing');
				else :
                $message = array('response' => 'error', 'message' => 'Something went wrong | try again later');
            endif;
        }
        echo json_encode($message);
    }

	public function sendNewsletter(){
		$htmlContent = '<h1>HTML email testing by CodeIgniter Email Library</h1>';
		$htmlContent .= '<p>You can use any HTML tags and content in this email.</p>';
		$customerEmail = $this->input->post('new_user');
		$formData = array(
			'customer_email' => $customerEmail
		);
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		$this->email->to($customerEmail);
		$this->email->from('penzi@gmail.com','Pennzi');
		$this->email->subject('Newsletter Subscription');
		$this->email->message('thank you for subscribing to our Newsletters ,you will be among the first to receive great news and discounts on our products.');
		$this->email->send();
	}

	public function send_customer_email(){
		$this->form_validation->set_rules('f_name', 'first name', 'required');
		$this->form_validation->set_rules('l_name', 'last name', 'required');
		$this->form_validation->set_rules('email', 'email address', 'required|valid_email');
		$this->form_validation->set_rules('subject', 'subject', 'required');
		$this->form_validation->set_rules('message', 'message', 'required');

		if ($this->form_validation->run() == false) {
			$message = array(
				'nameOne_error' => form_error('f_name'),
				'nameTwo_error' => form_error('l_name'),
				'email_error' => form_error('email'),
				'subject_error' => form_error('subject'),
				'message_error' => form_error('message')
			);
		} else {
			$formData = array();
			$formData['firstName'] = $this->input->post('f_name');
			$formData['lastName'] = $this->input->post('l_name');
			$formData['customer_email'] = $this->input->post('email');
			$formData['subject'] = $this->input->post('subject');
			$formData['message'] = $this->input->post('message');

			//Save customer message to the database.
			$this->home_model->save_customer_emailMessage('customeremails', $formData); 
			// Send email to info@patazone.co.ke
			$subject = $formData['subject'];
			$customerMessage = '<p>' . $formData['message'] . '</p>';

			// Email configuration.
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = 'ssl://smtp.googlemail.com';
			$config['smtp_port'] = 465;
			$config['smtp_user'] = 'collotuti6@gmail.com';
			$config['smtp_pass'] = 'nairobi75';
			$config['mailtype'] = 'html';
			$config['charset'] = 'utf-8';
			// $config['wordwrap'] = true;
			$config['newline'] = "\r\n"; //use double quotes

			$this->email->initialize($config);
			$this->email->from($formData['customer_email'], $formData['firstName'] . ' ' . $formData['lastName']);
			$this->email->to('collotuti6@gmail.com');
			$this->email->subject($subject);
			$this->email->message($customerMessage);
			if ($this->email->send()) {
				$message = array('response' => 'success', 'message' => 'Thank you for your email ' . $formData['lastName'] . ' we will get back to you soon.');
			} else {
				$message = array('response' => 'success', 'message' => 'Network error!');
			};
		}
		echo json_encode($message);
	}

	public function search(){
        $page = $this->input->get("page");
        $keyword = html_escape($this->input->get('searchProducts'));
        $this->session->set_userdata('searchword', $keyword);
        $search = $this->session->userdata('searchword');
        if($search != null){ 
            if(!empty($page)){
                    $this->db->like('name', $search);
                    $this->db->or_like('product_tags', $search);
                    $this->db->where('status' , '1');
                    $this->db->order_by('rand()');
                    $this->db->limit(9, $page);
                    $query = $this->db->get('products');
                    $count = $query->num_rows();

                    if($count > 0){
                        $data['title'] = 'Search results';
                        $data['searchword'] = $search;
                        $data['categories'] = $this->home_model->getCategories();
                        $data['products'] = $query->result();
						$data['cartItems'] = $this->cart->contents();
                        $results = $this->load->view('main/search_results',$data);
                        return json_encode($results);
                    }else{
                        $result = array();
                        return $result;
                    }
            }else{ 
                $this->db->like('name', $search);
                $this->db->or_like('product_tags', $search);
                $this->db->where('status' , '1');
                $this->db->order_by('rand()');
                $query = $this->db->limit(9, 0)->get("products");
                $data['title'] = 'Search results';
                $search_word = $keyword;
                $data['searchword'] = $keyword;
                $data['categories'] = $this->home_model->getCategories();
                $data['products'] = $query->result();
				$data['cartItems'] = $this->cart->contents();

                $this->load->view('main/search',$data);
            }
        }else{
            if(!empty($page)){
                    $this->db->where('status' , '1');
                    $this->db->order_by('rand()');
                    $this->db->limit(9, $page);
                    $result = $this->db->get('products')->result();
                    $query = $this->db->get('products');
                    $count = $query->num_rows();
                    if($count > 0){
                        $data['title'] = 'Search results';
                        $data['searchword'] = $keyword;
                        $data['categories'] = $this->home_model->getCategories();
						$data['cartItems'] = $this->cart->contents();
                        $data['products'] = $result;
                        $results = $this->load->view('main/search_results',$data);
                        return json_encode($results);
                    }else{
                        $result = array();
                        return $result;
                    }
            }else{
                $this->db->where('status' , '1');
                $this->db->order_by('rand()');
                $this->db->limit(9, 0);
                $result = $this->db->get('products')->result();
                $data['title'] = 'Search results';
                $data['searchword'] = $keyword;
				$data['cartItems'] = $this->cart->contents();
				$data['categories'] = $this->home_model->getCategories();
                $data['products'] = $result;
                $this->load->view('main/search',$data);
            }
        }
    }

	public function get_search_data()
    {
        $searchField = $this->input->get('searchKey');
        $data = $this->home_model->get_search_results('products', $searchField);
        echo json_encode($data);
    }

}
