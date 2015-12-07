<?php
error_reporting(E_ALL);
ini_set('display_error',1);

require_once('lib/nusoap.php');
$url = 'http://localhost/we_svr/server.php?wsdl';
$client = new nusoap_client($url, 'WSDL');

$result = $client->call('getbenefit');
$data = json_decode($result);
?>

<h3>DAFTAR BENEFIT PESERTA BPJS</h3>
<br />
<p align="center"><a href="?page=register">Tambah Data</a></p>
<table border="1" align="center" cellpadding="4" cellspacing="0">
	<tr>
		<td>No. BPJS</td>
		<td>NIK</td>
		<td>No kk</td>
		<td>Nama Peserta</td>
		<td colspan="3">Action</td>
	</tr>
	<?php foreach ($data as $key => $value) { ?>
    <tr>
      <td><?php echo $value->nobpjs?></td>
      <td><?php echo $value->nik?></td>
      <td><?php echo $value->nokk?></td>
      <td><?php echo $value->nama?></td>
      <td align=\"center\"><a href=\"?page=lihat&kode=$data[NIK]\">Lihat</a></td>
	  <td align=\"center\"><a href=\"?page=edit&kode=$data[NIK]\">Edit</a></td>
	  <td align=\"center\"><a href=\"?page=hapus&kode=$data[NIK]\">Hapus</a></td>
    </tr>
</table>
<?php } if (($action)=='register'){
	include('register.php');	} 
	?>
<!-- <table border="1"><thead>
<tr> <th> Kode Barang </th> <th> Nama Barang </th> <th> Jumlah </th><th> Suplier </th><th> Kode Suplier </th> <th colspan=2>Action </th> </tr></thead>
<?php
/*$no=1;
foreach ($response as $data){

$warna= ($no% 2 == 1) ? "light" : "dark";
echo "
<tr class=\"".$warna."\"> <td> $data[kode_barang]</td>
<td> $data[nama_barang] </td>
<td> $data[jumlah]</td>
<td> $data[nama_suplier]</td>
<td> $data[kode_suplier]</td>
<td align=\"center\"><a href=\"?page=edit&kode=$data[kode_barang]\">Edit</a></td>
<td align=\"center\"><a href=\"?page=hapus&kode=$data[kode_barang]\">Hapus</a></td>
</tr>";

$no++;
}*/
?>
<tr>
<td width='50' align='center'><a href="?page=tambah"> Tambah</a></td>
</tr>
</table> -->
