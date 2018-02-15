<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Root extends MY_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->helper(['url','form']);
      $this->load->library(['session']);
      $this->load->model('Artikel_model', 'artikel', TRUE);
      $this->load->model('Category_model', 'category', TRUE);
      $this->load->model('Event_model', 'event', TRUE);
      $this->load->model('User_model', 'user', TRUE);
      $this->load->model('Message_model', 'message', TRUE);
      $this->load->model('Gallery_model', 'gallery', TRUE);
    }

    public function index(){
      $jumlah_artikel = $this->artikel->countArtikel();
      $jumlah_user = $this->user->countAllUser();
      $jumlah_kategori = $this->category->countAllCategory();
      $jumlah_event = $this->event->countAllEvent();
      $jumlah_galeri = $this->gallery->countAllGallery();

      $kategoris = $this->category->getAllCategory();
      $artikels = $this->artikel->allArtikel();
      $events = $this->event->allEvent();
      $messages = $this->message->getAllMessage();
      $users = $this->user->getAllUser();
      $galeris = $this->gallery->allGallery();

      $main_view = "admin/index";
      $this->load->view('admin/template', compact('main_view', 'jumlah_kategori', 'jumlah_artikel', 'jumlah_user', 'jumlah_event', 'jumlah_galeri', 'kategoris', 'artikels', 'events', 'messages', 'users', 'galeris'));
    }

    public function tes(){
      // echo sha1(md5("hidayatchandra"));
    }
  }
