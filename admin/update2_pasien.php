<?php
include "../include/connect.php";//sambung ke mysql

//mengambil nilai dari FORM
$kode_ps_lama = $_POST['kode_ps_lama'];
$kode_pasien = $_POST['kode_ps_lama'];
$tgl_masuk = $_POST['tgl_masuk'];
$nama_pasien = ucwords($_POST['nama_pasien']);
$tgl_lahir = $_POST['tgl_lahir'];
$tempat_lahir = $_POST['tempat_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$usia = $_POST['usia'];
$jenis_pasien = $_POST['jenis_pasien'];
$obat = $_POST['nama_obat'];
$ruangan = $_POST['ruangan'];
$jenis_ruangan = $_POST['jenis_ruangan'];
$nama_ruangan = $_POST['nama_ruangan'];
$no_ranjang = $_POST['no_ranjang'];
$penyakit = ucwords($_POST['penyakit']);

//Query update data tabel pasien
$hasil = mysql_query("UPDATE pasien SET nama_pasien = '$nama_pasien', tanggal_lahir = '$tgl_lahir', tempat_lahir = '$tempat_lahir', jenis_kelamin = '$jenis_kelamin', alamat_pasien = '$alamat', usia = '$usia', jenis_pasien = '$jenis_pasien', penyakit_diderita = '$penyakit' WHERE kode_pasien = '$kode_ps_lama' ");

$sakit=strtolower($penyakit);
switch($sakit){
case "Kontrol Gigi" : $kode_dokter = "10001";break;
case "melahirkan" : $kode_dokter = "10004";break;
case "Bedah Luka" : $kode_dokter = "10005";break;
case "Radang" : $kode_dokter = "10002";break;
case "Katarak" : $kode_dokter = "10007";break;
case "Imunisasi" : $kode_dokter = "10006";break;
case "Cek Up" : $kode_dokter = "10003";break;
case "Urat" : $kode_dokter = "10008";break;
default : $kode_dokter="10010";
}

$kode_masuk = mysql_query("SELECT kode_masuk AS kode FROM tgl_masuk WHERE kode_pasien='$kode_ps_lama'");
$kode = mysql_fetch_array($kode_masuk);
$kode_masuk = $kode['kode'];
//echo mysql_error();

$hasil2 = mysql_query("UPDATE tgl_masuk SET kode_masuk='$kode_masuk', kode_dokter='$kode_dokter',kode_ruangan='$ruangan',tgl_masuk='$tgl_masuk' WHERE kode_pasien='$kode_ps_lama'");

$hasil21 = mysql_query("SELECT nama_obat FROM obat");

$hasil3 = mysql_query("UPDATE ruangan SET kode_ruangan='$ruangan', nama_ruangan = '$nama_ruangan', jenis_ruangan = '$jenis_ruangan', no_ranjang = '$no_ranjang' WHERE kode_pasien = '$kode_ps_lama'");

if ($hasil && $hasil2){
//echo "Sukses";
?><script>document.location.href="lihat_pasien.php"</script><?php
}
else{
echo "gagal :  ".mysql_error();
}
?>
