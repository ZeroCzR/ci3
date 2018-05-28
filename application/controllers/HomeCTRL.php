<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeCTRL extends CI_Controller {

	
	public function home(){
		$data['title'] = "Home";
		$data['content'] = "Public/home.php";	
		$this->load->view('Template', $data);
	}

	public function news()
	{
		$data['title'] = "News";
		$data['content'] = "Public/news.php";	
		$this->load->view('Template', $data);
	}

	public function about()
	{
		$data['title'] = "About";
		$data['content'] = "Public/about.php";	
		$this->load->view('Template', $data);
	}
}
