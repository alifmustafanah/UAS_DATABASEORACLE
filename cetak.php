<!DOCTYPE html>
<?php
include 'koneksi.php';
include'fungsi_rupiah.php';
include'fungsi_indotgl.php';

?>
<html>
 <?php include 'template/css.php';?>
<head>
	<title>CETAK Data</title>
</head>
<body>
<h3><center>Laporan Penjualan PRODUK</center></h3>
			 <br>
			  
			  <br><br>
          <!-- Row -->
          <div class="row">
		  
           
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
               
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" ">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
						<th>Tanggal Transaksi</th>
						<th>Nama Pelanggan </th>
						<th>Alamat </th>
						<th>Nama Produk</th>
                        <th>Harga</th>
						<th>Quantity</th>
                        <th>Total</th>                        										
                      </tr>
                    </thead>
                    
                    <tbody>
					<?php 
					$no = 1;
					$total_semua = 0;
					$stid = oci_parse($koneksi, 'SELECT PELANGGAN.*, PRODUK.*, TRANSAKSI.* FROM TRANSAKSI 
TRANSAKSI INNER JOIN PELANGGAN PELANGGAN ON transaksi.id_PELANGGAN = PELANGGAN.id_PELANGGAN 
INNER JOIN PRODUK PRODUK ON transaksi.id_PRODUK = PRODUK.id_PRODUK ORDER BY transaksi.id_TRANSAKSI ASC');

					oci_execute($stid);

					while (($row = oci_fetch_array ($stid, OCI_BOTH)) != false) {
					$total = $row["HARGAPRODUK"] * $row["JUMLAH"];
					$total_semua += $total;	
						
						?>
                      <tr>
                        <td>
						 <?php echo $no; ?>
						</td>
                          <td>
						 <?php echo tgl_indo($row["TANGGAL"]);?>
						</td>
						<td>
						 <?php echo $row["NAMAPELANGGAN"];?>
						</td>
						<td>
						 <?php echo $row["ALAMAT"];?>
						</td>
						<td>
						 <?php echo $row["NAMAPRODUK"];?>
						</td>						
						  <td> 
						 <?php echo rupiah($row['HARGAPRODUK']); ?>
						</td>
						<td>
						 <?php echo $row["JUMLAH"];?>
						</td>
						<td>
						 <?php echo rupiah($total); ?>
						</td>
                                             
                      </tr>                                         
                    </tbody>
					 <?php
						$no++;
						}
						
					?>
                  </table>
                </div>
              </div>
            </div>
			
			
          </div>
          
		  <!-- Row -->
          <div class="row">
            <div class="col-lg-6">
              <!-- Popover basic -->
              <div class="card mb-4">
               
                <div class="card-body">
                 
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <!-- Dismiss on next click -->
              <div class="card mb-4">
                
                <div class="card-body">
                 <center>Bekasi, <?php echo tgl_indo($hari_ini); ?></center>
							<b><center>Manager Perusahaan</center></b>
							<p>&nbsp;</p>
							<p>&nbsp;</p>
							<b><center>Budi S.Pd</center></b>
                </div>
              </div>
            </div>
		  
	
 
	<script>
		window.print();
	</script>
 
</body>
</html>