<?php
include("koneksi.php");

$act=$_GET['act'];

if ($act=='delete'){
	$ID_USER=$_GET['ID_USER'];
	$sql="DELETE FROM ADMIN WHERE ID_USER = '$ID_USER'";
	$prepare = ociparse($koneksi, $sql);
	ociexecute($prepare);
	oci_commit($koneksi);
	header('location:useradmin.php');
}

elseif ($act=='input'){

	$ID_USER = $_POST["ID_USER"];
 	$USERNAME = $_POST["USERNAME"];
 	$PASSWORD = $_POST["PASSWORD"];
 	$TELP = $_POST["TELP"];

   $sql="insert into ADMIN values ('$ID_USER','$USERNAME','$PASSWORD','$TELP') ";
   $prepare = ociparse($koneksi, $sql);
   ociexecute($prepare);
   oci_commit($koneksi);
   

	if($prepare)
	{
	header('location:useradmin.php');
	}
	else {echo "gagal";}

}


elseif ($act=='update'){
	$ID_USER = $_POST["ID_USER"];
 	$USERNAME = $_POST["USERNAME"];
 	$PASSWORD = $_POST["PASSWORD"];
 	$TELP = $_POST["TELP"];

	$sql = "UPDATE ADMIN SET ID_USER='$ID_USER',USERNAME='$USERNAME',PASSWORD='$PASSWORD',TELP='$TELP' WHERE ID_USER='$ID_USER'";
	$prepare = ociparse($koneksi, $sql);
	ociexecute($prepare);
	oci_commit($koneksi);

	if($prepare)
	{
	header('location:useradmin.php ?pesan=update');
	}
	else {echo "gagal";}

}
?>
