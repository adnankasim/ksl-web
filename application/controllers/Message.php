<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Message extends MY_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->helper(['url','form']);
      $this->load->library(['session']);
      $this->load->model('Message_model', 'message', TRUE);
    }

    public function index(){
      $pesans = $this->message->getAllMessage();
      $main_view = "admin/pesan";
      $this->load->view('admin/template', compact('main_view', 'pesans'));
    }

    public function show($id){
      $pesan = $this->message->getMessage($id);
      if(!$pesan) redirect('admin-message');
      $main_view = "admin/detail-pesan";
      $this->load->view('admin/template', compact('main_view', 'pesan'));
    }

    public function destroy(){
      $id_pesan = $this->input->post('id_pesan', TRUE);
      if($this->message->deleteMessage($id_pesan)){
        $this->session->set_flashdata('info', 'Pesan Berhasil Di Hapus!');
        redirect('admin-message');
      }
    }

  }
