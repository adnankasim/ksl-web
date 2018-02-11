<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Gallery extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->helper(['url','form']);
      $this->load->library(['session']);
      $this->load->model('Gallery_model', 'gallery', TRUE);
    }

    public function checkAdmin(){
      if(!$this->session->userdata('role')){
        redirect('login/admin');
        return;
      }
    }

    public function index(){
      $galeris = $this->gallery->allGallery();
      $main_view = "artikel/galeri";
      $this->load->view('template', compact('main_view', 'galeris'));
    }

    public function show($slug){
      $detailGaleri = $this->gallery->getDetailGallery($slug);
      $imageGaleri = $this->gallery->getImageGallery($slug);
      if(!$detailGaleri) redirect('galeri');
      if(!$imageGaleri) redirect('galeri');
      $main_view = "artikel/halaman-galeri";
      $this->load->view('template', compact('main_view', 'detailGaleri', 'imageGaleri'));
    }

    public function create(){
      $this->checkAdmin();
      $input = (object) $this->gallery->defaultGalleryValues();
      $galeris = $this->gallery->allGallery();
      $main_view = "admin/galeri";
      $this->load->view('admin/template', compact('main_view', 'galeris', 'input'));
    }

    public function store(){
      $input = (object) $this->input->post(null, TRUE);
      if(!$this->gallery->validationGallery()){
        $galeris = $this->gallery->allGallery();
        $main_view = 'admin/galeri';
        $this->load->view('admin/template', compact('main_view', 'galeris', 'input'));
        return;
      }
      $config = [
        'upload_path' => './assets/img',
        'allowed_types' => 'jpg|gif|png',
        'max_size' => '5000'
      ];
      $this->load->library('upload', $config);
      foreach ($_FILES['gambar_galeri'] as $key => $value) {
        $i = 1;
        foreach ($value as $val) {
          $field_name = 'file_'.$i;
          $_FILES[$field_name][$key] = $val;
          $i++;
        }
      }
      unset($_FILES['gambar_galeri']);
      $error = [];
      $success = [];
      foreach ($_FILES as $field_name => $file) {
        if(!$this->upload->do_upload($field_name)){
          $error[] = $this->upload->display_errors();
        }else{
          $success[] = $this->upload->data();
        }
      }

      if(count($error) > 0){
        $this->session->set_flashdata('msg', 'Upload wajib diisi <br> Hanya boleh mengupload JPG, PNG, GIF <br> Ukuran File max 4MB');
        $galeris = $this->gallery->allGallery();
        $main_view = 'admin/galeri';
        $this->load->view('admin/template', compact('main_view', 'galeris', 'input'));
      }else{
        $input->nama_galeri = $this->input->post('nama_galeri', TRUE);
        $input->slug_galeri = url_title($this->input->post('nama_galeri', TRUE), '-', TRUE);
        $input->deskripsi_galeri = $this->input->post('deskripsi_galeri', TRUE);
        $input->waktu_galeri = $this->input->post('waktu_galeri', TRUE);
        $this->gallery->insertGallery($input);
        $gal = $this->gallery->getOnlyGallery($input->slug_galeri);
        foreach ($success as $file) {
          $image['gambar_galeri'] = $file['file_name'];
          $image['id_galeri'] = $gal->id_galeri;
          $this->gallery->insertDetailGallery($image);
        }
        $this->session->set_flashdata('msg', 'Galeri Berhasil Di Tambahkan!');
        $galeris = $this->gallery->allGallery();
        $main_view = 'admin/galeri';
        $this->load->view('admin/template', compact('main_view', 'galeris', 'input'));
      }
    }

    public function edit($id = null){
      $this->checkAdmin();
      $galeri = $this->gallery->getGallery($id);
      $gambars = $this->gallery->justImageGallery($id);
      if(!$galeri) redirect('galeri/create');
      $main_view = 'admin/edit-galeri';
      $this->load->view('admin/template', compact('main_view', 'galeri', 'gambars'));
    }

    public function update(){
      $this->checkAdmin();
      $input = (object) $this->gallery->defaultGalleryValues();
      if($this->input->post('edit-galeri', TRUE)){
        $id_galeri = $this->input->post('id_galeri', TRUE);
        $galeri->nama_galeri = $this->input->post('nama_galeri', TRUE);
        $galeri->deskripsi_galeri = $this->input->post('deskripsi_galeri', TRUE);
        $this->gallery->updateGallery($id_galeri, $galeri);
        $this->session->set_flashdata('msg', 'Galeri Berhasil Di Update!');
        redirect('galeri/create');
      }elseif($this->input->post('tambah-gambar', TRUE)) {
        $config = [
          'upload_path' => './assets/img',
          'allowed_types' => 'jpg|gif|png',
          'max_size' => '5000'
        ];
        $this->load->library('upload', $config);
        foreach ($_FILES['gambar'] as $key => $value) {
          $i = 1;
          foreach ($value as $val) {
            $field_name = 'file_'.$i;
            $_FILES[$field_name][$key] = $val;
            $i++;
          }
        }
        unset($_FILES['gambar']);
        $error = [];
        $success = [];
        foreach ($_FILES as $field_name => $file) {
          if(!$this->upload->do_upload($field_name)){
            $error[] = $this->upload->display_errors();
          }else{
            $success[] = $this->upload->data();
          }
        }

        if(count($error) > 0){
          $this->session->set_flashdata('msg', 'Hanya boleh mengupload JPG, PNG, GIF <br> Ukuran File max 4MB');
          $main_view = 'admin/edit-galeri';
          $this->load->view('admin/template', compact('main_view'));
        }else{
          $id_galeri = $this->input->post('id_galeri', TRUE);
          foreach ($success as $file) {
            $image['gambar_galeri'] = $file['file_name'];
            $image['id_galeri'] = $id_galeri;
            $this->gallery->insertDetailGallery($image);
          }
          $this->session->set_flashdata('msg', 'Galeri Berhasil Di Tambahkan!');
          $galeris = $this->gallery->allGallery();
          $main_view = 'admin/galeri';
          $this->load->view('admin/template', compact('main_view', 'galeris', 'input'));
        }
      }
    }

    public function destroy(){
      $this->checkAdmin();
      if($this->input->post('hapus-gambar', TRUE)){
        $id = $this->input->post('id_detail_galeri', TRUE);
        if($this->gallery->deleteImageGallery($id)){
          $this->session->set_flashdata('info', 'Gambar Berhasil Di Hapus!');
          redirect('galeri/create');
        }
      }elseif($this->input->post('hapus-galeri', TRUE)){
        $id = $this->input->post('id_galeri', TRUE);
        if($this->gallery->deleteGallery($id)){
          $this->session->set_flashdata('info', 'Galeri Berhasil Di Hapus!');
          redirect('galeri/create');
        }
      }
    }

  }
