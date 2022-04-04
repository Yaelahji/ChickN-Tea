<?php 

include_once "../../conn.php";

if(isset($_POST['update'])){

    $id = $_POST['id'];
    $name = $_POST['name'];
    $notes = $_POST['notes'];
    $qty = $_POST['qty'];
    $price = $_POST['price'];
    $timestamp = date('Y-m-d h:i:s');
    

    $update = mysqli_query($query, "UPDATE tb_orders SET 
                    to_name_costumer='$name',
                    to_notes='$notes',
                    to_qty='$qty',
                    to_updated_at='$timestamp',
                    to_total_price='$price' WHERE
                    to_id='$id'");

    if($update){
        echo "<script>window.location.href='index.php?halaman=orders'</script>";
    }else{
        echo "Gagal update data".mysqli_error($update);
    }




}

?>