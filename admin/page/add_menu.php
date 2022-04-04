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
            <form action="c_menu.php" method="POST" enctype="multipart/form-data">
                <h2>CREATE MENU AREA</h2>
                <label for="name food">
                Food Name
                    <br>
                    <input name="name" placeholder="input" type="text">
                </label>
                <br>               
                <label for="img">
                    Add Photos
                    <input type="file" name="image">
                </label>          
                <label for="price">
                    Insert Price
                    <input name="price" placeholder="input" type="text">
                </label>          
                <label for="Description">
                    Description
                    <input name="desc" placeholder="input" type="text">
                </label>
                <input type="submit" value="create" name="create" class="btn">               
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
</html>