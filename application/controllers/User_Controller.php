<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_Controller extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
                
        $this->load->library('form_validation');
        $this->load->model('User_Model');
    }

    // Register user
    public function register_user(){

        $this->form_validation->set_rules('nama_user', 'Nama', 'required');
        $this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]');

        if($this->form_validation->run() === FALSE){
            $this->load->view('Template');
            $this->load->view('user/register_view');
        } else {
            // Encrypt password
            $enc_password = md5($this->input->post('password'));

            $this->User_Model->register_user($enc_password);

            // Set message
            $this->session->set_flashdata('user_registered', 'Anda telah terdaftar.');

            redirect('Artikel_Controller');
        }
    }

    // Log in user
    public function login_user(){

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run() === FALSE){
            $this->load->view('Template');
            $this->load->view('user/login_view');
        } else {
            
            // Get username
            $username = $this->input->post('username');
            // Get & encrypt password
            $password = md5($this->input->post('password'));

            // Login user
            $id_user = $this->User_Model->login_user($username, $password);

            if($id_user){
                // Buat session
                $user_data = array(
                    'id_user' => $id_user,
                    'username' => $username,
                    'logged_in' => true,
                    'level' => $this->User_Model->get_user_level($id_user)
                );

                $this->session->set_userdata($user_data);

                // Set message
                $this->session->set_flashdata('user_loggedin', 'Anda sudah login');

                redirect('User_Controller/dashboard');
            } else {
                // Set message
                $this->session->set_flashdata('login_failed', 'Login invalid');

                redirect('User_Controller/login_user');
            }       
        }
    }

    // Log user out
    public function logout(){
        // Unset user data
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('username');

        // Set message
        $this->session->set_flashdata('user_loggedout', 'Anda sudah log out');

        redirect('User_Controller/login_user');
    }

    public function get_userdata(){
        $userData = $this->session->userdata();
        return $userData;
    }

    public function dashboard(){

        if(!$this->session->userdata('logged_in')){
            redirect('User_Controller/login_user');
        }

        $id_user = $this->session->userdata('username');

        // Dapatkan detail user
        $data['user'] = $this->User_Model->get_user_details($id_user);

        $userData = $this->get_userdata();

        if ($userData['level'] === '1'){
            $this->load->view('Template');
            $this->load->view('user/dashboard_view', $data);
        } elseif ($userData['level'] === '2'){
            $this->load->view('Template');
            $this->load->view('user/user1_view', $data);
        } elseif ($userData['level'] === '3') {
            $this->load->view('Template');
            $this->load->view('user/user2_view', $data);
        }

    }

}