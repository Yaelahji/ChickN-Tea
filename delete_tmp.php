<?php 
include "conn.php";
        $id = $_GET['id'];
        $select = mysqli_query($query, "SELECT * FROM tb_tmp_orders WHERE tto_id='$id'");
            while ($s = $select->fetch_assoc()) {

              if($s['tto_qty']<=1){
                $s = mysqli_query($query, "DELETE FROM tb_tmp_orders WHERE tto_id='$id'");
                echo "<script>window.location.href='Cart.php'</script>";
              }else{
                
                $updateQty = mysqli_query($query, "UPDATE tb_tmp_orders SET tto_qty='".$s['tto_qty']."' - 1 WHERE tto_id='".$id."'");
                echo "<script>window.location.href='Cart.php'</script>";
              }
          
      }
?>