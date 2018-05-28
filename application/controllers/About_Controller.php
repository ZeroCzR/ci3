<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About_Controller extends CI_Controller {

	public function index()
	{
		$this->load->view('Template');
		$this->load->view('Public/about');
	}
}
