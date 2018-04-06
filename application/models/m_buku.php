<?php
class M_buku extends CI_Model{
   function selectAll()
   {
		$this->db->order_by("Judul","desc"); 
		return $this->db->get('tb_buku')->result();
   }

  //  function selectPen()
  //  { 
		// $query= $this->db->query("SELECT tb_buku.judul, tb_penulis.nama FROM tb_penulis, tb_buku,tb_det_pen WHERE tb_det_pen.kd_buku='bk01' GROUP BY nama");
  //     if($query->num_rows()>0){
  //        foreach ($query->result_array() as $data) {
  //           $hasil=array(
  //              'judul' => $data->judul,
  //              'nama' => $data->nama,
  //              );
  //        }
  //     }
		// return $hasil;
  //  }

   function jumlah(){
     
    $this->db->select('COUNT(kd_buku) as total');
    $this->db->from('tb_buku');
    $query =$this->db->get();
    return $query;
  
   }
   function jumlah2($kd){
     
    $this->db->select('COUNT(kd_buku) as total');
    $this->db->from('tb_det_pen');
    $this->db->where('kd_buku',$kd);
    $query =$this->db->get();
    return $query;
  
   }

   function buku(){
      $this->db->select("*");
      $this->db->from("tb_buku");
      $query=$this->db->get();
      return $query;
   }

   function det_pen($kd){
      $this->db->select("tb_penulis.nama as nama");
      // $this->db->group_by("nama");
      $this->db->from("tb_penulis");
      $this->db->from("tb_buku");
      $this->db->from("tb_det_pen");
      $this->db->where("tb_det_pen.kd_buku=tb_buku.kd_buku");
      $this->db->where("tb_det_pen.kd_penulis=tb_penulis.kd_penulis");
      $this->db->where("tb_det_pen.kd_buku",$kd);
      
      $query=$this->db->get();
      return $query;


   }

   function det($kd){
      $this->db->join("tb_buku","tb_det_pen.kd_buku=tb_buku.kd_buku");
      $this->db->join("tb_penulis","tb_det_pen.kd_penulis=tb_penulis.kd_penulis");
      $this->db->where("tb_det_pen.kd_buku",$kd);
      $query=$this->db->get("tb_det_pen");
      return $query;
   }

   //    public function det_pen(){
   //    $this->db->select("tb_penulis.nama");
   //    $this->db->from('tb_penulis');
   //          $this->db->join('tb_det_pen','tb_det_pen.kd_penulis=tb_penulis.kd_penulis');
   //    $this->db->join('tb_buku','tb_buku.kd_buku=tb_det_pen.kd_buku');
   //    $this->db->where("tb_det_pen.kd_buku='bk01'");
   //    $query = $this->db->get();
   //    if($query->num_rows() > 0){
   //       return $query;
   //    }else{
   //       return false;
   //    }
   // }



}
?>