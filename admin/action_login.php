<?php

session_start();
include '../conn.php';

if(isset($_POST['submit'])){

$email = $_POST['email'];
$password = $_POST['pass'];


$data = mysqli_query($query, "SELECT * FROM tb_admin WHERE ta_email='$email' and ta_password='$password'");

$cek = mysqli_num_rows($data);

if($cek > 0){
    $_SESSION['email'] = $email;
    $_SESSION['status'] = "login";
    header("location:page/index.php");
}
else{
    header("location:admin_login.php?pesan=gagal");
}
}


?>