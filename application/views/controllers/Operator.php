<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Operator extends MY_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->helper(['url','form']);
      $this->load->library(['session']);
      $this->load->model('Operator_model', 'operator', TRUE);
    }

    public function index(){
      $input = (object) $this->operator->defaultOperatorValues();
      $operators = $this->operator->getAllOperator();
      $main_view = "admin/admin";
      $this->load->view('admin/template', compact('main_view', 'input', 'operators'));
    }

    public function store(){
      if(!$this->input->post(null, TRUE)) redirect('admin-operator');
      $input = (object) $this->input->post(null, TRUE);
      if(!$this->operator->validationOperator()){
        $operators = $this->operator->getAllOperator();
        $main_view = "admin/admin";
        $this->load->view('admin/template', compact('main_view', 'operators', 'input'));
        return;
      }
      $data['username'] = $input->username;
      $data['password'] = sha1(md5($input->username));
      $data['role'] = $input->role;
      $data = (object) $data;
      $this->operator->insertOperator($data);
      $this->session->set_flashdata('msg', 'Admin Berhasil Di Tambahkan!');
      redirect('admin-operator');
    }

    public function destroy(){
      if(!$this->input->post('id_admin', TRUE)) redirect('admin-operator');
      $id = $this->input->post('id_admin', TRUE);
      if($this->operator->deleteOperator($id)){
        $this->session->set_flashdata('info', 'Admin Berhasil Di Hapus!');
        redirect('admin-operator');
      }
    }

  }
