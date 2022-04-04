<!DOCTYPE html>
<?php 
include_once "conn.php";
?>
<html lang="">
<head>
<title>Chick 'N Tea Application</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link href="layout/styles/cart.css" rel="stylesheet" type="text/css" media="all">
<link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+P+One&family=Oswald:wght@200&display=swap" rel="stylesheet">

  
</head>
<body id="top">
<div class="wrapper row0">
  <div id="topbar" class="hoc clear"> 
      <h1 class="title-sub">Chick 'N Tea Application</h1>
    <div class="fl_right">
      <ul class="nospace">
        <li><a href="index.php"><i class="fas fa-home" style="font-size: 25px; color: red;"></i></a></li>
        <li><a href="index.php#latest" title="Food Menu"><i class="fas fa-utensils" style="font-size: 25px; color: red"></i></a></li>
        <li><a href="#" title="Cart"><i class="fas fa-shopping-cart" style="font-size: 25px; color: red"></i></a></li>
        <li id="searchform">
          <div>
            <form action="#" method="post">
              <fieldset>
                <legend>Quick Search:</legend>
                <input type="text" placeholder="Enter search term&hellip;">
                <button type="submit"><i class="fas fa-search"></i></button>
              </fieldset>
            </form>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>  
<div class="wrapper row3">
  <section id="services" class="hoc container clear">
    <main>
    <h4></h4>
        
        <table id="checkoutSummary">
            
       
    <h2 style="margin:2rem 0 1rem; text-align:center;"><span class="pinkheart">&hearts; </span>TOTAL PAYMENT</h2>
        <h4>Items Ordered</h4>

        <table id="checkoutItems">
            <tr>
              <th>No</th>
            <th>Item</th>
            <th>Quantity</th>
            <th>Price</th>  
            <th>Action</th>  
            </tr>
            <?php
            include 'conn.php';
            $no = 1;
            $join           = "select * from tb_tmp_orders join tb_menu on tb_menu.tm_id = tb_tmp_orders.tto_tm_id";
            $select         = mysqli_query($query, $join);
            while($data = mysqli_fetch_array($select)){ 
              $rupiah = "Rp." . number_format($data['tm_price'],0,',','.');?>
            <tr><td><h3><?php echo $no++?></h3></td>
            <td><?php echo $data['tm_food_name'] ?></td>
            <form action="" method="POST">
            <td><?php echo $data['tto_qty'] ?></td>
            </form>
            <td><?php echo $rupiah ?></td>
            <td><a href="delete_tmp.php?id=<?php echo $data['tto_id'] ?>"><i class="fas fa-minus"></i></a> ||<a href="update_qty.php?id=<?php echo $data['tto_id'] ?>"><i class="fas fa-plus"></i></a></td>
          </tr>
          <?php } ?>
          <td></td>
          <td></td>
          <td>Total</td>
            <?php
            error_reporting(0);
           $sql3 = mysqli_query($query, "SELECT * FROM tb_tmp_orders");
           while($data3 = mysqli_fetch_array($sql3)) {
              $price = $data3['tto_total_price'];
              $qty = $data3['tto_qty'];
              $total = $price * $qty;
              $tot_bayar += $total;
              $tm_id = $data3['tto_tm_id'];
              $no_orders = $data3['tto_no_orders'];
              
              if(isset($_POST['confirm'])){  
                $name = $_POST['name'];
                $note = $_POST['note'];
                $acc = $_POST['acc'];
                $date = date('Y:m:d');
                $timestamp = date('Y-m-d h:i:s');
                $waktu = date('is');
                $uniq = "ORDR".$waktu;  
                
                $sql = mysqli_query($query, "INSERT INTO tb_orders VALUE(
                                 '', 
                                 '".$date."', 
                                 '".$tm_id."', 
                                 '".$uniq."', 
                                 '".$qty."', 
                                 '".$name."', 
                                 '".$note."', 
                                 '".$tot_bayar."', 
                                 '".$timestamp."', 
                                 '".$timestamp."' 
                                 ) ");
                                 
                                 if($sql){
                                   echo "<script>window.location.href='success.php'</script>";
                                  }else{
                                    echo "failed".mysqli_error($sql);
                                  }
                                  if($sql){
                                    mysqli_query($query, "DELETE FROM tb_tmp_orders WHERE tto_no_orders='TMP1'");
                                  }
                                  
                                  $update = mysqli_query($query, "UPDATE tb_table SET tt_status='OFF' WHERE tt_table_no='$acc' ");
                                }

            }
                                
                                
                                ?>
            <td><?php echo "Rp." . number_format($tot_bayar);?></td>
          </table>
          
          <h4>Select Your Table Location</h4>
          <div class="radop">
            <p>*Harap Periksa Kembali No. Meja Anda, Terimakasih</p>
          <form action="" method="POST">
            <?php
              $query = mysqli_query($query , "SELECT * FROM tb_table ORDER BY tt_id");
                        while ($table=mysqli_fetch_array($query)) {
                            if ($table['tt_status']=='ON') {
                                echo '
                                <div class="radio-wrap text-center">
                                <div class="radio-label-fake text-center">'. $table['tt_id'].'</div>
                                <input type="checkbox" value="'.$table['tt_table_no'].'" name="acc">
                              </div>
                                ';
                            }
                          }
               ?> 
        </div>

        <h4>Confirm Orders</h4>
        <tbody>
            <tr>
                <div class="">
                  <label for="">NAME</label>
                  <input type="text" name="name" required>
               </div>
                <div class="">
                  <label for="">NOTE</label>
                  <input type="text" name="note" required>
               </div>
               <input type="submit" name="confirm" value="confirm">
              </form>
            </tr>
        </tbody>
  </section>
</div>
<div class="bgded overlay"> 
  <div class="wrapper row5">
    <div id="copyright" class="hoc clear"> 
      <p class="fl_left">Copyright &copy; 2022 - All Rights Reserved - <a href="yaelahka.com">Yaelahka.com</a></p>
    </div>
  </div>
</div>


<?php

if(isset($_GET['id2'])){

  $id = $_GET['id2'];
  $no = 1;
  $updateId2 = mysqli_query($query,"UPDATE tb_tmp_orders SET tto_qty='$no++' where tto_id='$id'");

  if($updateId2){
    echo '<script>
    window.location.href="Cart.php";
    </script>';
  }else{
    echo "Gagal".mysqli_error();
  }
}


?>
<a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.cart.js"></script>
</body>
</html>