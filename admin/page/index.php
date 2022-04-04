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
        if(isset($_GET['halaman'])){
          $page = $_GET['halaman'];
      
          switch ($page) {
            case 'dashboard':
              include "halaman/dashboard.php";
              break;
            case 'menu':
              include "halaman/food_menu.php";
              break;
              case 'orders':
                include "halaman/orders.php";
                break;			
              case 'report':
                include "halaman/report.php";
                break;					
              default:
              echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
              break;
          }
        }else{
          include "halaman/dashboard.php";
        }
      
        ?>
        
        
      
      </main>    
    
</body>
</html>