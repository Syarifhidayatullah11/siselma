<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pmb', 'm_pmb');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $this->render('index/index', $data);
    }

    public function pendaftarprodi1()
    {
        $data['title'] = 'Grafik Berdasarkan Prodi 1';
        $pendaftar = $this->m_pmb->jumlahPendaftarProdi1();

        $result = null;
        $sliced = null;
        $selected = null;
        $max = 0;
        $sumTotal = 0;
        foreach ($pendaftar as $key => $p) {
            if ($max < $p['jumlah']) {
                $max = $p['jumlah'];
                $posisi = $key;
            }
        }
        foreach ($pendaftar as $p => $prod) {
            if ($p == $posisi) {
                $sliced = true;
                $selected = true;
            } else {
                $sliced = false;
                $selected = false;
            }
            $sumTotal += $prod['jumlah'];
            $result[$p] = [
                "name"  => $prod['prodi'],
                "jumlah" => intval($prod['jumlah']),
                "y"     => intval($prod['jumlah']),
                "sliced" => $sliced,
                'selected' => $selected
            ];
        }
        $data['subtitle'] = 'Jumlah Pendaftar :' . $sumTotal;
        $data['grafik'] = json_encode($result);
        $this->render('index/grafik_satu', $data);
    }

    public function pendaftarprodi2()
    {
        $data['title'] = 'Grafik Berdasarkan Prodi 2';
        $pendaftar = $this->m_pmb->jumlahPendaftarProdi2();

        $result = null;
        $sliced = null;
        $selected = null;
        $max = 0;
        $sumTotal = 0;
        foreach ($pendaftar as $key => $p) {
            if ($max < $p['jumlah']) {
                $max = $p['jumlah'];
                $posisi = $key;
            }
        }
        foreach ($pendaftar as $p => $prod) {
            if ($p == $posisi) {
                $sliced = true;
                $selected = true;
            } else {
                $sliced = false;
                $selected = false;
            }
            $sumTotal += $prod['jumlah'];
            $result[$p] = [
                "name"  => $prod['prodi'],
                "jumlah" => intval($prod['jumlah']),
                "y"     => intval($prod['jumlah']),
                "sliced" => $sliced,
                'selected' => $selected
            ];
        }
        $data['subtitle'] = 'Jumlah Pendaftar :' . $sumTotal;
        $data['grafik'] = json_encode($result);
        $this->render('index/grafik_dua', $data);
    }

    public function pendaftarprestasi()
    {
        $data['title'] = 'Pendaftar Jalur Mandiri Berprestasi';
        $pendaftar = $this->m_pmb->pendaftarPrestasi();
        $grafik = null;
        $sumTotal = 0;
        foreach ($pendaftar as $key => $value) {
            $sumTotal += $value['jumlah'];
            $grafik[$key] = [
                'name'      => $value['tingkat_prestasi'],
                'jumlah'    => intval($value['jumlah']),
                'y'         => intval($value['jumlah']),
            ];
        }
        $data['subtitle'] = 'Jumlah Pendaftar :' . $sumTotal;
        $data['grafik'] = json_encode($grafik);
        $this->render('index/grafik_tiga', $data);
    }

    public function pendaftarjalur()
    {
        $data['title'] = 'Pendaftar Berdasarkan Jalur';
        $pendaftar = $this->m_pmb->pendaftarJalurMasuk();
        $grafik = null;
        $sumTotal = 0;
        foreach ($pendaftar as $key => $value) {
            $sumTotal += $value['jumlah'];
            $grafik[$key] = [
                'name'      => $value['nama_jalur'],
                'jumlah'    => $value['jumlah'],
                'y'         => intval($value['jumlah']),
            ];
        }
        $data['subtitle'] = 'Jumlah Pendaftar :' . $sumTotal;
        $data['grafik'] = json_encode($grafik);
        $this->render('index/grafik_empat', $data);
    }

    public function grafikPendapatan()
    {
        $data['title'] = 'Grafik Pendapatan Berdasarkan Bank';
        $bank = $this->m_pmb->listBank();
        $pendaftar = $this->m_pmb->pendaftarBank();

        $categories = null;
        $lunas = null;
        $belum_lunas = null;
        $sumTotal = 0;
        foreach ($bank as $i => $b) {
            $categories[] = $b['bank'];
            foreach ($pendaftar as $key => $value) {
                if ($b['id_bank'] == $value['id_bank']) {
                    if ($value['is_bayar'] == '1') {
                        $sumTotal += intval($value['total']);
                        $lunas[] = intval($value['total']);
                    } else {
                        $belum_lunas[] = intval($value['total']);
                    }
                }
            }
        }
        $result[] = [
            'name' => 'Pendapatan',
            'data' => $lunas,
        ];
        $data['subtitle'] = 'Total Pendapatan Rp. ' . $sumTotal;
        $grafik['data'] = json_encode($result);
        $grafik['categories'] = json_encode($categories);
        $data['grafik'] = $grafik;
        $this->render('index/grafik_pendapatan', $data);
    }

    public function pendaftarBank()
    {
        $data['title'] = 'Grafik Pendaftar Berdasarkan Bank';
        $bank = $this->m_pmb->listBank();
        $pendaftar = $this->m_pmb->pendaftarBank();
        $categories = null;
        $lunas = null;
        $belum_lunas = null;
        $sumTotal = 0;
        foreach ($bank as $i => $b) {
            $categories[] = $b['bank'];
            foreach ($pendaftar as $key => $value) {
                if ($b['id_bank'] == $value['id_bank']) {
                    if ($value['is_bayar'] == '1') {
                        $sumTotal += $value['jumlah'];
                        $lunas[] = intval($value['jumlah']);
                    } else {
                        $sumTotal += $value['jumlah'];
                        $belum_lunas[] = intval($value['jumlah']);
                    }
                }
            }
        }
        $result[] = [
            'name' => 'Lunas',
            'data' => $lunas,
        ];
        $result[] = [
            'name' => 'Belum Lunas',
            'data' => $belum_lunas
        ];
        $data['subtitle'] = 'Total Pendaftar: ' . $sumTotal;
        $grafik['data'] = json_encode($result, 1);
        $grafik['categories'] = json_encode($categories);
        $data['grafik'] = $grafik;
        $this->render('index/grafik_enam', $data);
    }
}
