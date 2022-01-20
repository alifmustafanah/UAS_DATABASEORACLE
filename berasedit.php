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
          <div class="d-sm-flex align-items-left justify-content-between mb-6">
            <h1 class="h3 mb-4 text-gray-800">Edit Data Beras</h1>
      
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit Data Beras</li>
            </ol>   
          </div>
      
      <!-- Isi-->
      <div class="row">
            <div class="col-lg-6">
      <?php
      include 'koneksi.php';
      
      $ID_PRODUK = $_GET['ID_PRODUK'];
      $stid = oci_parse($koneksi, "SELECT * FROM PRODUK WHERE ID_PRODUK ='$ID_PRODUK'");
      oci_execute($stid);
      $d = oci_fetch_array ($stid, OCI_BOTH)
      ?>
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Form Edit Data Produk</h6>
                </div>
                <div class="card-body">
                  <form method='post' action='aksi_beras.php?act=update'>

                    <div class="form-group">
          <input type="hidden" name="ID_PRODUK" value="<?php echo $d['ID_PRODUK']; ?>">
                      <label for="USERNAME">ID_PRODUK</label>
                      <input type="text" class="form-control" name="ID_PRODUK" value="<?php echo $d['ID_PRODUK']; ?>">
                    </div>
                    
                    <div class="form-group">
                      <label for="NAMAPRODUK">NAMAPRODUK</label>
                      <input type="text" class="form-control" name="NAMAPRODUK" value="<?php echo $d['NAMAPRODUK']; ?>">
                     </div>

                     <div class="form-group">
                      <label for="JENISPRODUK">JENIS PRODUK</label>
                       <input type="text" class="form-control" name="JENISPRODUK" value="<?php echo $d['JENISPRODUK']; ?>">
                   </div>

                   <div class="form-group">
                      <label for="HARGAPRODUK">HARGAPRODUK</label>
                       <input type="text" class="form-control" name="HARGAPRODUK" value="<?php echo $d['HARGAPRODUK']; ?>">
                   </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
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