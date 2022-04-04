<?php
include_once('../../conn.php');

if(isset($_GET['idt'])){

    $id = $_GET['idt'];

    $changes = mysqli_query($query, "UPDATE tb_table SET tt_status='ON' WHERE tt_id='$id'");

    if($changes){
        echo "Success Changes status";
        echo "<script>window.location.href='index.php?halaman=dashboard'</script>";
    }else{
        echo "Gagal".mysqli_error($changes);
    }
}



?>