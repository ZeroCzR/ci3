<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_Model extends CI_Model
{

    public function __construct() 
    {
        parent::__construct();
    }

    public function get_all_categories()
    {
        // Urutkan berdasar abjad
        $this->db->order_by('nama_kategori');

        $query = $this->db->get('kategori');
        return $query->result();
    }

    public function create_category()
    {
        $data = array(
            'nama_kategori'      => $this->input->post('nama_kategori'),
            'deskripsi'       => $this->input->post('deskripsi')
        );

        return $this->db->insert('kategori', $data);
    }

    // Dapatkan kategori berdasar ID
    public function get_category_by_id($id)
    {
        $query = $this->db->get_where('kategori', array('id_kategori' => $id));
        return $query->row();
    }

    public function update_category($data, $id) 
    {
        if ( !empty($data) && !empty($id) ){
            $update = $this->db->update( 'kategori', $data, array('id_kategori'=>$id) );
            return $update ? true : false;
        } else {
            return false;
        }
    }

    public function delete_category($id)
    {
        if ( !empty($id) ){
            $delete = $this->db->delete('kategori', array('id_kategori'=>$id) );
            return $delete ? true : false;
        } else {
            return false;
        }
    }

    public function generate_cat_dropdown()
    {

        // Mendapatkan data ID dan nama kategori saja
        $this->db->select ('
            kategori.id_kategori,
            kategori.nama_kategori
        ');

        // Urut abjad
        $this->db->order_by('nama_kategori');

        $result = $this->db->get('kategori');
        
        // bikin array
        // please select berikut ini merupakan tambahan saja agar saat pertama
        // diload akan ditampilkan text please select.
        $dropdown[''] = 'Please Select';

        if ($result->num_rows() > 0) {
            
            foreach ($result->result_array() as $row) {
                // Buat array berisi 'value' (id kategori) dan 'nama' (nama kategori)
                $dropdown[$row['id_kategori']] = $row['nama_kategori'];
            }
        }

        return $dropdown;
    }
}
