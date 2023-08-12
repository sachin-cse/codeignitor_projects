<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial_model extends CI_Model {

    public function getclient_reviews(){
        $response = array();

        // fetch records
        $this->db->select('*');
        $query = $this->db->get('testimonial');
        $response  = $query->result_array();

        return $response;
    }
  
  }
?>