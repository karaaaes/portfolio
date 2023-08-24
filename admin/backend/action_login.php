<?php 
include 'database.php';

if(isset($_POST['submit_login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sqlCheckAcc = "SELECT * FROM re_account WHERE username = '$username' AND password = '$password' AND status = 1";
    $execute = mysqli_query($conn, $sqlCheckAcc);

    if ($execute && mysqli_num_rows($execute) > 0) {
        $userAcc = mysqli_fetch_assoc($execute);
        // Login berhasil, arahkan ke halaman selanjutnya
        session_start();
        $_SESSION['username'] = $userAcc['username'];
        $_SESSION['level'] = $userAcc['level'];
          header('Location: ../index.php');
          exit();
      } else {
        // Login gagal, tampilkan pesan error
        session_start();
        $error = "Username atau password salah!";
        $_SESSION['error'] = "Username atau password salah!";
        header('Location: ../loginAdmin.php');
        exit();
      }
}
?>