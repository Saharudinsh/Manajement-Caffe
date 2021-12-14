<?php 
include('php/koneksi.php');

$id_menu = $_GET['id_menu'];

$ambil = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_menu='$id_menu'");
$result = mysqli_fetch_all($ambil, MYSQLI_ASSOC);

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags --> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/tambah.css">
    <link rel='short icon' href='images/logo.png' >

    <title>Tambah Menu</title>
    <style type="text/css">
		body
		{
			background-image: url(images/bg2.jpg);
		}
	</style>
  </head>
  <body>
 
 <!-- Form Registrasi -->
 <div class="container" style="background-color: #00000080; color:white " >
    <h3 class="text-center "> EDIT MENU</h3>
    <hr>
      <form method="POST" action="php/edit.php" enctype="multipart/form-data">
        <div class="form-group">
          <label for="menu1">Nama Menu</label>
          <input type="hidden" name="id_menu" value="<?php echo $result[0]['id_menu'] ?>">
          <input type="text" class="form-control" id="menu1" name="nama_menu" value="<?php echo $result[0]['nama_menu'] ?>">
        </div>
        <div class="form-group">
          <label for="#">Jenis Menu</label>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="jenis_menu" value="Makanan">Makanan 
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" value="Minuman" name="jenis_menu">Minuman
            </label>
          </div>
         </div>
        <div class="form-group">
          <label for="stok1">Stok</label>
          <input type="text" class="form-control" id="stok1" name="stok" value="<?php echo $result[0]['stok'] ?>">
        </div>
        <div class="form-group">
          <label for="harga1">Harga Menu</label>
          <input type="text" class="form-control" id="harga1" name="harga" value="<?php echo $result[0]['harga'] ?>">
        </div>
        <div class="form-group">
          <label for="gambar">Foto Menu</label>
          <input type="file" class="form-control-file border" id="gambar" name="gambar" >

        </div><br>
        <button type="submit" class="btn btn-primary" name="tambah">Save</button>
        <button type="reset" class="btn btn-danger" name="reset">Hapus</button>
  </div>
  </div>
  <!-- Akhir Form Registrasi --> 


  

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

  <!-- Awal Footer -->
  <hr class="footer">
      <div class="container">
        <div class="row footer-body">
          <div class="col-md-6">
          <div class="copyright">
            <strong>Copyright</strong> <i class="far fa-copyright"></i> Teknik Elektro 18 -  RPL</p>
          </div>
          </div>

          <div class="col-md-6 d-flex justify-content-end">
          <div class="icon-contact">
          <label class="font-weight-bold">Universitas Mulawarman  </label>
          <a href="#"><img src="images/unmul.png"  data-toggle="tooltip" title="UNMUL"></a>
        </div>
          </div>
        </div>
        
      </div>
      
  <!-- Akhir Footer -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

   
  </body>
  


  
</html>
