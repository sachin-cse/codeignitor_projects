<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('max_execution_time', '300');

class Sharing_form extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('session');
    }

    // call default function
    public function index(){
        $this->load->view('share_form');
    }

    public function send_email(){
        if($this->input->post('send_email')){
            $from_email = 'noreplysachin725@gmail.com';
            $to_email = $this->input->post('email');

            // settings for sending email

            // Initialize the email library with the configuration
             // Load email configuration from config/email.php
             $config = Array(
                'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
                'smtp_host' => 'smtp.gmail.com', 
                'smtp_port' => 465,
                'smtp_user' => 'noreplysachin725@gmail.com',
                'smtp_pass' => 'inysokrypkjpdnnb',
                // 'cirf' => "\r\n",
                'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
                'mailtype' => 'text', //plaintext 'text' mails or 'html'
                'smtp_timeout' => '5', //in seconds
                'charset' => 'utf-8',
                // 'mailtype' => 'html',
                'wordwrap' => TRUE
            );

            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from($from_email);
            $this->email->to($to_email);
            $this->email->subject('jawgfwgekfh');
            $this->email->message('Hare Krishna hare rama and krishna!!');
           

            // send_email
            if($this->email->send()){
                $this->session->set_flashdata("email_sent", "Congragulation Email Sent Successfully.");
                $this->load->view('share_form');
            } else {
                $this->session->set_flashdata("email_sent", $this->email->print_debugger());
                $this->load->view('share_form');
            }
        }
    }
}
?>