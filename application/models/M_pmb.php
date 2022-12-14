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

    public function jumlahPendaftarProdi1()
    {
        $this->db->select(['count(id_pendaftar) as jumlah', 'id_prodi1', "concat(jenjang, ' - ',nama_prodi) as prodi"]);
        $this->db->join('prodi', 'pendaftar.id_prodi1 = prodi.id_prodi');
        $this->db->group_by('id_prodi1');
        $data = $this->db->get('pendaftar')->result_array();
        return $data;
    }

    public function jumlahPendaftarProdi2()
    {
        $this->db->select(['count(id_pendaftar) as jumlah', 'id_prodi2', "concat(jenjang, ' - ',nama_prodi) as prodi"]);
        $this->db->join('prodi', 'pendaftar.id_prodi2 = prodi.id_prodi');
        $this->db->group_by('id_prodi2');
        $data = $this->db->get('pendaftar')->result_array();
        return $data;
    }

    public function pendaftarPrestasi()
    {
        $this->db->select(['count(id_pendaftar) as jumlah', 'tingkat_prestasi']);
        $this->db->group_by('tingkat_prestasi');
        $data = $this->db->get('pendaftar_prestasi')->result_array();
        // $data = $this->db->query("SELECT COUNT(id_pendaftar) AS jumlah, tingkat_prestasi
        // FROM pendaftar_prestasi GROUP BY tingkat_prestasi")->result_array();
        return $data;
    }

    public function pendaftarJalurMasuk()
    {
        $this->db->select(['count(id_pendaftar) as jumlah', 'pendaftar.id_jalur', 'j.nama_jalur']);
        $this->db->join('jalur_masuk j', 'pendaftar.id_jalur = j.id_jalur');
        $this->db->group_by('pendaftar.id_jalur');
        $data = $this->db->get('pendaftar')->result_array();
        return $data;
    }

    public function listBank()
    {
        $data = $this->db->get('bank')->result_array();
        return $data;
    }

    public function pendaftarBank()
    {
        $this->db->select(['COUNT(id_pendaftar) AS jumlah', 'SUM(pendaftar.nominal_bayar) AS total', 'pendaftar.id_bank', 'pendaftar.is_bayar', 'bank.bank']);
        $this->db->join('bank', 'pendaftar.id_bank = bank.id_bank');
        $this->db->where_in('id_jalur', [1, 2,]);
        $this->db->group_by(['id_bank', 'is_bayar']);
        $data = $this->db->get('pendaftar')->result_array();
        return $data;
    }
}
