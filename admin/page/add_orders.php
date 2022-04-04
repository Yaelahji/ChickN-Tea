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
        <section class="panel important">
            <form action="c_orders.php" method="POST">
                <h2>CREATE ORDERS AREA</h2>
                <input type="hidden" name="id">
                <label for="name costumer">
                Customer Name
                    <br>
                    <input name="name" placeholder="Please input customer name" type="text">
                </label>
                <label for="name food">
                Food Name
                <br>
                <select name="id_menu">
                    <option>Search Food Menu</option>
                    <?php
                    
                    $menu = mysqli_query($query, "SELECT * FROM tb_menu ORDER BY tm_id");
                    while($m = mysqli_fetch_assoc($menu)){
                    
                    ?>
                        <option value="<?php echo $m['tm_id'] ?>"><?php echo $m['tm_food_name']  ?></option>
                        <?php } ?>
                </select>
                    </label>                    
                <label for="no orders">
                   Orders Number
                    <input name="orders" placeholder="Please input using code: ORDR-NO (Ex: ORDR001)" type="text">
                </label>          
                <label for="notes">
                    Notes
                    <input name="notes" placeholder="Please input your notes" type="text">
                </label>          
                <label for="qty">
                    Quantity
                    <input name="qty" placeholder="Please input quantity" type="number">
                </label>          
                <label for="name food">
                Food Name
                <br>
                <select name="price">
                    <option>Search Food Menu</option>
                    <?php
                    
                    $menu = mysqli_query($query, "SELECT * FROM tb_menu ORDER BY tm_id");
                    while($m = mysqli_fetch_assoc($menu)){
                    
                    ?>
                        <option value="<?php echo $m['tm_price'] ?>"><?php echo $m['tm_food_name']  ?>(<?php echo $m['tm_price'] ?>)</option>
                        <?php } ?>
                </select>
                    </label>             
                    <input type="submit" value="Create" name="save" class="btn">         
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