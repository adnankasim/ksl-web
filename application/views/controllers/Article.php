<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Article extends MY_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->helper(['url','form']);
      $this->load->library(['session']);
      $this->load->model('Artikel_model', 'artikel', TRUE);
    }

    public function index(){
      $artikel_all = $this->artikel->allArtikel();
      $main_view = "admin/artikel";
      $this->load->view('admin/template', compact('main_view', 'artikel_all'));
    }

    public function show($slug){
      $artikel = $this->artikel->getArtikel($slug);
      if(!$artikel) redirect('admin-article');
      $main_view = 'admin/detail-artikel';
      $this->load->view('admin/template', compact('main_view', 'artikel'));
    }

    public function destroy(){
      if(!$this->input->post('id_artikel', TRUE)) redirect('admin-article');
      $id = $this->input->post('id_artikel', TRUE);
      if($this->artikel->deleteArtikel($id)){
        $this->session->set_flashdata('info', 'Artikel Berhasil Di Hapus!');
        redirect('admin-article');
      }
    }

  }
