<?php 
session_start();
require "php/koneksi.php";
$email = "";
$name = "";
$errors = array();

//if user signup button
if(isset($_POST['signup'])){
    $name = mysqli_real_escape_string($koneksi, $_POST['name']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    $cpassword = mysqli_real_escape_string($koneksi, $_POST['cpassword']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $hp = mysqli_real_escape_string($koneksi, $_POST['hp']);
    $jenis_kelamin = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']);
    

    if($password !== $cpassword){
        $errors['password'] = "Konfismasi password tidak sama!";
    }
    $email_check = "SELECT * FROM user WHERE email = '$email'";
    $res = mysqli_query($koneksi, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "Email yang anda masukkan sudah ada!";
    }
    if(count($errors) === 0){
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $validasi = "notverified";
        $status = "user";
        $insert_data = "INSERT INTO user (name, email, password, alamat, hp, jenis_kelamin, code, validasi, status)
                        values('$name', '$email', '$encpass', '$alamat', '$hp', '$jenis_kelamin', '$code', '$validasi', '$status')";
        $data_check = mysqli_query($koneksi, $insert_data);
        if($data_check){
            $subject = "Kode verifikasi email";
            $message = "Kode verifikasi email anda adalah $code";
            $sender = "From: mcafe.smd@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                $info = "Kami telah mengirimkan kode verifikasi ke email anda -  $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: kode_otp.php');
                exit();
            }else{
                $errors['otp-error'] = "Gagal mengirim kode verifikasi!";
            }
        }else{
            $errors['db-error'] = "Gagal saat memasukkan data ke dalam database!";
        }
    }

}
    //if user click verification code submit button
    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($koneksi, $_POST['otp']);
        $check_code = "SELECT * FROM user WHERE code = $otp_code";
        $code_res = mysqli_query($koneksi, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $email = $fetch_data['email'];
            $code = 0;
            $validasi = 'verified';
            $update_otp = "UPDATE user SET code = $code, validasi = '$validasi' WHERE code = $fetch_code";
            $update_res = mysqli_query($koneksi, $update_otp);
            if($update_res){
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                $_SESSION['login_user'] = $email;
                $status = $fetch['status'];
                if ($status == 'admin') {
                  header('location: admin.php');
                }elseif ($status == 'user') {
                  header('location: user.php'); 
                }                
                exit();
            }else{
                $errors['otp-error'] = "Gagal mengupdate kode!";
            }
        }else{
            $errors['otp-error'] = "Kode yang kamu masukkan salah!";
        }
    }

    //if user click login button
    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($koneksi, $_POST['email']);
        $password = mysqli_real_escape_string($koneksi, $_POST['password']);
        $check_email = "SELECT * FROM user WHERE email = '$email'";
        $res = mysqli_query($koneksi, $check_email);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            if(password_verify($password, $fetch_pass)){
                $_SESSION['email'] = $email;
                $validasi = $fetch['validasi'];
                if($validasi == 'verified'){
                  $_SESSION['email'] = $email;
                  $_SESSION['password'] = $password;
                  $_SESSION['login_user'] = $email;
                  $status = $fetch['status'];
                if ($status == 'admin') {
                  header('location: admin.php');
                }elseif ($status == 'user') {
                  header('location: user.php'); 
                }
                }else{
                    $info = "Sepertinya Anda belum memverifikasi email Anda - $email";
                    $_SESSION['info'] = $info;
                    header('location: kode_otp.php');
                }
            }else{
                $errors['email'] = "Email atau sandi salah!";
            }
        }else{
            $errors['email'] = "Sepertinya Anda belum punya akun! Klik tautan bawah untuk mendaftar.";
        }
    }

    //if user click continue button in forgot password form
    if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($koneksi, $_POST['email']);
        $check_email = "SELECT * FROM user WHERE email='$email'";
        $run_sql = mysqli_query($koneksi, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE user SET code = $code WHERE email = '$email'";
            $run_query =  mysqli_query($koneksi, $insert_code);
            if($run_query){
                $subject = "Kode reset kata sandi";
                $message = "Kode reset kata sandi kamu adalah $code";
                $sender = "From: mcafe.smd@gmail.com";
                if(mail($email, $subject, $message, $sender)){
                    $info = "Kami telah mengirimkan pengaturan ulang kata sandi ke email Anda - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    header('location: kode_reset.php');
                    exit();
                }else{
                    $errors['otp-error'] = "Gagal mengirim kode!";
                }
            }else{
                $errors['db-error'] = "Ada yang salah!";
            }
        }else{
            $errors['email'] = "Alamat email ini tidak ada!";
        }
    }

    //if user click check reset otp button
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($koneksi, $_POST['otp']);
        $check_code = "SELECT * FROM user WHERE code = $otp_code";
        $code_res = mysqli_query($koneksi, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            $info = "Silakan buat kata sandi baru.";
            $_SESSION['info'] = $info;
            header('location: lupa_sandi.php');
            exit();
        }else{
            $errors['otp-error'] = "Anda telah memasukkan kode yang salah!";
        }
    }

    //if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($koneksi, $_POST['password']);
        $cpassword = mysqli_real_escape_string($koneksi, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Konfirmasi kata sandi tidak cocok!";
        }else{
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE user SET code = $code, password = '$encpass' WHERE email = '$email'";
            $run_query = mysqli_query($koneksi, $update_pass);
            if($run_query){
                $info = "Kata sandi Anda berubah. Sekarang Anda dapat masuk dengan kata sandi baru Anda.";
                $_SESSION['info'] = $info;
                header('Location: ganti_sandi.php');
            }else{
                $errors['db-error'] = "Gagal mengubah kata sandi Anda!";
            }
        }
    }
    
   //if login now button click
    if(isset($_POST['login-now'])){
        header('Location: index.php');
    }
?>