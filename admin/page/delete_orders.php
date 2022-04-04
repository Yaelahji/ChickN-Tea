<?php

include_once "../../conn.php";

if(isset($_GET['ido'])){

    $id = $_GET['ido'];

    $delete = mysqli_query($query, "DELETE FROM tb_orders WHERE to_id='$id' ");
    if($delete){
        header('location: index.php?halaman=orders');
    }else{
        echo "Gagal".mysqli_error($delete);
    }

}

?>