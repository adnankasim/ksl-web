<?php
  class Operator_model extends CI_Model{
    public function getAllOperator(){
      return $this->db->get('admin')->result();
    }

    public function getOperator($id){
      return $this->db->where('id_admin', $id)->get('admin')->row();
    }

    public function insertOperator($data){
      return $this->db->insert('admin', $data);
    }

    public function defaultOperatorValues(){
      return [
        'username' => '',
        'password' => '',
        'role' => 'operator'
      ];
    }

    public function validationOperator(){
      $this->load->library('form_validation');
      $rules = [
        [
          'field' => 'username',
          'label' => 'Username',
          'rules' => 'trim|required'
        ],
        [
          'field' => 'password',
          'label' => 'Password',
          'rules' => 'trim|required'
        ],
        [
          'field' => 'role',
          'label' => 'Level',
          'rules' => 'trim|required'
        ]
      ];
      $this->form_validation->set_rules($rules);
      $this->form_validation->set_error_delimiters('<div class="text-center mb-3" style="color:red; border:1px solid red; padding:5px">', '</div>');
      return $this->form_validation->run();
    }

    public function deleteOperator($id){
      return $this->db->where('id_admin', $id)->delete('admin');
    }

    public function updateOperator($id, $data){
      return $this->db->where('id_admin', $id)->update('admin', $data);
    }

  }
