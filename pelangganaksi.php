<?php
include("koneksi.php");

$act=$_GET['act'];

if ($act=='delete'){
	$ID_PELANGGAN=$_GET['ID_PELANGGAN'];
	$sql="DELETE FROM PELANGGAN WHERE ID_PELANGGAN = '$ID_PELANGGAN'";
	$prepare = ociparse($koneksi, $sql);
	ociexecute($prepare);
	oci_commit($koneksi);
	header('location:pelanggan.php');
}

elseif ($act=='input'){

	$ID_PELANGGAN = $_POST["ID_PELANGGAN"];
 	$NAMAPELANGGAN = $_POST["NAMAPELANGGAN"];
 	$TELP = $_POST["TELP"];
 	$ALAMAT = $_POST["ALAMAT"];

   $sql="insert into PELANGGAN values ('$ID_PELANGGAN','$NAMAPELANGGAN','$TELP','$ALAMAT') ";
   $prepare = ociparse($koneksi, $sql);
   ociexecute($prepare);
   oci_commit($koneksi);
   

	if($prepare)
	{
	header('location:pelanggan.php');
	}
	else {echo "gagal";}

}


elseif ($act=='update'){
	$ID_PELANGGAN = $_POST["ID_PELANGGAN"];
 	$NAMAPELANGGAN = $_POST["NAMAPELANGGAN"];
 	$TELP = $_POST["TELP"];
 	$ALAMAT = $_POST["ALAMAT"];

	$sql = "UPDATE PELANGGAN SET ID_PELANGGAN='$ID_PELANGGAN',NAMAPELANGGAN='$NAMAPELANGGAN',TELP='$TELP',ALAMAT='$ALAMAT' WHERE ID_PELANGGAN='$ID_PELANGGAN'";
	$prepare = ociparse($koneksi, $sql);
	ociexecute($prepare);
	oci_commit($koneksi);

	if($prepare)
	{
	header('location:pelanggan.php ?pesan=update');
	}
	else {echo "gagal";}

}
?>
