<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial_model extends CI_Model {

    public function getclient_reviews($data){

        // store records
        $this->db->insert('testimonial', $data);
        return $this->db->insert_id();
    //     // $this->db->select('*');
    //     // $query = $this->db->get('testimonial');
    //     // $response  = $query->result_array();
    // }
  
  }

  public function show_reviews(){
    return $this->db->get('testimonial')->result_array();
  }

}
?>