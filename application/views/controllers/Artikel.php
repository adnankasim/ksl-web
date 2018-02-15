<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Artikel extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->helper(['url','form']);
      $this->load->library(['session']);
      $this->load->model('Artikel_model', 'artikel', TRUE);
    }

    // halaman utama
    public function index(){
      if(!$this->input->post('submit', TRUE)){
        $main_view = "artikel/beranda";
        $artikels = $this->artikel->getAllArtikel(10);
        $events = $this->artikel->getAllEvent(10);
        $this->load->view('template', compact('main_view','artikels','events'));
      }else{
          $data['email_user'] = $this->input->post('email', TRUE);
          $data['nama_user'] = $this->input->post('nama', TRUE);
          $data['isi_pesan'] = $this->input->post('isi', TRUE);

          if(!$this->artikel->validationPesan()){
            $main_view = "artikel/beranda";
            $artikels = $this->artikel->getAllArtikel(10);
            $events = $this->artikel->getAllEvent(10);
            $this->load->view('template', compact('main_view','artikels','events'));
            return;
          }
          $this->session->set_flashdata('error_msg', 'Terima Kasih pesan anda akan segera kami baca');
          $this->artikel->insert('pesan', $data);
          redirect('');
      }
    }

    // halaman tentang
    public function about(){
      $main_view = "artikel/tentang";
      $this->load->view('template', compact('main_view'));
    }

    // halaman artikel
    public function all_artikel($page = null){
        $artikels = $this->artikel->paginateArtikel($page, 10);
        $jumlah = $this->artikel->countAllArtikel();
        $pagination = $this->artikel->createPagination('artikel', $jumlah, 10);
        $sidebar = $this->sidebar();
        $main_view = "artikel/daftar-artikel";
        $this->load->view('template', compact('main_view', 'artikels', 'pagination', 'sidebar'));
    }

    // halaman sidebar
    public function sidebar(){
      $topTenArtikels = $this->artikel->topTenArtikel();
      $allKategoris = $this->artikel->allKategori();
      return $this->load->view('artikel/sidebar', compact('topTenArtikels', 'allKategoris'), TRUE);
    }

    // halaman event
    public function all_event($page = null){
        $events = $this->artikel->paginateEvent($page, 10);
        $jumlah = $this->artikel->countAllEvent();
        $pagination = $this->artikel->createPagination('event', $jumlah, 10);
        $main_view = "artikel/daftar-event";

        $this->load->view('template', compact('main_view', 'events', 'pagination'));
    }

    // halaman detail artikel (artikel/any)
    public function get_artikel($slug){
      $getArtikel = $this->artikel->getArtikel($slug);
      if(!$getArtikel) redirect('artikel');
      $main_view = "artikel/halaman-artikel";
      $this->artikel->viewIncrement($slug);
      $sidebar = $this->sidebar();
      $this->load->view('template', compact('main_view', 'sidebar', 'getArtikel'));
    }

    // halaman detail event (event/any)
    public function get_event($slug){
      $getEvent = $this->artikel->getEvent($slug);
      if(!$getEvent) redirect('event');
      $sidebar = $this->sidebar();
      $main_view = "artikel/halaman-event";
      $this->load->view('template', compact('main_view', 'sidebar', 'getEvent'));
    }

    // halaman maintenance
    public function maintenance(){
      $this->load->view('artikel/maintenance');
    }

    // halaman kategori
    public function category($kategori, $page = null){
      $detail = $this->artikel->detailKategori($kategori);
      if(!$detail) redirect('');
      $kategoris = $this->artikel->paginateCategory($page, 10, $kategori);
      $jumlah = $this->artikel->countAllCategory($kategori);
      $pagination = $this->artikel->createPagination('kategori/'.$kategori, $jumlah, 10);
      $sidebar = $this->sidebar();
      $main_view = "artikel/kategori-artikel";
      $this->load->view('template', compact('main_view', 'detail', 'kategoris', 'pagination', 'sidebar'));
    }

    // halaman pencarian artikel
    public function search($page = null){
        $cari = $this->input->get('search', TRUE);
        $artikels = $this->artikel->paginateSearch($page, 10, $cari);
        $jumlah = $this->artikel->countAllSearch($cari);
        $pagination = $this->artikel->createPagination('cari', $jumlah, 10);
        $sidebar = $this->sidebar();
        $main_view = "artikel/pencarian-artikel";
        $this->load->view('template', compact('main_view', 'cari', 'sidebar', 'pagination', 'artikels'));
    }

    // halaman user
    public function user($username, $page = null){
      $detail = $this->artikel->detailUser($username);
      if(!$detail) redirect('');
      $users = $this->artikel->paginateUser($page, 10, $username);
      $jumlah = $this->artikel->countAllUser($username);
      $totalArtikel = $this->artikel->totalArtikelUser($username);
      $pagination = $this->artikel->createPagination('user/'.$username, $jumlah, 10);
      $sidebar = $this->sidebar();
      $main_view = "artikel/dashboard-user";
      $this->load->view('template', compact('main_view', 'detail', 'users', 'pagination', 'sidebar', 'totalArtikel'));
    }

    // halaman posting artikel
    public function post(){
      if(!$this->session->userdata('login')) redirect('');
      $user = $this->artikel->detailUser($this->session->userdata('username'));
      $form_view = 'post';
      $heading = 'Post Artikel';
      $kategoris = $this->artikel->allKategori();
      if(!$this->input->post('submit', TRUE)){
        $input = (object) $this->artikel->postDefaultValues();
        $main_view = "artikel/post-artikel";
        $this->load->view('template', compact('main_view', 'form_view', 'heading', 'input', 'kategoris', 'user'));
      }else{
        $input = (object) $this->input->post(null, TRUE);
        $data['judul_artikel'] = $this->input->post('judul', TRUE);
        $data['slug_artikel'] = url_title($this->input->post('judul', TRUE), '-', TRUE);
        $data['isi_artikel'] = $this->input->post('isi', TRUE);
        $data['id_user'] = $this->input->post('user', TRUE);
        $data['id_kategori'] = $this->input->post('kategori', TRUE);
        if(!$this->artikel->validationPostEdit()){
          $main_view = "artikel/post-artikel";
          $this->load->view('template', compact('main_view', 'form_view', 'heading', 'input', 'kategoris', 'user'));
          return;
        }
        $config = [
          'upload_path' => './assets/img',
          'allowed_types' => 'jpg|gif|png',
          'max_size' => '5000'
        ];
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('gambar')){
          $this->session->set_flashdata('error_msg', 'Upload wajib diisi <br> Hanya boleh mengupload JPG, PNG, GIF <br> Ukuran File max 4MB');
          $main_view = "artikel/post-artikel";
          $errors = $this->upload->display_errors();
          $this->load->view('template', compact('main_view', 'form_view', 'heading', 'input', 'kategoris', 'user', 'errors'));
          return;
        }
        $data['gambar_artikel'] = $this->upload->data('file_name');
        $this->artikel->insert('artikel', $data);
        redirect('artikel');
      }
    }

    // halaman edit artikel
    public function edit($id = null){
      $artikel = $this->artikel->getSomeArtikel($id);
      if(!$artikel) redirect('');
      if(!$this->session->userdata('login')) redirect('');
      $form_view = 'edit/'.$id;
      $heading = 'Edit Artikel';
      $kategoris = $this->artikel->allKategori();
      if(!$this->input->post('edit', TRUE)){
        $main_view = "artikel/edit-artikel";
        $this->load->view('template', compact('main_view', 'form_view', 'heading', 'artikel', 'kategoris'));
      }else{
        $artikel = (object) $this->input->post(null, TRUE);
        $data['judul_artikel'] = $this->input->post('judul_artikel', TRUE);
        $data['slug_artikel'] = url_title($this->input->post('judul_artikel', TRUE), '-', TRUE);
        $data['isi_artikel'] = $this->input->post('isi_artikel', TRUE);
        $data['id_kategori'] = $this->input->post('kategori', TRUE);
        $id_artikel = $id;
        $config = [
          'upload_path' => './assets/img',
          'allowed_types' => 'jpg|gif|png',
          'max_size' => '5000'
        ];
        $this->load->library('upload', $config);
        if($this->upload->do_upload('gambar')){
          $data['gambar_artikel'] = $this->upload->data('file_name');
        }
        $this->artikel->updateArtikel($id_artikel, $data);
        redirect('artikel');
      }
    }

    // halaman edit user
    public function edit_user($username = null){
      if($username == null) redirect('');
      if(!$this->session->userdata('login')) redirect('');
      $user = $this->artikel->detailUser($username);
      $form_view = 'edit-user/'.$username;
      $heading = 'Update Profil';
      if(!$this->input->post('edit', TRUE)){
        $main_view = "artikel/edit-user";
        $this->load->view('template', compact('main_view', 'form_view', 'heading', 'user'));
      }else{
        $user = (object) $this->input->post(null, TRUE);
        $data['nama_user'] = $this->input->post('nama_user', TRUE);
        $data['email'] = $this->input->post('email', TRUE);
        $data['telepon'] = $this->input->post('telepon', TRUE);
        $data['bio'] = $this->input->post('bio', TRUE);
        $data['alamat_user'] = $this->input->post('alamat_user', TRUE);
        $username_user = $username;
        $config = [
          'upload_path' => './assets/img',
          'allowed_types' => 'jpg|gif|png',
          'max_size' => '5000'
        ];
        $this->load->library('upload', $config);
        if($this->upload->do_upload('gambar')){
          $data['gambar_user'] = $this->upload->data('file_name');
        }
        $this->artikel->updateUser($username_user, $data);
        redirect('');
      }
    }

    // menghapus artikel
    public function delete(){
      if($this->input->post('hapus', TRUE)){
        $id = $this->input->post('id_artikel', TRUE);
        $this->artikel->deleteArtikel($id);
        redirect('');
      }else{
        redirect('');
      }
    }


}
