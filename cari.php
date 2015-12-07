 <!-- form pencarian data -->
<form method="post" action="index.php?op=search">
    <h4>Masukan No KK dan NIK anda untuk mengetahui apakah anda terdaftar atau belum</h4>
    <table style='border:none;'>
        <tr>
            <td style='border:none;'>No KK</td>
            <td style='border:none;'><input type="text" name="kk"/></td>
        </tr>
        <tr>
            <td style='border:none;'>NIK</td>
            <td style='border:none;'><input type="text" name="nik"/></td>
        </tr>
        <tr><td style='border:none;'>&nbsp;</td>
            <td style='border:none;'><input type="submit" name="submit" value="submit"/></td>
        </tr>
    </table>
</form>
<br />
<?php
// proses pencarian data
if (isset($_GET['op'])) {
    if ($_GET['op'] == 'search') {
        require_once('lib/nusoap.php');
// baca keyword pencarian dari form
        $key = $_POST['key'];
        $kriteria = $_POST['kriteria'];

// instansiasi obyek untuk class nusoap client, arahkan URL ke script server.php di server A
        $client = new nusoap_client('http://localhost/web_svr/server.php');
// proses call method 'search' dengan parameter key di script server.php yang ada di server A
        if ($kriteria == 'Barang') {

            $result = $client->call('cari_barang', array('key' => $key));
// jika data hasil pencarian ($result) ada, maka tampilkan
            if (is_array($result)) {
                echo "<table border='1'><thead>";
                echo
                "<tr><th>Kode Barang</th><th width='300'>Nama Barang</th><th>Jumlah Stok</th></tr></thead>";
                $no = 1;
                foreach ($result as $data) {
                    $warna = ($no % 2 == 1) ? "light" : "dark";
                    echo
                    "<tr class=\"" . $warna . "\"><td>" . $data['kode_barang'] . "</td><td>" . $data['nama_barang'] . "</td><td>" . $data['jumlah'] . "</td></tr>";
                    $no++;
                }
                echo "</table>";
// menampilkan jumlah data hasil pencarian
                echo "<p>Ditemukan " . count($result) . " data terkait kata kunci : '" . $key . "'</p>";
            } else
                echo "<p>Data tidak ditemukan</p>";
        }else{
		$result = $client->call('cari_spl', array('key' => $key));
// jika data hasil pencarian ($result) ada, maka tampilkan
            if (is_array($result)) {
                echo "<table border='1'><thead>";
                echo
                "<tr><th>Kode Suplier</th><th width='300'>Nama Suplier</th><th>Alamat</th></tr></thead>";
                $no = 1;
                foreach ($result as $data) {
                    $warna = ($no % 2 == 1) ? "light" : "dark";
                    echo
                    "<tr class=\"" . $warna . "\"><td>" . $data['kode_suplier'] . "</td><td>" . $data['nama_suplier'] . "</td><td>" . $data['alamat'] . "</td></tr>";
                    $no++;
                }
                echo "</table>";
// menampilkan jumlah data hasil pencarian
                echo "<p>Ditemukan " . count($result) . " data terkait kata kunci : '" . $key . "'</p>";
            } else
                echo "<p>Data tidak ditemukan</p>";
        }
    }
}
?>