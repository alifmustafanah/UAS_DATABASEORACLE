<?php
include("koneksi.php");
$hari_ini = date("dmY");

$act=$_GET['act'];

if ($act=='input'){
echo	$ID_PELANGGAN = $_POST['ID_PELANGGAN'];
echo	$ID_PRODUK = $_POST['ID_PRODUK'];
echo	$QUANTITY = $_POST['QUANTITY'];

	$sql = "INSERT INTO TRANSAKSI VALUES ('','$ID_PELANGGAN','$ID_PRODUK', '$QUANTITY', '$hari_ini')";
	$prepare = ociparse($koneksi, $sql);
    ociexecute($prepare);
    oci_commit($koneksi);
   

	if($prepare)
	{
	header('location:laporan.php');
	}
	else {echo "gagal";} 

}

?>
