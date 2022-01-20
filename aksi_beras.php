<?php
include("koneksi.php");

$act=$_GET['act'];

if ($act=='delete'){
	$ID_PRODUK=$_GET['ID_PRODUK'];
	$sql="DELETE FROM PRODUK WHERE ID_PRODUK = '$ID_PRODUK'";
	$prepare = ociparse($koneksi, $sql);
	ociexecute($prepare);
	oci_commit($koneksi);
	header('location:beras.php');
}

elseif ($act=='input'){

	$ID_PRODUK = $_POST["ID_PRODUK"];
 	$NAMAPRODUK = $_POST["NAMAPRODUK"];
 	$JENISPRODUK = $_POST["JENISPRODUK"];
 	$HARGAPRODUK = $_POST["HARGAPRODUK"];

   $sql="insert into PRODUK values ('$ID_PRODUK','$NAMAPRODUK','$JENISPRODUK','$HARGAPRODUK') ";
   $prepare = ociparse($koneksi, $sql);
   ociexecute($prepare);
   oci_commit($koneksi);
   

	if($prepare)
	{
	header('location:beras.php');
	}
	else {echo "gagal";}

}


elseif ($act=='update'){
	$ID_PRODUK = $_POST["ID_PRODUK"];
 	$NAMAPRODUK = $_POST["NAMAPRODUK"];
	$JENISPRODUK = $_POST["JENISPRODUK"];	
	$HARGAPRODUK = $_POST["HARGAPRODUK"];
	

	$sql = "UPDATE PRODUK SET NAMAPRODUK='$NAMAPRODUK', JENISPRODUK='$JENISPRODUK', HARGAPRODUK='$HARGAPRODUK' WHERE ID_PRODUK='$ID_PRODUK'";

	 $prepare = ociparse($koneksi, $sql);
   ociexecute($prepare);
   oci_commit($koneksi);
   if($prepare)
	{
	header('location:beras.php');
	}
	else {echo "gagal";}
   



}
?>
