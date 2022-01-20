<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <?php include 'template/css.php';?>
  
  <title></title>
</head>
<body>
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Laporan</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Laporan</li>
            </ol>
          </div>
		  <!-- Isi-->
			 <h3><center>Laporan Penjualan Beras</center></h3>
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
                  <table class="table align-items-center table-flush table-hover" >
                    <thead class="thead-light">
                      

<form class="row g-3">
	
	<div class="row g-2">
<div class="col-md-6">
		<label for="date" class="form-label">TANGGAL</label>
    <input type="text"  class="form-control" value="<?php echo date("j F Y");?>" name="TANGGAL">
   </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">ID TRANSAKSI</label>
    <input type="text" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">NAMA PELANGGAN</label>
    <input type="text" class="form-control" id="inputPassword4">
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">NAMA PRODUK</label>
    <input type="text" class="form-control" id="inputAddress" >
  </div>
  <div class="col-12">
    <label for="inputAddress2" class="form-label">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2">
  </div>
  
  <div class="col">
  	<label for="inputAddress2" class="form-label">HARGA</label>
    <input type="text" class="form-control" aria-label="First name">
  </div>
  <div class="col">
  	<label for="inputAddress2" class="form-label">QTY</label>
    <input type="text" class="form-control" aria-label="Last name">
  </div>
  <div class="col">
  	<label for="inputAddress2" class="form-label">TOTAL</label>
    <input type="text" class="form-control" aria-label="Last name">
  </div>

</div>
</form>
</thead>
</table>
</div>
</div>
</div>
</div>
  

</form>
<div class="col-12">
  	<label for="inputCity" class="form-label"></label>
    <button type="submit" class="btn btn-primary">Sign in</button>
  </div>

<div class="col-sm-4">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h4><i class="fa fa-search"></i> Cari Barang</h4>
                </div>
                <div class="panel-body">
                  <input type="text" id="cari" class="form-control" name="cari" placeholder="Masukan : Kode / Nama Barang  [ENTER]">
                </div>
              </div>
            </div>
            <div class="col-sm-8">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h4><i class="fa fa-list"></i> Hasil Pencarian</h4>
                </div>
                <div class="panel-body">
                  <div id="hasil_cari"></div>
                  <div id="tunggu"></div>
                  
                </div>
              </div>
            </div>

 <!--  <div class="col-md">
    <div class="form-floating">
    	<label for="floatingInputGrid">Email address</label>
      <input type="email" class="form-control" id="floatingInputGrid" placeholder="name@example.com" value="mdo@example.com">
      
    </div>
  </div>
  <div class="col-md">
   <div class="form-floating">
     <label for="floatingInputGrid">Email address</label>   
     <input type="email" class="form-control" id="floatingInputGrid" placeholder="name@example.com" value="mdo@example.com">
   </div>
  </div> -->
  

                      <div class="table-responsive p-3">




                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>ID TRANSAKSI</th>
                        <th>NAMA PELANGGAN</th>
                        <th>TANGGAL</th>
                        <th>ID PRODUK</th>
                        <th>NAMA PRODUK</th>
                        <th>HARGA PRODUK</th>
                        <th>QTY</th>
                        <th>TOTAL</th>
                        <th>DESKRIPSI</th>
                      
                      </tr>
                    </thead>
                    <tfoot>
                      
                    
                    
          <?php 
          include 'koneksi.php';
          $stid = oci_parse($koneksi, 'SELECT * from TRANSAKSI');

          oci_execute($stid);

          while (($d = oci_fetch_array ($stid, OCI_BOTH)) != false) {
            ?>
                      <tr>
                        <td>
             <?php echo $d['ID_TRANSAKSI']; ?>
            </td>
                          <td>
             <?php echo $d['NAMAPELANGGAN']; ?>
            </td>
            <td>
             <?php echo $d['TANGGAL']; ?>
            </td>
            <td>
             <?php echo $d['ID_PRODUK']; ?>
            </td>
            <td>
             <?php echo $d['NAMAPRODUK']; ?>
            </td>
            <td>
             <?php echo $d['HARGAPRODUK']; ?>
            </td>
            <td>
             <?php echo $d['QTY']; ?>
            </td>
            <td>
             <?php echo $d['TOTAL']; ?>
            </td>
            <td>
             <?php echo $d['DESKRIPSI']; ?>
            </td>

                                                                 
                      </tr>                                         
                    </tbody>
           <?php 
            }
          ?>
                  </table>
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

          
		  <!-- Row -->
          
		  
		  
			
			

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