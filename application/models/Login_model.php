<?php
  class Login_model extends CI_Model{

    // mengecek user
    public function checkUser($email, $password){
      return $this->db->where('email', $email)->where('password', $password)->get('user')->row();
    }

    // mengecek admin
    public function checkAdmin($username, $password){
      return $this->db->where('username', $username)->where('password', $password)->get('admin')->row();
    }

    // mengecek username user
    public function checkUsername($username){
      return $this->db->where('username', $username)->get('user')->row();
    }

    // logout
    public function logout(){
      $sess_data = ['login', 'username', 'role'];
      $this->session->unset_userdata($sess_data);
      $this->session->sess_destroy();
    }

    // validasi form daftar
    public function validationDaftar(){
      $this->load->library('form_validation');
      $rules = [
        [
          'field' => 'nama',
          'label' => 'Nama',
          'rules' => 'trim|required'
        ],
        [
          'field' => 'email',
          'label' => 'Email',
          'rules' => 'trim|required'
        ],
        [
          'field' => 'username',
          'label' => 'Username',
          'rules' => 'trim|required'
        ],
        [
          'field' => 'password',
          'label' => 'Password',
          'rules' => 'trim|required'
        ]
      ];
      $this->form_validation->set_rules($rules);
      $this->form_validation->set_error_delimiters('<span class="btn btn-outline-danger text-center mb-3">', '</span>');
      return $this->form_validation->run();
    }

    // menginput data ke database
    public function insert($table, $data){
      $this->db->insert($table, $data);
      return $this->db->insert_id();
    }

    // nilai default form daftar
    public function registerDefaultValues(){
      return [
        'nama' => '',
        'username' => '',
        'password' => '',
        'email' => ''
      ];
    }

    // nilai default form masuk
    public function loginDefaultValues(){
      return [
        'password' => '',
        'email' => '',
        'username' => ''
      ];
    }

    // update last login user
    public function userLastLogin($username){
      $sql = "update user set login_terakhir = NOW() where username = '$username'";
      return $this->db->query($sql);
    }

    // update last login admin
    public function adminLastLogin($username){
      $sql = "update admin set login_terakhir = NOW() where username = '$username'";
      return $this->db->query($sql);
    }

  }
