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
 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/vendor/bootstrap-icons/bootstrap-icons.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" >
    <link rel='short icon' href='images/logo.png' >
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
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
                <a class="nav-link active text-center"   href="admin.php" ><i class="bi bi-house"></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="daftar_menu.php"><i class="bi bi-shop"></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="pesanan.php"><i class="bi bi-currency-dollar"></i></a>
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
      </div>
        <div class="judul text-center mt-5">
          <h3 class="font-weight-bold">M' CAFE</h3>
          <h5>Jl. Pramuka, Samarinda
          <br>Buka Jam <strong>15:00 - 23:59</strong></h5>
        </div>
        <div class="row mb-5 mt-5 ">
          <div class="col-md-6 d-flex justify-content-end">
            <div class="card bg-dark text-white border-light">
              <img src="images/menu2.jpg" class="card-img" alt="Lihat Daftar Menu">
              <div class="card-img-overlay mt-5 text-center">
               <a href="daftar_menu.php" class="btn btn-primary">DAFTAR MENU</a>
              </div>
            </div>
          </div>
          <div class="col-md-6 d-flex justify-content-start">
            <div class="card bg-dark text-white border-light" >
              <img src="images/menu1.jpg" class="card-img" alt="Lihat Pesanan">
              <div class="card-img-overlay mt-5 text-center">
               <a id="myWish" ref="javascript:;" class="btn btn-primary">DATA PESANAN</a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- Akhi Menu -->

    <!-- Tombl Ke Atas -->
    <button type="button" class="btn btn-danger btn-floating btn-lg" id="btn-back-to-top" onclick="backToTop()" >
      <i class="fas fa-arrow-up"></i>
    </button>
    <!-- Akhir Tombl Ke Atas -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
   
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

  </body>
    
</html>
<?php } ?>