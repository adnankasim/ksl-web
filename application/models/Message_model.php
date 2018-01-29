<?php

  class Message_model extends CI_Model{
    public function getAllMessage(){
      return $this->db->get('pesan')->result();
    }

    public function getMessage($id){
      return $this->db->where('id_pesan', $id)->get('pesan')->row();
    }

    public function deleteMessage($id){
      return $this->db->where('id_pesan', $id)->delete('pesan');
    }
  }
