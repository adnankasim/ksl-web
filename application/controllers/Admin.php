<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Admin extends MY_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->helper(['url','form']);
      $this->load->library(['session']);
      $this->load->model('Artikel_model', 'artikel', TRUE);
      $this->load->model('Category_model', 'category', TRUE);
      $this->load->model('Event_model', 'event', TRUE);
      $this->load->model('User_model', 'user', TRUE);
      $this->load->model('Message_model', 'message', TRUE);
    }

    public function index(){
      $jumlah_artikel = $this->artikel->countArtikel();
      $jumlah_user = $this->user->countAllUser();
      $jumlah_kategori = $this->category->countAllCategory();
      $jumlah_event = $this->event->countAllEvent();

      $kategoris = $this->category->getAllCategory();
      $artikels = $this->artikel->allArtikel();
      $events = $this->event->allEvent();
      $messages = $this->message->getAllMessage();
      $users = $this->user->getAllUser();

      $main_view = "admin/index";
      $this->load->view('admin/template', compact('main_view', 'jumlah_kategori', 'jumlah_artikel', 'jumlah_user', 'jumlah_event', 'kategoris', 'artikels', 'events', 'messages', 'users', 'active'));
    }

    public function tes(){
      // echo sha1(md5("hidayatchandra"));
    }
  }
