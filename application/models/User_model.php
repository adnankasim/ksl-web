<?php

  class User_model extends CI_Model{
    public function getAllUser(){
      return $this->db->get('user')->result();
    }

    public function getUser($id){
      return $this->db->where('id_user', $id)->get('user')->row();
    }

    public function deleteUser($id){
      return $this->db->where('id_user', $id)->delete('user');
    }

    public function countAllUser(){
      return $this->db->get('user')->num_rows();
    }
  }
