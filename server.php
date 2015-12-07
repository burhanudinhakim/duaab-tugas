<?php
require_once('lib/nusoap.php');
require_once('adodb/adodb/adodb.inc.php');

$ws_srv = new nusoap_server();
$ws_srv->configureWSDL('server', 'urn:server');
$ws_srv->wsdl->schemaTargetNamespace = 'urn:server';
$ws_srv->register('getpeserta',
    array(
      'return' => 'xsd:string'
    ),
    'urn:bpjs',
    'urn:bpjs#getpeserta',
    'rpc',
    'encoded',
    'getpeserta'
  );

function getpeserta() {
  $bpjs = new bpjs();
  return $bpjs->getpeserta();
}

$ws_srv->register('getriwayat');
$ws_srv->register('getbenefit');
$ws_srv->register('register');

function getriwayat() {
  $bpjs = new bpjs();
  return $bpjs->getriwayat();
}
function getbenefit() {
  $bpjs = new bpjs();
  return $bpjs->getbenefit();
}
function register($nik,$nokk,$nama,$tanggal_lahir,$telp,$alamat,$pekerjaan,$jml_iuran,$nama_wali,$alamat_wali,$telp_wali,$status_wali){
	$bpjs = new bpjs();
	return $bpjs->register($nik,$nokk,$nama,$tanggal_lahir,$telp,$alamat,$pekerjaan,$jml_iuran,$nama_wali,$alamat_wali,$telp_wali,$status_wali);	
}
$HTTP_RAW_POST_DATA = isset ($HTTP_RAW_POST_DATA) ?
$HTTP_RAW_POST_DATA:"";
$ws_srv->service($HTTP_RAW_POST_DATA);
?>