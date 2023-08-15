<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('Testimonial_model');
		$this->load->library('session');
		$this->load->library('form_validation');
		// $this->load->library('upload');
	}


	public function index(){
		$data = array();
        $result = $this->Testimonial_model->show_reviews();

        $data['content'] = $result;

        $this->load->view('client_review', $data);

	} 

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


		if($this->input->post('save')){
			// form-validation
			$this->form_validation->set_rules('fullName', 'Full Name', 'required');
			$this->form_validation->set_rules('message', 'Message', 'required');
			$this->form_validation->set_rules('photo', 'Profile pic', 'required');

			if($this->form_validation->run() == FALSE){
				$this->load->view('client_form');
			} 
			else 
			{
				$fullname = $this->input->post('fullName');
				$message = $this->input->post('message');
	
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = 2048; # max 2MB
				$config['encrypt_name'] = true;
	
				$this->load->library('upload', $config);
	
				if($this->upload->do_upload('photo')){
					$upload_data = $this->upload->data();
					$image_path = './uploads/' .$upload_data['file_name'];
				} else {
					// $uploaderror = $this->upload->display_errors();
					$image_path = '';
					$uploaderror = $this->upload->display_errors();
					$this->session->set_flashdata('error_message', $uploaderror);
					redirect('testimonial-form'); // Adjust the redirect URL as needed
					return;
				}
	
				$data = array(
					'name' => $fullname,
					'client-review' => $message,
					'image' => $image_path,
				);

	
	
				$result = $this->Testimonial_model->getclient_reviews($data);
				$data['content'] = $result;
	
				$this->session->set_flashdata('success_message', 'Review submitted successfully.');
				redirect('client-testimonial');
			}

		} else {
			$this->load->view('client_form');
		} 

	}


}