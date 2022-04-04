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
         if(isset($_GET['idm']))

         $id = $_GET['idm'];

         $read = mysqli_query($query, "SELECT * FROM tb_menu WHERE tm_id='$id'");
         $r = mysqli_fetch_assoc($read);
        
        ?>
        <section class="panel important">
            <form action="u_menu.php" method="POST" enctype="multipart/form-data">
                <h2>UPDATE MENU AREA</h2>
                <input type="hidden" name="id" value="<?php echo $r['tm_id'] ?>">
                <label for="name food">
                Food Name
                    <br>
                    <input name="name" placeholder="input" type="text" value="<?php echo $r['tm_food_name'] ?>">
                </label>
                <br>               
                <label for="img">
                    Change Photos
                    <img src="../../<?php echo $r['tm_img'] ?>" alt="" width="150" height="150" style="margin-left: -110px; margin-bottom:30px;">
                    <input type="file" name="foto2">
                    <input type="hidden" name="foto" value="<?php echo $r['tm_img'] ?>">
                </label>          
                <label for="price">
                    Insert Price
                    <input name="price" placeholder="input" type="text" value="<?php echo $r['tm_price'] ?>">
                </label>          
                <label for="Description">
                    Description
                    <input name="desc" placeholder="input" type="text" value="<?php echo $r['tm_desc'] ?>">
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