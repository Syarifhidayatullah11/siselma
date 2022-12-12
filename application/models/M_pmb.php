<?php
class M_pmb extends CI_Model
 {
  
        public function listPendaftar()
        {
                return $this->db->get('pendaftar')->result_array();
        }

        public function listProdi()
        {
          return $this->db->get('prodi')->result_array();
        }

        public function jumlahPendaftar($idProdi)
        {
          $this->db->where('id_prodi1', $idProdi);
          $this->db->get('pendaftar');

        }



  }
?>