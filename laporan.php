<!DOCTYPE html>
<?php
include 'koneksi.php';
include 'template/css.php';
include'fungsi/fungsi_rupiah.php';
include'fungsi/fungsi_indotgl.php';
?>


		  <!-- Isi-->
			 <h3><center>Laporan Penjualan Produk</center></h3>
			 <br>
			  <a class='btn btn-success' href='cetak.php'  target="_blank"> <i class='fa fa-print'></i> print</a>
			   <a class='btn btn-primary' href='cetak_excel.php'  target="_blank"> <i class='fa fa-table '></i>  xls</a>
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
		  
		  
			
			

          <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <a href="login.html" class="btn btn-primary">Logout</a>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!---Container Fluid-->
      </div>
    
    </div>
  </div>

  

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="js/demo/chart-area-demo.js"></script> 
<!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>

</body>  
</body>

</html>