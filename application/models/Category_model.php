<?php
  class Category_model extends CI_Model{
    public function getAllCategory(){
      return $this->db->get('kategori')->result();
    }

    public function insertCategory($data){
      return $this->db->insert('kategori', $data);
    }

    public function defaultCategoryValues(){
      return [
        'nama_kategori' => '',
        'deskripsi_kategori' => ''
      ];
    }

    public function validationCategory(){
      $this->load->library('form_validation');
      $rules = [
        [
          'field' => 'nama_kategori',
          'label' => 'Kategori',
          'rules' => 'trim|required'
        ],
        [
          'field' => 'deskripsi_kategori',
          'label' => 'Deskripsi',
          'rules' => 'trim|required'
        ]
      ];
      $this->form_validation->set_rules($rules);
      $this->form_validation->set_error_delimiters('<div class="text-center mb-3" style="color:red; border:1px solid red; padding:5px">', '</div>');
      return $this->form_validation->run();
    }

    public function deleteCategory($id){
      return $this->db->where('id_kategori', $id)->delete('kategori');
    }

    public function getCategory($id){
      return $this->db->where('id_kategori', $id)->get('kategori')->row();
    }

    public function updateCategory($id, $data){
      return $this->db->where('id_kategori', $id)->update('kategori', $data);
    }

    public function countAllCategory(){
      return $this->db->get('kategori')->num_rows();
    }

  }
