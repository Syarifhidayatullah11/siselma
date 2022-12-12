<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller
{

	public function __construct()
			{
				parent:: __construct();
				$this->load->model('M_pmb', 'm_pmb');
			}

	public function index()
	        {
				$this->load->view('index/index');
	        }

	public function pendaftar()
	        {
				$prodi = $this->m_pmb->listProdi();
				$jumlah = null;
				foreach ($prodi as $key => $p) {
					$prodi[$key]['jumlah'] = $this->m_pmb->jumlahPendaftar($p['id_prodi']);
					$prodi[$key]['size'] = rand(10,30);
				}

                $result = null;
                foreach ($prodi as $p => $prod) {
                	$result[$p] = [
                		"name" => $prod['nama_prodi'],
                		"y"	   => $prod['size'],
                	];
                }

			    $data['pendaftar'] = $prodi;
			    $data['grafik'] = $result;
			    echo '<pre>';
			    print_r($data);
			    echo '</pre>';
			    die;
				

				$data['pendaftar'] = $prodi;
				$this->load->view('index/pendaftar', $data);
	        }

}

?>ss
