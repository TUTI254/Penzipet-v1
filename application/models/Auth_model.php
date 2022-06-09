<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class Auth_model extends CI_Model {
		// Registration function
		public function addNewCustomer(string $table, array $data){
			$message = '';
			if($table != null && !empty($data)){
			$this->db->insert('customers', $data);
			$insert_id = $this->db->insert_id();
			if($insert_id){
				$this->db->where('id', $insert_id);
				$result = $this->db->get('customers');
				if($result->num_rows()>0){
					foreach($result->result() as $row){
						$this->session->set_userdata('user_login', 1);
							$this->session->set_userdata('user_id', $row->id);
							$this->session->set_userdata('f_name', $row->firstname);
							$this->session->set_userdata('l_name', $row->lastname);
							$this->session->set_userdata('email', $row->email);
							$this->session->set_userdata('phone', $row->phone);
							$this->session->set_userdata('user_address', $row->address);
							$this->session->set_userdata('date', $row->date_created);
							$this->session->set_userdata('last_seen', $row->last_login);
							$this->session->set_userdata('password_update', $row->last_login);
					}
					$message = array('response' => 'success', 'message' => '✔✔✔ Registration successful.');
				}else{
					$message = array('response' => 'error', 'message' => 'Something went wrong |Please try again later.');
				}
			}else{
				$message = array('response' => 'error', 'message' => 'Something went wrong |Please try again later.'); 
			}  
			}
			return $message;
		}
		// Login Function
		public function get_user_details($email, $password){
			$this->db->where('email', $email);
			$query = $this->db->get('customers');
			// Check if query return true.
			if ($query->num_rows() > 0) {
				foreach ($query->result() as $row) {
					// Check password is correct or not
					if ($password == $this->encrypt->decode($row->password)) {
						// Set user session data.
						$this->session->set_userdata('user_login', 1);
						$this->session->set_userdata('user_id', $row->id);
						$this->session->set_userdata('f_name', $row->firstname);
						$this->session->set_userdata('l_name', $row->lastname);
						$this->session->set_userdata('email', $row->email);
						$this->session->set_userdata('phone', $row->phone);
						$this->session->set_userdata('date', $row->date_created);
						$this->session->set_userdata('last_seen', $row->last_login);
						$this->session->set_userdata('password_update', $row->last_login);

							
						// Update current login time.
						$this->db->where('id', $this->session->userdata('user_id'));
						$this->db->update('customers', array('last_login' => date("Y-m-d h:i:sa")));

						// Success login message
						$data = array('response' => 'success', 'message' => '✔✔✔ Login Successfull welcome back '.$this->session->userdata('f_name').' '.$this->session->userdata('l_name'));
						return $data;
					} else {
						// Password error message
						$data = array('response' => 'error', 'message' => '❌ Invalid login credentials | try again');
						return $data;
				}
				}
			} else {
					// Wrong email error message
					$data = array('response' => 'error', 'message' => '❌ Invalid Email Address');
					return $data;
				}
		}

		
	public function addAddress($table, $data){
        $this->db->insert($table, $data);
        return true;
    }

	public function addAdss($table, $data){
		$message = '';
		if($table != null && !empty($data)){
		$this->db->insert('address', $data);
		$insert_id = $this->db->insert_id();
		if($insert_id){
			$this->db->where('id', $insert_id);
			$result = $this->db->get('address');
			if($result->num_rows()>0){
				foreach($result->result() as $row){
					$this->session->set_userdata('user_login', 1);
					$this->session->set_userdata('address_id', $row->id);
					$this->session->set_userdata('user_id', $row->user_id);
					$this->session->set_userdata('f_name', $row->firstname);
					$this->session->set_userdata('l_name', $row->lastname);
					$this->session->set_userdata('email', $row->email);
					$this->session->set_userdata('phone', $row->phone);
					$this->session->set_userdata('address', $row->address);
					$this->session->set_userdata('date', $row->date_created);
				}
				$message = array('response' => 'success', 'message' => '✔✔✔ Address successful Entered.');
			}else{
				$message = array('response' => 'error', 'message' => 'Something went wrong |Please try again later.');
			}
		}else{
			$message = array('response' => 'error', 'message' => 'Something went wrong |Please try again later.'); 
		}
		}
		return $message;
	}

	public function getuserinfo($userid){
		$this->db->where('id', $userid);
		$result = $this->db->get('customers');
		return $result->row();
	}
		





}
