<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
        class MY_Model extends CI_Model {
 
        var $table = "";
 
        function __construct()
        {
            parent::__construct();
            $this->load->database();
        }

        function query($sql) {
            $query = $this->db->query($sql);
            if ($query) {
                json_encode(array('success' => true));
            } else {
                json_encode(array('success' => false));
            }
        }

        function result($sql) {
            $query = $this->db->query($sql);
            $result = $query->result_array();
            return (count($result) > 0 ? $result : NULL); 
        }
 
        function insert($data)
        {
            $this->db->insert($this->table, $data);
            return $this->db->insert_id();
        }
 
        function find_id($field, $id)
        {
            if ($id == NULL) {
                return NULL;
            }
 
            $this->db->where($field, $id);
            $query = $this->db->get($this->table);
 
            $result = $query->result_array();
            return (count($result) > 0 ? $result[0] : NULL);
        }

        function find_in() {
            
        }
 
        function find_all($sort, $order)
        {
            $this->db->order_by($sort, $order);
            $query = $this->db->get($this->table);
            return $query->result_array();
        }
 
        function update($field, $id, $data)
        {
            $this->db->where($field, $id);
            $this->db->update($this->table, $data);
        }
 
        function delete($field, $id)
        {
            if ($id != NULL) {
                $this->db->where($field, $id);                    
                $this->db->delete($this->table);                        
            }
        }

        function truncate() {
            return $this->db->truncate($this->table);
        }     
}
 
/* End of file */