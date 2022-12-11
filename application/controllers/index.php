<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller
{

	
	public function index()
	        {
				$this->load->view('index/index');
	        }

	        public function pendaftar()
	        {
				$this->load->view('index/pendaftar');
	        }

}
