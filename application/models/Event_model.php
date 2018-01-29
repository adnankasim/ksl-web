<?php

  class Event_model extends CI_Model{
    public function allEvent(){
      return $this->db->get('agenda')->result();
    }

    public function deleteEvent($id){
      return $this->db->where('id_agenda', $id)->delete('agenda');
    }

    public function validationEvent(){
      $this->load->library('form_validation');
      $rules = [
        [
          'field' => 'nama_agenda',
          'label' => 'Nama Event',
          'rules' => 'trim|required'
        ],
        [
          'field' => 'tempat_agenda',
          'label' => 'Tempat Agenda',
          'rules' => 'trim|required'
        ],
        [
          'field' => 'deskripsi_agenda',
          'label' => 'Deskripsi Agenda',
          'rules' => 'trim|required'
        ],
      ];
      $this->form_validation->set_rules($rules);
      $this->form_validation->set_error_delimiters('<div class="text-center mb-3" style="color:red; border:1px solid red; padding:5px">', '</div>');
      return $this->form_validation->run();
    }

    public function defaultEventValues(){
      return [
        'nama_agenda' => '',
        'tempat_agenda' => '',
        'deskripsi_agenda' => '',
        'waktu_agenda' => '2010-01-01'
      ];
    }

    public function insertEvent($data){
      return $this->db->insert('agenda', $data);
    }

    public function getEvent($id){
      return $this->db->where('id_agenda', $id)->get('agenda')->row();
    }

    public function updateEvent($id, $data){
      return $this->db->where('id_agenda', $id)->update('agenda', $data);
    }

    public function countAllEvent(){
      return $this->db->get('agenda')->num_rows();
    }

  }
