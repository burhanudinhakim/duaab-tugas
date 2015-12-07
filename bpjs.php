<?php
require_once ('adodb/adodb/adodb.inc.php');

/**
* BPJS
*/
class bpjs
{

	function __construct()
	{
		$this->db = NewADOConnection('mysqli');
		$this->db->Connect('127.0.0.1','root','','bpjs');
	}

	function getpeserta()
	{
		$bpjs  = $this->db->Execute("SELECT * FROM peserta");
		return json_encode($bpjs->GetAssoc());
	}
	function getbenefit()
	{
		$bpjs  = $this->db->Execute("SELECT * FROM daftar_benefit");
		return json_encode($bpjs->GetAssoc());
	}
	function getriwayat()
	{
		$bpjs  = $this->db->Execute("SELECT * FROM riwayat");
		return json_encode($bpjs->GetAssoc());
	}
	function register($nik,$nokk,$nama,$tanggal_lahir,$telp,$alamat,$pekerjaan,$jml_iuran,$nama_wali,$alamat_wali,$telp_wali,$status_wali){
		$query="INSERT INTO peserta VALUES('$nik','$nokk','$nama','$tanggal_lahir','$telp','$alamat','$pekerjaan','$jml_iuran','$nama_wali','$alamat_wali','$telp_wali','$status_wali')";
		if(mysql_query($query)){
			return true;
		}else{
			return false;}
}

}

?>