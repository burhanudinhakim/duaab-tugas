<?php
require_once('lib/nusoap.php');
$wsdl = "http://localhost/web_svr/server.php";
?>    <div align='left'>
        <form id="form1" name="form1" method="post" action="">
            <table style='border:none;'>
                <h3 align='left'> Tambah Data Riwayat </h3>
                <br />
                <tr><td style='border:none;'><label><strong>NIK</strong></label></td>
                    <td style='border:none;'>:&nbsp;<input name="nik" type="text" id="nik"/></td>
                </tr>
                <tr><td
                        style='border:none;'><label><strong>NO KK</strong></label></td>
                    <td style='border:none;'>:&nbsp;<input name="nokk" type="text" id="nama_barang" /></td></tr>
                <tr><td
                        style='border:none;'><label><strong>Nama</strong></label></td>
                    <td style='border:none;'>:&nbsp;<input name="nama" type="text"  id="nama" /></td>
                </tr>
                <tr><td
                        style='border:none;'><label><strong>Tanggal lahir</strong></label></td>
                    <td style='border:none;'>:&nbsp;<input name="tanggal_lahir" type="text"  id="tanggal_lahir" /></td>
                </tr>
                <tr><td
                        style='border:none;'><label><strong>No telp</strong></label></td>
                    <td style='border:none;'>:&nbsp;<input name="telp" type="text"  id="telp" /></td>
                </tr>
                <tr><td
                        style='border:none;'><label><strong>Alamat</strong></label></td>
                    <td style='border:none;'>:&nbsp;<input name="alamat" type="text"  id="alamat" /></td>
                </tr>
                <tr><td
                        style='border:none;'><label><strong>Pekerjaan</strong></label></td>
                    <td style='border:none;'>:&nbsp;<input name="pekerjaan" type="text"  id="pekerjaan" /></td>
                </tr>
                <tr><td
                        style='border:none;'><label><strong>Jumlah Iuran</strong></label></td>
                    <td style='border:none;'>:&nbsp;<input name="jml_iuran" type="text"  id="jml_iuran" /></td>
                </tr>
                <tr>
                    <td style="border:none;"><Strong>-------- Wali -----------</Strong></td>
                </tr>
                <tr><td
                        style='border:none;'><label><strong>Nama</strong></label></td>
                    <td style='border:none;'>:&nbsp;<input name="nama_wali" type="text"  id="nama_wali" /></td>
                </tr>
                <tr><td
                        style='border:none;'><label><strong>Alamat</strong></label></td>
                    <td style='border:none;'>:&nbsp;<input name="alamat_wali" type="text"  id="alamat_wali" /></td>
                </tr>
                <tr><td
                        style='border:none;'><label><strong>No telp.</strong></label></td>
                    <td style='border:none;'>:&nbsp;<input name="telp_wali" type="text"  id="telp_wali" /></td>
                </tr>
                <tr><td
                        style='border:none;'><label><strong>Hubungan dengan wali</strong></label></td>
                    <td style='border:none;'>:&nbsp;<input name="hub_wali" type="text"  id="hub_wali" /></td>
                </tr>

                <tr><td
                        style='border:none;'><label><strong>Pekerjaan Wali</strong></label></td>
                    <td style='border:none;'>:&nbsp;<input name="pekerjaan_wali" type="text"  id="pekerjaan_wali" /></td>
                </tr>
            </table>
            <input type='reset' name='reset' value='Reset' />&nbsp;&nbsp;<input
                type='submit' name='submit' value='Daftar' />
            <br><br>
        </form>

<!-- <div id="dtbrg">
<input type="button" value="Lihat Daftar Barang" 
       onclick="ambilData('list_barang.php', 'id_info')" />
<p id="id_info"></p>
 -->

<?php
    $client = new nusoap_client($wsdl) or die("Error");
    $nik = $_POST['nik'];
    $nokk = $_POST['nokk'];
    $nama = $_POST['nama'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];
    $pekerjaan = $_POST['pekerjaan'];
    $jml_iuran = $_POST['jml_iuran'];
    $nama_wali = $_POST['nama_wali'];
    $alamat_wali = $_POST['alamat_wali'];
    $telp_wali = $_POST['telp_wali'];
    $hub_wali = $_POST['hub_wali'];
    $pekerjaan_wali = $_POST['pekerjaan_wali'];
    if (isset($nik)) {
        $response = $client->call('register', array('nik' => $nik, 'nokk' => $nokk,'nama' => $nama, 'tanggal_lahir' => $tanggal_lahir,'telp'=>$telp,'alamat'=>$alamat,'pekerjaan'=>$pekerjaan,'jml_iuran'=>$jml_iuran,'nama_wali'=>$nama_wali,'alamat_wali'=>$alamat_wali,'telp_wali'=>$telp_wali,'hub_wali'=>$hub_wali,'pekerjaan_wali'=>$pekerjaan_wali,)) or die("Gagal Menyimpan");
        if($response){
            echo "Tambah data barang berhasil <br /><br />";
        }
    }
    ?>