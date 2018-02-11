<?php
  class Gallery_model extends CI_Model{
    public function allGallery(){
      return $this->db->select('*')->from('galeri')->join('detail_galeri','galeri.id_galeri = detail_galeri.id_galeri')->group_by('galeri.id_galeri')->get()->result();
    }

    public function getDetailGallery($slug){
      return $this->db->select('*')->from('galeri')->join('detail_galeri','galeri.id_galeri = detail_galeri.id_galeri')->where('slug_galeri', $slug)->get()->row();
    }

    public function getOnlyGallery($slug){
      return $this->db->select('*')->from('galeri')->where('slug_galeri', $slug)->get()->row();
    }

    public function getImageGallery($slug){
      return $this->db->select('*')->from('galeri')->join('detail_galeri','galeri.id_galeri = detail_galeri.id_galeri')->where('slug_galeri', $slug)->get()->result();
    }

    public function countAllGallery(){
      $jumlah = $this->db->select('*')->from('galeri')->join('detail_galeri','galeri.id_galeri = detail_galeri.id_galeri')->group_by('galeri.id_galeri')->get()->result();
      return count($jumlah);
    }

    public function insertGallery($data){
      return $this->db->insert('galeri', $data);
    }

    public function insertDetailGallery($data){
      return $this->db->insert('detail_galeri', $data);
    }

    public function validationGallery(){
      $this->load->library('form_validation');
      $rules = [
        [
          'field' => 'nama_galeri',
          'label' => 'Nama Galeri',
          'rules' => 'trim|required'
        ],
        [
          'field' => 'waktu_galeri',
          'label' => 'Waktu Galeri',
          'rules' => 'trim|required'
        ],
        [
          'field' => 'deskripsi_galeri',
          'label' => 'Deskripsi Galeri',
          'rules' => 'trim|required'
        ],
      ];
      $this->form_validation->set_rules($rules);
      $this->form_validation->set_error_delimiters('<div class="text-center mb-3" style="color:red; border:1px solid red; padding:5px">', '</div>');
      return $this->form_validation->run();
    }

    public function defaultGalleryValues(){
      return [
        'nama_galeri' => '',
        'deskripsi_galeri' => '',
        'waktu_galeri' => '2010-01-01'
      ];
    }

    public function getGallery($id){
      return $this->db->where('id_galeri', $id)->get('galeri')->row();
    }

    public function justImageGallery($id){
      return $this->db->select('*')->from('detail_galeri')->join('galeri','galeri.id_galeri = detail_galeri.id_galeri')->where('galeri.id_galeri', $id)->get()->result();
    }

    public function updateGallery($id, $data){
      return $this->db->where('id_galeri', $id)->update('galeri', $data);
    }

    public function deleteGallery($id){
      return $this->db->where('id_galeri', $id)->delete('galeri');
    }

    public function deleteImageGallery($id){
      return $this->db->where('id_detail_galeri', $id)->delete('detail_galeri');
    }

  }
