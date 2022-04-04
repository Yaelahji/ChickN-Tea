<?php

include_once "../../conn.php";

if(isset($_GET['idm'])){

    $id = $_GET['idm'];

    $delete = mysqli_query($query, "DELETE FROM tb_menu WHERE tm_id='$id' ");
    if($delete){
        header('location: index.php?halaman=menu');
    }else{
        echo "Gagal".mysqli_error($delete);
    }

}

?>