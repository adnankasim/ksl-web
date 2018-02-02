<?php

  class Artikel_model extends CI_Model{

    // Menampilkan semua artikel berdasarkan kategori dan user
    // hanya untuk halaman beranda
    public function getAllArtikel($limit = null){
      return $this->db->select('*')->from('artikel')->join('kategori','artikel.id_kategori = kategori.id_kategori')->join('user','artikel.id_user = user.id_user')->order_by('id_artikel', 'DESC')->limit($limit)->get()->result();
    }

    // menampilkan semua event
    public function getAllEvent($limit){
      return $this->db->limit($limit)->get('agenda')->result();
    }

    // insert tabel
    public function insert($table, $data){
      $this->db->insert($table, $data);
      return $this->db->insert_id();
    }

    // validasi pesan (halaman beranda)
    public function validationPesan(){
      $this->load->library('form_validation');
      $rules = [
        [
          'field' => 'email',
          'label' => 'Email',
          'rules' => 'trim|required'
        ],
        [
          'field' => 'nama',
          'label' => 'Nama',
          'rules' => 'trim|required'
        ],
        [
          'field' => 'isi',
          'label' => 'Isi',
          'rules' => 'trim|required|max_length[255]'
        ]
      ];
      $this->form_validation->set_rules($rules);
      $this->form_validation->set_error_delimiters('<span class="btn btn-outline-danger text-left mb-3">', '</span>');
      return $this->form_validation->run();
    }

    // menghitung jumlah artikel berdasarkan kategori & user
    public function countAllArtikel(){
      return $this->db->select('*')->from('artikel')->join('kategori','artikel.id_kategori = kategori.id_kategori')->join('user','artikel.id_user = user.id_user')->get()->num_rows();
    }

    // menghitung jumlah total event
    public function countAllEvent(){
      return $this->db->get('agenda')->num_rows();
    }

    // mendapatkan semua artikel berdasarkan kategori & user
    // halaman artikel
    public function paginateArtikel($page = null, $perPage = null){
      if($page == null) $page = 0;
      if($perPage == null) $perPage = 10;

      if($page == 0){
          $offset = 0;
      }else{
        $offset = ($page * $perPage) - $perPage;
      }

      return $this->db->select('*')->from('artikel')->join('kategori','artikel.id_kategori = kategori.id_kategori')->join('user','artikel.id_user = user.id_user')->order_by('id_artikel', 'DESC')->limit($perPage, $offset)->get()->result();
    }

    // mendapatkan semua event
    public function paginateEvent($page = null, $perPage = null){
      if($page == null) $page = 0;
      if($perPage == null) $perPage = 10;

      if($page == 0){
          $offset = 0;
      }else{
        $offset = ($page * $perPage) - $perPage;
      }

      return $this->db->order_by('id_agenda', 'DESC')->limit($perPage, $offset)->get('agenda')->result();
    }

    // membuat link pagination
    public function createPagination($baseUrl, $jumlah, $perPage = null){
      $this->load->library('pagination');
      $this->load->helper('url');
      if($perPage == null) $perPage = 10;

      $config['base_url'] = site_url($baseUrl);
      $config['total_rows'] = $jumlah;
      $config['per_page'] = $perPage;
      $config['use_page_numbers'] = TRUE;
      $config['next_tag_open'] = '<li class="page-item">';
      $config['next_tag_close'] = '</li>';
      $config['prev_tag_open'] = '<li class="page-item">';
      $config['prev_tag_close'] = '</li>';
      $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
      $config['cur_tag_close'] = '</span></li>';
      $config['attributes'] = array('class' => 'page-link');
      $config['num_links'] = 1;
      $this->pagination->initialize($config);
      return $this->pagination->create_links();
    }

    // menampilkan semua artikel berdasarkan total tampil
    public function topTenArtikel(){
      return $this->db->order_by('tampil', 'DESC')->limit(10)->get('artikel')->result();
    }

    // menampilkan semua kategori
    public function allKategori(){
      return $this->db->get('kategori')->result();
    }

    // menampilkan detail artikel
    public function getArtikel($slug){
      return $this->db->select('*')->from('artikel')->join('kategori','artikel.id_kategori = kategori.id_kategori')->join('user','artikel.id_user = user.id_user')->where('slug_artikel', $slug)->get()->row();
    }

    // menampilkan detail event
    public function getEvent($slug){
      return $this->db->where('slug_agenda', $slug)->get('agenda')->row();
    }

    // menambah jumlah tampil artikel
    public function viewIncrement($slug){
      $qry = "update artikel set tampil=tampil+1 where slug_artikel = '$slug'";
      return $this->db->query($qry);
    }

    // menghitung jumlah total kategori berdasarkan kategori
    public function countAllCategory($kategori){
      return $this->db->select('*')->from('artikel')->join('kategori','artikel.id_kategori = kategori.id_kategori')->join('user','artikel.id_user = user.id_user')->where('kategori.nama_kategori', $kategori)->get()->num_rows();
    }

    // mendapatkan semua artikel berdasarkan kategori
    public function paginateCategory($page = null, $perPage = null, $kategori){
      if($page == null) $page = 0;
      if($perPage == null) $perPage = 10;

      if($page == 0){
          $offset = 0;
      }else{
        $offset = ($page * $perPage) - $perPage;
      }
      return $this->db->select('*')->from('artikel')->join('kategori','artikel.id_kategori = kategori.id_kategori')->join('user','artikel.id_user = user.id_user')->where('kategori.nama_kategori', $kategori)->order_by('id_artikel', 'DESC')->limit($perPage, $offset)->get()->result();
    }

    // mendapatkan detail kategori
    public function detailKategori($kategori){
      return $this->db->where('nama_kategori', $kategori)->get('kategori')->row();
    }

    // mendapatkan semua artikel berdasarkan pencarian
    public function paginateSearch($page = null, $perPage = null, $cari){
      if($page == null) $page = 0;
      if($perPage == null) $perPage = 10;

      if($page == 0){
          $offset = 0;
      }else{
        $offset = ($page * $perPage) - $perPage;
      }
      return $this->db->select('*')->from('artikel')->join('kategori','artikel.id_kategori = kategori.id_kategori')->join('user','artikel.id_user = user.id_user')->like('artikel.judul_artikel', $cari)->order_by('id_artikel', 'DESC')->limit($perPage, $offset)->get()->result();
    }

    // menghitung jumlah total artikel berdasarkan pencarian
    public function countAllSearch($cari){
      return $this->db->select('*')->from('artikel')->join('kategori','artikel.id_kategori = kategori.id_kategori')->join('user','artikel.id_user = user.id_user')->like('artikel.judul_artikel', $cari)->get()->num_rows();
    }

    // menghitung jumlah total artikel berdasarkan user
    public function countAllUser($username){
      return $this->db->select('*')->from('artikel')->join('kategori','artikel.id_kategori = kategori.id_kategori')->join('user','artikel.id_user = user.id_user')->where('user.username', $username)->get()->num_rows();
    }

    // mendapatkan semua artikel berdasarkan user
    public function paginateUser($page = null, $perPage = null, $username){
      if($page == null) $page = 0;
      if($perPage == null) $perPage = 10;

      if($page == 0){
          $offset = 0;
      }else{
        $offset = ($page * $perPage) - $perPage;
      }
      return $this->db->select('*')->from('artikel')->join('kategori','artikel.id_kategori = kategori.id_kategori')->join('user','artikel.id_user = user.id_user')->where('user.username', $username)->order_by('id_artikel', 'DESC')->limit($perPage, $offset)->get()->result();
    }

    // mendapatkan detail user
    public function detailUser($username){
      return $this->db->where('username', $username)->get('user')->row();
    }

    // total artikel yang diposting user
    public function totalArtikelUser($username){
      $total = $this->db->select('*')->from('artikel')->join('kategori','artikel.id_kategori = kategori.id_kategori')->join('user','artikel.id_user = user.id_user')->where('user.username', $username)->get()->result();
      return count($total);
    }

    // default value form posting
    public function postDefaultValues(){
      return [
        'judul' => '',
        'kategori' => '',
        'isi' => '',
        'kategori' => ''
      ];
    }

    // validasi post/edit (halaman post/edit)
    public function validationPostEdit(){
      $this->load->library('form_validation');
      $rules = [
        [
          'field' => 'judul',
          'label' => 'Judul',
          'rules' => 'trim|required'
        ],
        [
          'field' => 'isi',
          'label' => 'Isi',
          'rules' => 'trim|required'
        ]
      ];
      $this->form_validation->set_rules($rules);
      $this->form_validation->set_error_delimiters('<span class="btn btn-outline-danger text-left mb-3">', '</span>');
      return $this->form_validation->run();
    }

    // mengambil artikel berdasarkan id artikel
    public function getSomeArtikel($id){
      return $this->db->where('id_artikel', $id)->get('artikel')->row();
    }

    // update artikel
    public function updateArtikel($id, $data){
      return $this->db->where('id_artikel', $id)->update('artikel', $data);
    }

    // update user
    public function updateUser($username, $data){
      return $this->db->where('username', $username)->update('user', $data);
    }

    // menghapus artikel
    public function deleteArtikel($id){
      return $this->db->where('id_artikel', $id)->delete('artikel');
    }

    // artikel request || artikel yang belum tervalidasi oleh admin
    public function artikelRequest(){
      return $this->db->select('*')->from('artikel')->join('kategori','artikel.id_kategori = kategori.id_kategori')->join('user','artikel.id_user = user.id_user')->order_by('id_artikel', 'DESC')->get()->result();
    }

    // semua artikel
    public function allArtikel(){
      return $this->db->select('*')->from('artikel')->join('kategori','artikel.id_kategori = kategori.id_kategori')->join('user','artikel.id_user = user.id_user')->order_by('id_artikel', 'DESC')->get()->result();
    }

    public function countArtikel(){
      return $this->db->get('artikel')->num_rows();
    }


  }
