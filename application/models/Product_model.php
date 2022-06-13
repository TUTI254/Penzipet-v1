<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model{
	function __construct() {
        $this->proTable = 'products';
        $this->custTable = 'customers';
        $this->ordTable = 'orders';
        $this->ordItemsTable = 'order_items';
    }

	public function getProductDetails(string $id, string $field){
        if($id != null){
            $this->db->where($field, $id);
            $result = $this->db->get('products');
            if($result->num_rows() > 0){
                return $result->row();
            }else{
                return '';
            }
        }
    }
    public function productList(){
		$this->db->select('*');
		$this->db->where('status', '1');
		$qry=$this->db->get('products');
		return $qry->result();

	}
	public function productView($id){
		$this->db->select('*');
		$this->db->where('id',$id);
		$this->db->where('status', '1');
		$gry=$this->db->get('products');
		return $gry->row();

	}


	public function productListWithId($where){
		$this->db->select('*');
		$this->db->where($where);
		$this->db->where('status', '1');
		$qry=$this->db->get('products');
		return $qry->row();

	}
	/*
     * Fetch products data from the database
     * @param id returns a single record if specified, otherwise all records
     */
    public function getRows($id = ''){
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('pet_id', '1');
        if($id){
            $this->db->where('id', $id);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            $this->db->order_by('name', 'asc');
            $query = $this->db->get();
            $result = $query->result_array();
        }
        // Return fetched data
        return !empty($result)?$result:false;
    }
    /*
     * Fetch order data from the database
     * @param id returns a single record of the specified ID
     */
    public function getOrder($id){
        $this->db->select('o.*, c.firstname	, c.lastname, c.email, c.phone, c.address');
        $this->db->from($this->ordTable.' as o');
        $this->db->join($this->custTable.' as c', 'c.id = o.customer_id', 'left');
        $this->db->where('o.id', $id);
        $query = $this->db->get();
        $result = $query->row_array();
        
        // Get order items
        $this->db->select('i.*, p.image, p.name, p.price');
        $this->db->from($this->ordItemsTable.' as i');
        $this->db->join($this->proTable.' as p', 'p.id = i.product_id', 'left');
        $this->db->where('i.order_id', $id);
        $query2 = $this->db->get();
        $result['items'] = ($query2->num_rows() > 0)?$query2->result_array():array();
        
        // Return fetched data
        return !empty($result)?$result:false;
    }
    public function insertCustomer($table, $data){
        // Add created and modified date if not included
        if(!array_key_exists("date_created", $data)){
            $formData['date_created'] = date("Y-m-d H:i:s");
        }
        if(!array_key_exists("date_updated	", $data)){
            $formData['date_updated'] = date("Y-m-d H:i:s");
        }
        
        // Insert customer custData
        $insert = $this->db->insert('customers', $data);

        // Return the status
        return $insert?$this->db->insert_id():false;
    }
    public function insertOrder($data){
        // Add created and modified date if not included
        if(!array_key_exists("created", $data)){
            $data['created'] = date("Y-m-d H:i:s");
        }
        if(!array_key_exists("modified", $data)){
            $data['modified'] = date("Y-m-d H:i:s");
        }
        
        // Insert order data
        $insert = $this->db->insert('orders', $data);

        // Return the status
        return $insert?$this->db->insert_id():false;
    }
    public function insertOrderItems($data = array()) {
        // Insert order items
        $insert = $this->db->insert_batch('order_items', $data);

        // Return the status
        return $insert?true:false;
    }

	public function fetch_data($query) {
		$this->db->select('*');
		$this->db->from('products');
		if($query != '') {
			$this->db->like('name', $query);
			$this->db->or->like('product_tags', $query);
		}
		return $this->db->get();
	}

	public function insertOrders($table, $data){
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

	public function getCart($table, $user_id, $product_id, $ordered){
        $this->db->where('user_id', $user_id);
        $this->db->where('ordered', $ordered);
        $this->db->where('product_id', $product_id);
        $query = $this->db->get($table);
        return $query;
    }
	public function insertNotification($table, $notificationData){
        $this->db->insert($table, $notificationData);
        return true;
    }
	public function updateProductQTY($table, $product_id, $productQTY){
        $this->db->where('id', $product_id);
        $this->db->update($table, array('product_quantity' => $productQTY));
    }
	public function insert_order_items($table, $data){
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

	public function getNotifications($table, $order_id){

        $this->db->where('ordered', 1);
        $query = $this->db->get($table);
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }

    }
	public function getorderinfo($user_order){
		$this->db->where('order_id', $user_order);
		$result = $this->db->get('orders');
		return $result->row();
	}

}
