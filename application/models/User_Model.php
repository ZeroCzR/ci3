<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_Model extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    public function register_user($enc_password){
        // Array data user 
        $data = array(
            'nama_user' => $this->input->post('nama_user'),
            'kode_pos' => $this->input->post('kode_pos'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => $enc_password,
            'tgl_registrasi' => date("Y/m/d")
        );

        // Insert user
        return $this->db->insert('user', $data);
    }

    // Proses login user
    public function login_user($username, $password){
        // Validasi
        $this->db->where('username', $username);
        $this->db->where('password', $password);

        $result = $this->db->get('user');


        if($result->num_rows() == 1){
            return $result->row(0)->id_user;
        } else {
            return false;
        }
    }
}
