<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_Controller extends CI_Controller{
	public function __construct()
	{
		parent::__construct();

		// Load custom helper applications/helpers/MY_helper.php
		//$this->load->helper('MY');

		// Load semua model yang kita pakai
		$this->load->model('Artikel_Model');
		$this->load->model('Kategori_Model');
	}

	public function index() 
	{
		// Dapatkan semua kategori
		$data['kategori'] = $this->Kategori_Model->get_all_categories();

		$this->load->view('Template');
		$this->load->view('kategori/Category_View', $data);
	}

	public function create() 
	{
		// Kita butuh helper dan library berikut
		$this->load->helper('form');
		$this->load->library('form_validation');

		// Form validasi untuk Nama Kategori
		$this->form_validation->set_rules(
			'nama_kategori',
			'Nama Kategori',
			'required|is_unique[kategori.nama_kategori]',
			array(
				'required' => 'Please fill the %s',
				'is_unique' => 'Judul <strong>' . $this->input->post('nama_kategori') . '</strong> sudah ada.'
			)
		);

		if($this->form_validation->run() === FALSE){
			$this->load->view('Template');
			$this->load->view('kategori/CreateCategory_View');
		} else {
			$this->Kategori_Model->create_category();
			redirect('Kategori_Controller/');
		}
	}

	// Membuat fungsi edit
	public function edit($id = NULL)
	{
		// Get artikel dari model berdasarkan $id
		$data['kategori'] = $this->Kategori_Model->get_category_by_id($id);
		// Jika id kosong atau tidak ada id yg dimaksud, lempar user ke halaman list category
		if ( empty($id) || !$data['kategori'] ) redirect('Kategori_Controller');

		// Kita butuh helper dan library berikut
	    $this->load->helper('form');
	    $this->load->library('form_validation');

	    // Kita validasi input sederhana, sila cek http://localhost/ci3/user_guide/libraries/form_validation.html
		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required',
			array('required' => 'Please fill the %s '));
	    $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

	    // Cek apakah input valid atau tidak
	    if ($this->form_validation->run() === FALSE)
	    {
	    	$this->load->view('Template');
	        $this->load->view('kategori/EditCategory_View', $data, FALSE);

	    } else {

	    	$post_data = array(
	    	    'nama_kategori' => $this->input->post('nama_kategori'),
	    	    'deskripsi' => $this->input->post('deskripsi'),
	    	);
    		
    		// Update kategori sesuai post_data dan id-nya
	        if ($this->Kategori_Model->update_category($post_data, $id)) {
	        	$this->load->view('Template');
		        $this->load->view('kategori/Category_View');
	        } else {
	        	$this->load->view('Template');
		        $this->load->view('kategori/Category_View');
	        }

	    }
	}


	public function delete($id)
	{

		$this->Kategori_Model->delete_category($id);
		$this->load->view('Template');
		$this->load->view('kategori/Category_View');
	}
}
