<?php
//1.koneksi ke database
$koneksi=mysql_connect("localhost","root","");
$db=mysql_select_db("bpjs");
/*	if($koneksi){
		echo("koneksi tersedia <br>");
	} else {
		echo("tidak ada koneksi <br>");
	}
	if($db){
		echo("db ada <br>");
	} else {
		echo ("mana dbnya? <br>");
	}
*/
//2. query database
$query = "select * from daftar_benefit";
$hasil = mysql_query($query);
$databpjs=array();
while($data=mysql_fetch_array($hasil)){
	$databpjs [] = array('nik'=>$data['NIK'],
	'nokk'=>$data['nokk'],
	'nama'=>$data['nama'],
	'tanggal_lahir'=>$data['tanggal_lahir'],
	'telp'=>$data['telp'],
	'alamat'=>$data['alamat'],
	'pekerjaan'=>$data['pekerjaan'],
	'jml_iuran'=>$data['jml_iuran'],
	'nama_wali'=>$data['nama_wali'],
	'alamat_wali'=>$data['alamat_wali'],
	'telp_wali'=>$data['telp_wali'],
	'hub_wali'=>$data['hub_wali']);
	echo $data['NIK'];
}

//3.parsing data xml_error_string
$document = new DOMDocument();
$document->formatOutput=true;
$root=$document->createElement("data");
$document->appendChild($root);
foreach($databpjs as $peserta){
	$block = $document->createElement("daftar_benefit_bpjs");
	
	//create element nik
	$nik=$document->createElement("nik");
	//createElement untuk membuat element baru
	$nik->appendChild($document->createTextNode($peserta['nik']));
	//createTextNode untuk menampilkan isi/value
	$block->appendChild($nik);
	//appendChild untuk mempersiapkan nilai dari element diatasnya
	
	//element nokk
	$nokk= $document->createElement("nokk");
	$nokk->appendChild($document->createTextNode($peserta['nokk']));
	$block->appendChild($nokk);

	//element nama
	$nama= $document->createElement("nama");
	$nama->appendChild($document->createTextNode($peserta['nama']));
	$block->appendChild($nama);

	//element tl
	$tanggal_lahir= $document->createElement("tanggal_lahir");
	$tanggal_lahir->appendChild($document->createTextNode($peserta['tanggal_lahir']));
	$block->appendChild($tanggal_lahir);
	
	//element telp
	$telp= $document->createElement("telp");
	$telp->appendChild($document->createTextNode($peserta['telp']));
	$block->appendChild($telp);

	//element alamat
	$alamat= $document->createElement("alamat");
	$alamat->appendChild($document->createTextNode($peserta['alamat']));
	$block->appendChild($alamat);
	
	//element pekerjaan
	$pekerjaan= $document->createElement("pekerjaan");
	$pekerjaan->appendChild($document->createTextNode($peserta['pekerjaan']));
	$block->appendChild($pekerjaan);
	
	//element iuran
	$jml_iuran= $document->createElement("jml_iuran");
	$jml_iuran->appendChild($document->createTextNode($peserta['jml_iuran']));
	$block->appendChild($jml_iuran);

	//element nama wali
	$nama_wali= $document->createElement("nama_wali");
	$nama_wali->appendChild($document->createTextNode($peserta['nama_wali']));
	$block->appendChild($nama_wali);

	//element alamat wali
	$alamat_wali= $document->createElement("alamat_wali");
	$alamat_wali->appendChild($document->createTextNode($peserta['alamat_wali']));
	$block->appendChild($alamat_wali);

	//element telp wali
	$telp_wali= $document->createElement("telp_wali");
	$telp_wali->appendChild($document->createTextNode($peserta['telp_wali']));
	$block->appendChild($telp_wali);

	//element hubungan dengan wali
	$hub_wali= $document->createElement("hub_wali");
	$hub_wali->appendChild($document->createTextNode($peserta['hub_wali']));
	$block->appendChild($hub_wali);

	$root->appendChild($block);
}

//4. menyimpan data dalam bentuk xml
$generateTextXML=$document->save("daftar_benefit_bpjs.xml");
if($generateTextXML){
	echo("berhasil di generate <br/>");
} else {
	echo("gagal generatenya <br/>");
}

//5. membaca file XML
	//membuka file
$url="http://localhost/web_svr/peserta_service.xml";
$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER,1);
$response = curl_exec($client);
curl_close($client);
	//membaca file
	
/*//6. menampilkan dalam bentuk html
$databpjsxml = simplexml_load_string($response);
echo "
	<table border='1'>
		<tr>
			<td>NIK</td>
			<td>No KK</td>
			<td>Nama</td>
			<td>tanggal Lahir</td>
			<td>telp</td>
			<td>Alamat</td>
			<td>pekerjaan</td>
			<td>Jumlah Iuran</td>
			<td>Nama Wali</td>
			<td>Alamat Wali</td>
			<td>telp. Wali</td>
			<td>hubungan dengan wali</td>
		</tr>";
foreach($databpjsxml->peserta as $peserta){
	echo "
	<tr>
			<td>".$peserta->NIK."</td>
			<td>".$peserta->nokk."</td>
			<td>".$peserta->nama."</td>
			<td>".$peserta->tanggal_lahir."</td>
			<td>".$peserta->telp."</td>
			<td>".$peserta->alamat."</td>
			<td>".$peserta->pekerjaan."</td>
			<td>".$peserta->jml_iuran."</td>
			<td>".$peserta->nama_wali."</td>
			<td>".$peserta->alamat_wali."</td>
			<td>".$peserta->telp_wali."</td>
			<td>".$peserta->hub_wali."</td>
	</tr>";
}
echo "</table>"*/
?>