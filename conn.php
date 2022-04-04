<?php

$query = mysqli_connect("localhost","root","","db_chickentea");

if($query){
    echo "";
}else{
    echo "gagal terhubung".mysqli_error();
}

?>