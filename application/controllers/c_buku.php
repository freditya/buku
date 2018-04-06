<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_buku extends CI_Controller {

function __construct(){
	parent::__construct();
	$this->load->model('m_buku');
}

	public function index()
	{
	 $data['title']='ini contoh untuk menampilkan data';
	// $data['buku']=$this->m_buku->selectAll();
	//$data['pen']=$this->m_buku->selectPen();
	$jumlah=$this->m_buku->jumlah()->result();
	foreach ($jumlah as $jum) {
		$juml=$jum->total;
	}

	 $kd=0;
	 $bu=0;
	$buku=$this->m_buku->buku()->result();
		foreach ($buku as $bukus) {
			$kd_buku[$kd++]=$bukus->kd_buku;
			$judlbuku[$bu++]=$bukus->judul;
		}
		
		$cb=0;

		$penuli=array();
		$jum2=array();

		for ($i=0; $i <$juml ; $i++) { 
			$jumlah2=$this->m_buku->jumlah2($kd_buku[$i])->result();
			foreach ($jumlah2 as $ju) {
				$jum2[$i]=$ju->total;
			}
			for ($j=0; $j <$jum2[$i] ; $j++) { 			
			$penulis=$this->m_buku->buku($kd_buku[$i])->result();
			foreach ($penulis as $penu) {
			$penuli[$i][$j]=$penu->judul;
		}
		}	
	}
	
	$lol= $this->m_buku->det_pen('bk01')->result();
	foreach ($lol as $key) {
		$loli=$key->nama;
	}


	 print_r($penuli);
	 $data['jmlbuku']=$juml;
	 $data['jumlBukuDet']=$jum2;
	 $data['judul']=$judlbuku;
	 $data['coba']=$penuli;
	 
	$this->load->view('v_buku',$data);
	}

	public function table(){
		$buku=$this->m_buku->buku()->result();
		foreach ($buku as $bukus) {
			$kd_buku=$bukus->kd_buku;
		}
		$hasil['coba']=$kd_buku;
		//$this->load->view('v_buku',$hasil);
	}
}