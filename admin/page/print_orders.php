<?php 
  include_once "../../conn.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chick 'N Tea - Admin Dashboard</title>
    <link href="style.css" rel="stylesheet">
    <link href="../../layout/styles/fontawesome-free/css/all.css" rel="stylesheet">
    <style type="text/css" media="print">
@page {
    size: auto;   /* auto is the initial value */
    margin: 0;  /* this affects the margin in the printer settings */
}
</style>
</head>
<body>
<?php 
        session_start();
        if($_SESSION['status']!="login"){

            echo '<script>window.alert("Anda Belum Login, Silahkan Login Terlebih dahulu")</script>';
            header('location: ../admin_login.php?pesan=gagal');
        }
    ?>

<div class="container" style="width:90%;">   
  <div class="invoice-container" ref="document" id="html">
     <table style="width:100%; height:auto;  text-align:center; " BORDER=0 CELLSPACING=0>
       <thead style="background:#fafafa; padding:8px;">
         <tr style="font-size: 20px;">
           <td colspan="4" style="padding:20px 20px;text-align: left;">Chick 'N Tea Receipt</td>
         </tr>
       </thead>
       <tbody style="background:#ffff;padding:20px;">
         <tr>
         <?php
         error_reporting(0);
           $id = $_GET['idp'];

           $read = mysqli_query($query, "SELECT * FROM tb_orders LEFT JOIN tb_menu ON to_tm_id=tm_id WHERE to_no_orders='$id'");
           while($r = mysqli_fetch_array($read)) {
            $name = $r['to_name_costumer'];
          }

         ?>
           <td colspan="4" style="padding:20px 0px 0px 20px;text-align:left;font-size: 16px; font-weight: bold;color:#000;">Hello, <?= $name ?></td>
         </tr>
         <tr>
           <td colspan="4" style="text-align:left;padding:10px 10px 10px 20px;font-size:14px;">Your order details</td>
         </tr>
       </tbody>
     </table>
     <table style="width:100%; height:auto; background-color:#fff;text-align:center; padding:10px; background:#fafafa">
       <tbody>
         <tr style="color:#6c757d; font-size: 20px;">
          <td style="width:25%;font-size:12px;font-weight:700;padding: 0px 0px 10px 0px;">Name Costumer</td>
           <td style="border-right:1.5px dashed  #DCDCDC; width:25%;font-size:12px;font-weight:700;padding: 0px 0px 10px 0px;">Order Date</td>
           <td style="border-right: 1.5px dashed  #DCDCDC ;width:25%;font-size:12px;font-weight:700;padding: 0px 0px 10px 0px;">Order No.</td>
         </tr>
         <?php
         error_reporting(0);
           $id = $_GET['idp'];

           $read = mysqli_query($query, "SELECT * FROM tb_orders LEFT JOIN tb_menu ON to_tm_id=tm_id WHERE to_no_orders='$id'");
           while($r = mysqli_fetch_array($read)) {
            $name = $r['to_name_costumer'];
            $date = $r['to_date'];
            $order = $r['to_no_orders'];
          }

         ?>
         <tr style="background-color:#fff; font-size:12px; color:#262626;">
           <td style="border-right:1.5px dashed  #DCDCDC ;width:25%; font-weight:bold;background: #fafafa;"><?= $name ?></td>
           <td style="border-right:1.5px dashed  #DCDCDC ;width:25% ; font-weight:bold;background: #fafafa;"><?= $date ?></td>
           <td style="border-right:1.5px dashed  #DCDCDC ;width:25%; font-weight:bold;background: #fafafa;"><?= $order ?></td>
         </tr>
       </tbody>
     </table>
     <table style="width:100%; height:auto; background-color:#fff; margin-top:0px;  padding:20px; font-size:12px; border: 1px solid #ebebeb; border-top:0px;">
       <thead>
         <tr style=" color: #6c757d;font-weight: bold; padding: 5px;">
           <td colspan="2" style="text-align: left;">FOOD INFORMATION</td>
           <td style="padding: 10px;text-align:center;">QUANTITY</td>
           <td style="text-align: right;padding: 10px;">PRICE</td>
         <?php
         error_reporting(0);
           $id = $_GET['idp'];

           $read = mysqli_query($query, "SELECT * FROM tb_orders LEFT JOIN tb_menu ON to_tm_id=tm_id WHERE to_no_orders='$id'");
           while($r = mysqli_fetch_array($read)) {

            $qty = $r['to_qty'];
            $price = $r['tm_price'];
            $sub = $qty * $price;
            $total += $sub;
            $name = $r['to_name_costumer'];
            $date = $r['to_date'];
            $order = $r['to_no_orders'];

         ?>
         </tr>
         <tr>
         <td colspan="2" style="text-align: left;"><?php echo $r['tm_food_name'] ?></td>
           <td style="padding: 10px;text-align:center;"><?php echo $r['to_qty'] ?></td>
           <td style="text-align: right;padding: 10px;"><?php echo $r['tm_price'] ?></td>
         </tr>
         <?php } ?>
       </thead>
     </table>
     <table style="width:100%; height:auto; background-color:#fff;padding:20px; font-size:12px; border: 1px solid #ebebeb; border-top:0">
       <tbody>
         <tr style="padding:20px;color:#000;font-size:15px">
           <td style="font-weight: bold;padding:5px 0px">Total</td>
           <td style="text-align:right;padding:5px 0px;font-weight: bold;font-size:16px;">Rp.<?= number_format($total) ?></td>
         </tr>
     </table>
</div>
</div>
    
</body>
<script>window.print();</script>
</html>