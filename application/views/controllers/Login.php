<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Login extends CI_Controller{
    public function __construct(){
      parent::__construct();

      $this->load->model('Login_model', 'login', TRUE);
      $this->load->library('session');
      $this->load->helper(['url','form']);

    }

    // login user
    public function index(){
      if(!$this->input->post('submit', TRUE)){
        $input = (object) $this->login->loginDefaultValues();
        $main_view = "artikel/masuk";
        $this->load->view('template', compact('main_view', 'input'));
      }else{
        $email = $this->input->post('email', TRUE);
        $password = $this->input->post('password', TRUE);
        $password = sha1(md5($password));
        $user = $this->login->checkUser($email, $password);

        if(count($user)){

          $data = [
            'login' => TRUE,
            'username' => $user->username,
          ];

          $this->session->set_userdata($data);
          $this->login->userLastLogin($this->session->userdata('username'));
          if($this->session->userdata('login')){
            redirect('');
            return;
          }
        }else{
          $this->session->set_flashdata('error_msg', 'Username dan/atau Password Salah');
          $input = (object) $this->input->post(null, TRUE);
          $main_view = "artikel/masuk";
          $this->load->view('template', compact('main_view', 'input'));
        }
      }
    }

    // login untuk admin & operator
    public function admin(){
      if(!$this->input->post('submit', TRUE)){
        $input = (object) $this->login->loginDefaultValues();
        $main_view = "artikel/masuk_admin";
        $this->load->view('template', compact('main_view', 'input'));
      }else{
        $email = $this->input->post('email', TRUE);
        $password = $this->input->post('password', TRUE);
        $password = sha1(md5($password));
        $user = $this->login->checkAdmin($email, $password);

        if(count($user)){

          $data = [
            'username' => $user->username,
            'role' => $user->role
          ];

          $this->session->set_userdata($data);
          $this->login->adminLastLogin($this->session->userdata('username'));
          if($this->session->userdata('username')){
            redirect('root');
            return;
          }
        }else{
          $this->session->set_flashdata('error_msg', 'Username dan/atau Password Salah');
          $input = (object) $this->input->post(null, TRUE);
          $main_view = "artikel/masuk_admin";
          $this->load->view('template', compact('main_view', 'input'));
        }
      }
    }

    // daftar user
    public function register(){
      if(!$this->input->post('submit', TRUE)){
        $input = (object) $this->login->registerDefaultValues();
        $main_view = "artikel/daftar";
        $this->load->view('template', compact('main_view', 'input'));
      }else{
        $data['nama_user'] = $this->input->post('nama', TRUE);
        $data['username'] = $this->input->post('username', TRUE);
        $data['password'] = sha1(md5($this->input->post('password', TRUE)));
        $data['email'] = $this->input->post('email', TRUE);

        $input = (object) $this->input->post(null, TRUE);

        if($this->login->checkUsername($data['username'])){
          $this->session->set_flashdata('error_msg', 'Username Sudah Ada');
          $main_view = "artikel/daftar";
          $this->load->view('template', compact('main_view', 'input'));
          return;
        }

        if(!$this->login->validationDaftar()){
          $main_view = "artikel/daftar";
          $this->load->view('template', compact('main_view', 'input'));
          return;
        }
        $this->login->insert('user', $data);
        redirect('masuk');
      }
    }

    // logout user, operator, admin
    public function logout(){
      $this->session->sess_destroy();
      redirect('');
    }

  }
