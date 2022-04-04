<?php 

include_once "../../conn.php";

if(isset($_POST['save'])){

    $id = $_POST['id'];
    $name = $_POST['name'];
    $orders = $_POST['orders'];
    $menu = $_POST['id_menu'];
    $notes = $_POST['notes'];
    $qty = $_POST['qty'];
    $price = $_POST['price'];
    $date = date('Y-m-d');
    $timestamp = date('Y-m-d h:i:s');
    

    $create = mysqli_query($query, "INSERT INTO tb_orders VALUE(
                                '',
                                '".$date."',
                                '".$menu."',
                                '".$orders."',
                                '".$qty."',
                                '".$name."',
                                '".$notes."',
                                '".$price."',
                                '".$timestamp."',
                                '".$timestamp."')");

    if($create){
        echo "<script>window.location.href='index.php?halaman=orders'</script>";
    }else{
        echo "Gagal menambah data".mysqli_error($create);
    }




}

?>