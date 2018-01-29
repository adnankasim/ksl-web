<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Event extends MY_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->helper(['url','form']);
      $this->load->library(['session']);
      $this->load->model('Event_model', 'event', TRUE);
    }

    public function index(){
      $input = (object) $this->event->defaultEventValues();
      $events = $this->event->allEvent();
      $main_view = "admin/event";
      $this->load->view('admin/template', compact('main_view', 'events', 'input'));
    }

    public function show($id){
      $event = $this->event->getEvent($id);
      if(!$event) redirect('admin-event');
      $main_view = "admin/detail-event";
      $this->load->view('admin/template', compact('main_view', 'event'));
    }

    public function store(){
      if(!$this->input->post(null, TRUE)) redirect('admin-event');
      $input = (object) $this->input->post(null, TRUE);
      if(!$this->event->validationEvent()){
        $events = $this->event->allEvent();
        $main_view = "admin/event";
        $this->load->view('admin/template', compact('main_view', 'events', 'input'));
        return;
      }

      $input->slug_agenda = url_title($this->input->post('nama_agenda', TRUE), '-', TRUE);

      $config = [
        'upload_path' => './assets/img',
        'allowed_types' => 'jpg|gif|png',
        'max_size' => '5000'
      ];
      $this->load->library('upload', $config);
      if(!$this->upload->do_upload('gambar_agenda')){
        $this->session->set_flashdata('msg', 'Upload wajib diisi <br> Hanya boleh mengupload JPG, PNG, GIF <br> Ukuran File max 4MB');
        $events = $this->event->allEvent();
        $main_view = "admin/event";
        $this->load->view('admin/template', compact('main_view', 'events', 'input'));
        return;
      }

      $input->gambar_agenda = $this->upload->data('file_name');

      $this->event->insertEvent($input);
      $this->session->set_flashdata('msg', 'Event Berhasil Di Tambahkan!');
      redirect('admin-event');
    }

    public function edit($id = null){
      $event = $this->event->getEvent($id);
      if(!$event) redirect('admin-event');
      $main_view = 'admin/edit-event';
      $this->load->view('admin/template', compact('main_view', 'event'));
    }

    public function update(){
      if(!$this->input->post(null, TRUE)) redirect('admin-event');
      $id_agenda = $this->input->post('id_agenda', TRUE);
      $event['nama_agenda'] = $this->input->post('nama_agenda', TRUE);
      $event['waktu_agenda'] = $this->input->post('waktu_agenda', TRUE);
      $event['id_agenda'] = $this->input->post('id_agenda', TRUE);
      $event['tempat_agenda'] = $this->input->post('tempat_agenda', TRUE);
      $event['deskripsi_agenda'] = $this->input->post('deskripsi_agenda', TRUE);
      $event['is_terlaksana'] = $this->input->post('is_terlaksana', TRUE);
      $event['slug_agenda'] = url_title($this->input->post('nama_agenda', TRUE), '-', TRUE);
      if(!$this->event->validationEvent()){
        $event = (object) $event;
        $main_view = "admin/edit-event";
        $this->load->view('admin/template', compact('main_view', 'event'));
        return;
      }

      $config = [
        'upload_path' => './assets/img',
        'allowed_types' => 'jpg|gif|png',
        'max_size' => '5000'
      ];
      $this->load->library('upload', $config);
      if($this->upload->do_upload('gambar_agenda')){
        $event['gambar_agenda'] = $this->upload->data('file_name');
      }

      $this->event->updateEvent($id_agenda, $event);
      $this->session->set_flashdata('info', 'Event Berhasil Di Edit!');
      redirect('admin-event');
    }

    public function destroy(){
      if(!$this->input->post('id_agenda', TRUE)) redirect('admin-event');
      $id = $this->input->post('id_agenda', TRUE);
      if($this->event->deleteEvent($id)){
        $this->session->set_flashdata('info', 'Event Berhasil Di Hapus!');
        redirect('admin-event');
      }
    }

  }
