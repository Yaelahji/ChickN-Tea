<?php

include_once('conn.php');

      if(isset($_POST['add'])){

        $id = $_POST['id'];
        $pr = $_POST['price'];
        $uniq = "TMP1";

        $orders = mysqli_query($query, "INSERT INTO tb_tmp_orders VALUES(
                                '',
                                '".$id."',
                                '$uniq',
                                '1',
                                '$pr')");        
        echo "<script>window.location.href='cart.php'</script>";
      }


?>