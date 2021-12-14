<?php 
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" rel="stylesheet">
    <link rel='short icon' href='images/logo.png' >
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <title>M'Cafe</title>
  </head>
  <body>

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
              <a class="nav-link active text-center " href="menu_pembeli.php"><i class="bi bi-shop"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pesanan_pembeli.php"><i class="bi bi-cart4"></i></a>
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
      <div class="container" id='menu'>
        <div class="row mt-3">

          <?php 

          include('php/koneksi.php');

          $query = mysqli_query($koneksi, 'SELECT * FROM produk');
          $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
            

          ?>

          <?php foreach($result as $result) : ?>

          <div class="col-md-3 mt-4">
            <div class="card brder-dark">
              <img src="images/<?php echo $result['gambar'] ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title font-weight-bold"><?php echo $result['nama_menu'] ?></h5>
               <label class="card-text harga"><strong>Rp.</strong> <?php echo number_format($result['harga']); ?></label><br>
                <a href="php/beli.php?id_menu=<?php echo $result['id_menu']; ?>" class="btn btn-success btn-sm btn-block ">BELI</a>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
         </div> 
      </div>
  <!-- Akhir Menu -->
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
        $(document).ready(function() {
            $("#success-alert").hide();
            $("#myWish").click(function showAlert() {
            $("#success-alert").fadeTo(1000, 500).slideUp(500, function() {
                $("#success-alert").slideUp(500);
            });
            });
        });
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