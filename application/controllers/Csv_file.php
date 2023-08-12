<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Csv_file extends CI_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->model('Csv_model');
		$this->load->library('session');

	}


	public function index(){
		$this->load->view('csv_file');
	}

	// upload data

	public function upload(){
		// check if file is uploaded
		if($_FILES['csv_file']['name']){
			$config['upload_path'] = 'D:\xampp\htdocs\codeignitor\uploads';
			$config['allowed_types'] = 'csv|xls|xlsx';
			$this->load->library('upload', $config);

			if($this->upload->do_upload('csv_file')){
				$filedata = $this->upload->data();
				$filepath = 'D:\xampp\htdocs\codeignitor\uploads\\' .$filedata['file_name'];

				// load csv data
				$csvdata = array_map('str_getcsv', file($filepath));
				$this->Csv_model->insert_csv_data($csvdata);

				$this->session->set_flashdata('success_message', 'file uploaded successfully');
				redirect('upload-file');
			} else {
				$uploaderror = $this->upload->display_errors();
				$this->session->set_flashdata('error_message', $uploaderror);
				redirect('upload-file');
			}
		}
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


    // public function getdata(){
    //     $this->load->view('csv_file');
    // }

}