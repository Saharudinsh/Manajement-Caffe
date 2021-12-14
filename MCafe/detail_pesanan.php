<?php 
include('php/koneksi.php');
    session_start();
      if(!isset($_SESSION['login_user'])) {
        header("location: index.php");
      }
      
      else{
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
    <link rel='short icon' href='images/logo.png' >
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

    <title>M'Cafe</title>
  </head>
  <body>

   <!-- Navbar -->
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top " style="background-color: #000 !important;">    
      <div class="container " style="max-width: 1300px">
          <a class="navbar-brand text-white" href="admin.php"> <img src="images/logomn.png" ><strong>  M'</strong> Cafe</a>
          <a class="navbar-jam text-white" id="jam"></a>
          
          <ul class="nav navbar-expand-lg nav-pills nav-justified ml-auto">
              <li class="nav-item">
                <a class="nav-link"   href="admin.php" ><i class="bi bi-house"></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="daftar_menu.php"><i class="bi bi-shop"></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link active text-center" href="pesanan.php"><i class="bi bi-currency-dollar"></i></a>
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
    
    <div class="container">
      <div class="judul-pesanan mt-5">
       
        <h3 class="text-center font-weight-bold">DATA PESANAN PELANGGAN</h3>
        
      </div>
      <table class="table table-bordered" id="example">
        <thead class="thead-light">
          <tr>
            <th scope="col">No.</th>
            <th scope="col">ID Pemesanan</th>
            <th scope="col">Nama Pesanan</th>
            <th scope="col">Jenis</th>
            <th scope="col">Harga</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Subharga</th>
            
          </tr>
        </thead>
        <tbody>
          <?php $nomor=1; ?>
          <?php $totalbelanja = 0; ?>
          <?php 
              $ambil = $koneksi->query("SELECT * FROM pemesanan_produk JOIN produk ON pemesanan_produk.id_menu=produk.id_menu 
                WHERE pemesanan_produk.id_pemesanan='$_GET[id]'");
           ?>
           <?php while ($pecah=$ambil->fetch_assoc()) { ?>
           <?php $subharga1=$pecah['harga']*$pecah['jumlah']; ?>
          <tr>
            <th scope="row"><?php echo $nomor; ?></th>
            <td><?php echo $pecah['id_pemesanan_produk']; ?></td>
            <td><?php echo $pecah['nama_menu']; ?></td>
            <td><?php echo $pecah['jenis_menu']; ?></td>
            <td>Rp. <?php echo number_format($pecah['harga']); ?></td>
            <td><?php echo $pecah['jumlah']; ?></td>
            <td>
              Rp. <?php echo number_format($pecah['harga']*$pecah['jumlah']); ?>
            </td>
            
          </tr>
          <?php $nomor++; ?>
          <?php $totalbelanja+=$subharga1; ?>
          <?php } ?>
        </tbody>
         <tfoot>
          <tr>
            <th colspan="6">Total Bayar</th>
            <th>Rp. <?php echo number_format($totalbelanja) ?></th>
          </tr>
        </tfoot>
      </table><br>
      
      <form method="POST" action="">
        <a href="pesanan.php" class="btn btn-success btn-sm">Kembali</a>
        <button class="btn btn-primary btn-sm" name="bayar">Konfirmasi Pembayaran</button>
      </form>  
      <?php 
        if(isset($_POST["bayar"]))
        {
          
          
          echo "<script>alert('Pesanan Telah Dibayar !');</script>";
          echo "<script>location= 'pesanan.php'</script>";
        }
      ?>
     
    </div>
</div>

<button type="button" class="btn btn-danger btn-floating btn-lg" id="btn-back-to-top" onclick="backToTop()" >
      <i class="fas fa-arrow-up"></i></button>
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
    <script>
      $(document).ready(function() {
          $('#example').DataTable();
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

            </script>
<?php } ?>