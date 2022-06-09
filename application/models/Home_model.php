<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class Home_model extends CI_Model {


		public function getCategories(): array{
			return $this->db->get('category')->result();
		}
		public function getByPet(): array{
			return $this->db->get('pet')->result();
		}

		public function getByBrand(): array{
			return $this->db->get('brand')->result();
		}


		// Function for creating new customers email addresses
		public function save_new_customer_email($table, $data)
		{
			return $this->db->insert($table, $data);
		}

		public function save_customer_emailMessage($table, $data)
		{
			return $this->db->insert($table, $data);
		}

		public function get_search_results($table, $searchField)
		{
			$this->db->like('name', $searchField);
			$this->db->or_like('product_tags', $searchField);
			$query = $this->db->get($table);
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				$data = array('response' => 'error', 'message' => 'No products found for search result "<b>'.$searchField.'</b>"');
				return $data;
			}
		}





}
