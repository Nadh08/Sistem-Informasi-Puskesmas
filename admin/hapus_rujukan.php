<?php
include "../include/connect.php";//sambungkan ke mysql

$koderujukan = $_GET['koderj'];

$hapus = mysql_query("DELETE FROM rujukan WHERE kode_rujukan = '$koderujukan'");//untuk menghapus kode_rujukan

if ($hapus){
//echo "Sukses Hapus";
?><script>document.location.href="lihat_rujukan.php"</script><?php
}else{
echo "Gagal : ".mysql_error();
}
?>
