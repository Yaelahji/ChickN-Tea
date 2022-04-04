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
</head>
<body>
<?php 
        session_start();
        if($_SESSION['status']!="login"){

            echo '<script>window.alert("Anda Belum Login, Silahkan Login Terlebih dahulu")</script>';
            header('location: ../admin_login.php?pesan=gagal');
        }
    ?>
    <header role="banner">
        <h1>Chick 'N Tea Admin</h1>
        <ul class="utilities">
            <br>
            <li><i class="fas fa-sign-out"><a href="logout.php">Log Out</a></i></li>
        </ul>
    </header>
    
    <nav role='navigation'>
        <ul class="main">
            <li class="dashboard"><a href="index.php?halaman=dashboard">Dashboard</a></li>
            <li class="users"><a href="index.php?halaman=menu">Food Menu</a></li>
            <li class="edit"><a href="index.php?halaman=orders">Orders</a></li>
            <li class="print"><a href="index.php?halaman=report">Report</a></li>
        </ul>
    </nav>
    
    <main role="main">
        <?php
         if(isset($_GET['ido']))

         $id = $_GET['ido'];

         $read = mysqli_query($query, "SELECT * FROM tb_orders WHERE to_id='$id'");
         $r = mysqli_fetch_assoc($read);
        
        ?>
        <section class="panel important">
            <form action="u_orders.php" method="POST">
                <h2>UPDATE ORDERS AREA</h2>
                <input type="hidden" name="id" value="<?php echo $r['to_id'] ?>">
                <label for="name costumer">
                Name Costumer
                    <br>
                    <input name="name" placeholder="input" type="text" value="<?php echo $r['to_name_costumer'] ?>">
                </label>
                <label for="name food">
                Food Name
                <br>               
                <label for="no orders">
                    No Orders
                    <input name="orders" placeholder="input" type="text" value="<?php echo $r['to_no_orders'] ?>" disabled>
                </label>          
                <label for="notes">
                    Notes
                    <input name="notes" placeholder="input" type="text" value="<?php echo $r['to_notes'] ?>">
                </label>          
                <label for="qty">
                    Qty
                    <input name="qty" placeholder="input" type="text" value="<?php echo $r['to_qty'] ?>">
                </label>          
                <label for="price">
                    Price
                    <input name="price" placeholder="input" type="text" value="<?php echo $r['to_total_price'] ?>">
                </label> 
                    <input type="submit" value="update" name="update" class="btn">         
            </form>
          </section>
      </main>    
    <style>
        .btn{
            cursor: pointer;
        }
    </style>
</body>
</html>