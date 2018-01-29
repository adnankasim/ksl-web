<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class User extends MY_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->helper(['url','form']);
      $this->load->library(['session']);
      $this->load->model('User_model', 'user', TRUE);
    }

    public function index(){
      $users = $this->user->getAllUser();
      $main_view = "admin/user";
      $this->load->view('admin/template', compact('main_view', 'users'));
    }

    public function show($id){
      $user = $this->user->getUser($id);
      if(!$user) redirect('admin-user');
      $main_view = "admin/detail-user";
      $this->load->view('admin/template', compact('main_view', 'user'));
    }

    public function destroy(){
      $id_user = $this->input->post('id_user', TRUE);
      if($this->user->deleteUser($id_user)){
        $this->session->set_flashdata('info', 'User Berhasil Di Hapus!');
        redirect('admin-user');
      }
    }

  }
