<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function getreview()
	{

        $data = array();
		$this->load->model('Testimonial_model'); // Load the model
        $result = $this->Testimonial_model->getclient_reviews();

        $data['content'] = $result;

        $this->load->view('client_review', $data);

        // echo "<pre>";
        // print_r($result); exit;
        // echo "</pre>";

	}

    public function getdata(){
        $this->load->view('upload-file');
    }

}