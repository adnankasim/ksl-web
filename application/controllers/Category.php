<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Category extends MY_Controller{

    public function __construct(){
      parent::__construct();
      $this->load->helper(['url','form']);
      $this->load->library(['session']);
      $this->load->model('Category_model', 'category', TRUE);
    }

    public function index(){
      $input = (object) $this->category->defaultCategoryValues();
      $kategoris = $this->category->getAllCategory();
      $main_view = "admin/kategori";
      $this->load->view('admin/template', compact('main_view', 'kategoris', 'input'));
    }

    public function show($id){
      $kategori = $this->category->getCategory($id);
      if(!$kategori) redirect('admin-category');
      $main_view = 'admin/detail-kategori';
      $this->load->view('admin/template', compact('main_view', 'kategori'));
    }

    public function store(){
      if(!$this->input->post(null, TRUE)) redirect('admin-category');
      $input = (object) $this->input->post(null, TRUE);
      if(!$this->category->validationCategory()){
        $kategoris = $this->category->getAllCategory();
        $main_view = "admin/kategori";
        $this->load->view('admin/template', compact('main_view', 'kategoris', 'input'));
        return;
      }
      $this->category->insertCategory($input);
      $this->session->set_flashdata('msg', 'Kategori Berhasil Di Tambahkan!');
      redirect('admin-category');
    }

    public function edit($id){
      $kategori = $this->category->getCategory($id);
      if(!$kategori) redirect('admin-category');
      $main_view = 'admin/edit-kategori';
      $this->load->view('admin/template', compact('main_view', 'kategori'));
    }

    public function update(){
      if(!$this->input->post(null, TRUE)) redirect('admin-category');
      $id_kategori = $this->input->post('id_kategori', TRUE);
      $kategori['nama_kategori'] = $this->input->post('nama_kategori', TRUE);
      $kategori['deskripsi_kategori'] = $this->input->post('deskripsi_kategori', TRUE);
      $kategori['id_kategori'] = $this->input->post('id_kategori', TRUE);
      if(!$this->category->validationCategory()){
        $kategori = (object) $kategori;
        $main_view = "admin/edit-kategori";
        $this->load->view('admin/template', compact('main_view', 'kategori'));
        return;
      }
      $this->category->updateCategory($id_kategori, $kategori);
      $this->session->set_flashdata('info', 'Kategori Berhasil Di Edit!');
      redirect('admin-category');
    }

    public function destroy(){
      if(!$this->input->post('id_kategori', TRUE)) redirect('admin-category');
      $id = $this->input->post('id_kategori', TRUE);
      if($this->category->deleteCategory($id)){
        $this->session->set_flashdata('info', 'Kategori Berhasil Di Hapus!');
        redirect('admin-category');
      }
    }

  }
