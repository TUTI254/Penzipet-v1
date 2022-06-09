<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auths extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }

	public function register(){
        $data['cartItems'] = $this->cart->contents();
		$data['title'] = 'Create Your Account.';
		$this->load->view('common/header',$data);
		$this->load->view('auth/register',$data);
		$this->load->view('common/footer',$data);
	}

	public function register_user(){
        $this->form_validation->set_rules('firstname', 'First name','required|trim');
        $this->form_validation->set_rules('lastname', 'Last name','required|trim');
        $this->form_validation->set_rules('email', 'Email','required|is_unique[customers.email]|trim',array('is_unique' => 'The email address %s provided already exists in our system. Please signup.'));
        $this->form_validation->set_rules('phone', 'Phone','required|max_length[10]|min_length[10]|trim|is_unique[customers.phone]|numeric',array('is_unique' => 'The %s number provided already exists.'));
        $this->form_validation->set_rules('password', 'Password','required|trim|min_length[6]');
        $this->form_validation->set_rules('passwordConfirmation', 'Confirm password','required|trim|min_length[6]|matches[password]');
        $this->form_validation->set_rules('address', 'Address','required');

        if ($this->form_validation->run() == false) {
            $message = array(
                'firstName_error' => form_error('firstname'),
                'lastName_error' => form_error('lastname'),
                'email_error' => form_error('email'),
                'phone_error' => form_error('phone'),
                'password_error' => form_error('password'),
                'confirmpassword_error' => form_error('passwordConfirmation'),
                'address_error' => form_error('address'),
            );
        } else {
            $encrypted_password = $this->encrypt->encode($this->input->post('password'));

            $formData = array(
                'firstname' => html_escape($this->input->post('firstname')),
                'lastname' => html_escape($this->input->post('lastname')),
                'email' => html_escape($this->input->post('email')),
                'phone' => html_escape($this->input->post('phone')),
                'password' => $encrypted_password,
                'address' =>html_escape($this->input->post('address')),
            );
			$result = $this->auth_model->addNewCustomer('customers', $formData);
            if($result){
                $message = $result;
            }
        }
        echo json_encode($message);    
    }

	public function login(){
        $data['cartItems'] = $this->cart->contents();
        $data['title'] = 'Welcome Please Login';
		$this->load->view('common/header',$data);
		$this->load->view('auth/login',$data);
		$this->load->view('common/footer',$data);
	}
	// function for login of user
    public function login_user(){
        $email = html_escape($this->input->post('email'));
        $password = html_escape($this->input->post('password'));
        $result = $this->auth_model->get_user_details($email, $password);
        echo json_encode($result);
    }
     // Function to logout any user
    public function logout(){
         // Destroy all sessions
        $this->session->unset_userdata('access_token');
        $this->session->sess_destroy();
        redirect('account_login');
    } 


	// public function forgot_password(){
	// 	$data['cartItems'] = $this->cart->contents();
    //     $data['title'] = 'Forgot my Password';
	// 	$this->load->view('common/header');
	// 	$this->load->view('auth/forgot_password');
	// 	$this->load->view('common/footer');
	// }
}
