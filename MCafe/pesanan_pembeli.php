<?php 
    session_start();
      if(!isset($_SESSION['login_user'])) {
        header("location: index.php");
      }
      
      else{

        if(empty($_SESSION["pesanan"]) OR !isset($_SESSION["pesanan"]))
{
  echo "<script>alert('Pesanan kosong, Silahkan Pesan dahulu');</script>";
  echo "<script>location= 'menu_pembeli.php'</script>";
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" rel="stylesheet">
    <link rel='short icon' href='images/logo.png' >
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/jquery.js"></script>



    <title>M'Cafe</title>
  </head>
  <body>

  <!-- Jumbotron -->
  <!-- Jumbotron -->
  <div class="jumbotron jumbotron-fluid text-center">
        <div class="container">
          <h1 class="display-4"><span class="font-weight-bold">M' Cafe</span></h1>
          <hr>
          <p class="lead font-weight-bold">Silahkan Pesan Menu Sesuai Keinginan Anda <br> 
          Enjoy Your Meal</p>
        </div>
        
        <h2 id="jam2"></h2>
      </div>
      
      </div>

  <!-- Akhir Jumbotron -->
  <!-- Navbar -->
  
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top " style="background-color: #000 !important;">    
    <div class="container " style="max-width: 1300px">
        <a class="navbar-brand text-white" href="user.php"> <img src="images/logomn.png" ><strong>  M'</strong> Cafe</a>
        <a class="navbar-jam text-white" id="jam"></a>
        
        <ul class="nav navbar-expand-lg nav-pills nav-justified ml-auto">
            <li class="nav-item">
              <a class="nav-link "   href="user.php" ><i class="bi bi-house"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="menu_pembeli.php"><i class="bi bi-shop"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active text-center" href="pesanan_pembeli.php"><i class="bi bi-cart4"></i></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="bi bi-grid-fill"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right dropright-center" style="background-color: #000  !important;" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item  text-white" href="php/logout.php">Logout <strong>   |</strong> <i class="bi bi-box-arrow-in-left"></i></a>
              </div>
            </li>
        </ul>
    </div> 
  </nav>
  <!-- Akhir Navbar -->
  <!-- Menu -->
    <div class="container">
      <div class="judul-pesanan mt-5">
       
        <h3 class="text-center font-weight-bold">PESANAN ANDA</h3>
        
      </div>
      <table class="table table-bordered" id="example">
        <thead class="thead-light">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Pesanan</th>
            <th scope="col">Harga</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Subharga</th>
            <th scope="col">Opsi</th>
          </tr>
        </thead>
        <tbody>
            <?php $nomor=1; ?>
            <?php $totalbelanja = 0; ?>
            <?php foreach ($_SESSION["pesanan"] as $id_menu => $jumlah) : ?>

            <?php 
              include('php/koneksi.php');
              $ambil = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_menu='$id_menu'");
              $pecah = $ambil -> fetch_assoc();
            ?>
          <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah["nama_menu"]; ?></td>
            <td>Rp. <?php echo number_format($pecah["harga"]); ?></td>
          

            <td><?php echo $jumlah; ?></td>
            <?php 
              
              $subharga = $pecah["harga"]*$jumlah;
            ?>
            
            <td>Rp. <?php echo number_format($subharga); ?></td>
           
            <td>
              <a href="hapus_pesanan.php?id_menu=<?php echo $id_menu ?>" class="badge badge-danger">Hapus</a>
            </td>
          </tr>
            <?php $nomor++; ?>
            <?php $totalbelanja+=$subharga; ?>
            <?php endforeach ?>
        </tbody>
        <tfoot>
          <tr>
            <th colspan="4">Total Belanja</th>
            <th colspan="1">Rp. <?php echo number_format($totalbelanja) ?></th>
           
          </tr>

        </tfoot>
      </table><br>
      <form method="POST" action="">
        <a href="menu_pembeli.php" class="btn btn-primary btn-sm">Lihat Menu</a>
        <button class="btn btn-success btn-sm" name="konfirm">Konfirmasi Pesanan</button>
      </form>        

      <?php 
      if(isset($_POST['konfirm'])) {
          date_default_timezone_set('Asia/Makassar');
          $tanggal_pemesanan=date("Y-m-d  H:i");

          // Menyimpan data ke tabel pemesanan
          $insert = mysqli_query($koneksi, "INSERT INTO pemesanan (tanggal_pemesanan, total_belanja) VALUES ('$tanggal_pemesanan', '$totalbelanja')");

          // Mendapatkan ID barusan
          $id_terbaru = $koneksi->insert_id;

          // Menyimpan data ke tabel pemesanan produk
          foreach ($_SESSION["pesanan"] as $id_menu => $jumlah)
          {
            $insert = mysqli_query($koneksi, "INSERT INTO pemesanan_produk (id_pemesanan, id_menu, jumlah) 
              VALUES ('$id_terbaru', '$id_menu', '$jumlah') ");
          }          

          // Mengosongkan pesanan
          unset($_SESSION["pesanan"]);

          // Dialihkan ke halaman nota
          echo "<script>alert('Pemesanan Sukses!');</script>";
          echo "<script>location= 'menu_pembeli.php'</script>";
      }
      ?>
    </div>
    <button type="button" class="btn btn-danger btn-floating btn-lg" id="btn-back-to-top" onclick="backToTop()" >
      <i class="fas fa-arrow-up"></i></button>
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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
   

    
    <script>
      $(document).ready(function() {
          $('.example').DataTable();
      } );
    </script>
    <script>
        var mybutton = document.getElementById("btn-back-to-top");             
        window.onscroll = function() {scrollFunction()};
        function scrollFunction() {
        if (document.body.scrollTop > 20 || 
            document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } 
        else {
            mybutton.style.display = "none";
        }
        }
        function backToTop() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
        }
    </script>

    
    <script>
              $(function(){
              setInterval(jam, 10);
              });
              function jam() {
                $.ajax({
                  url: 'php/jam.php',
                  success: function(data) {
                    $('#jam').html(data);
                  },
                });
              }

              $(function(){
              setInterval(jam2, 10);
              });
              function jam2() {
                $.ajax({
                  url: 'php/jam2.php',
                  success: function(data) {
                    $('#jam2').html(data);
                  },
                });
              }
              
            </script>
  </body>
</html>
<?php } ?>