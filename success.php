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
        <li><a href="Cart.php" title="Cart"><i class="fas fa-shopping-cart" style="font-size: 25px; color: red"></i></a></li>
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
    <section class="hoc container clear"> 
        <div  class="sectiontitle">
            <br>
            <br>
            <br>
            <br>
            <br>
            <h3>Hai Pelanggan!</h3>
            <h6>Pesananmu Berhasil, Silahkan menunggu makananmu datang ya:)</h6>
    </section>
</div>
<div class="bgded overlay"> 
  <div class="wrapper row5">
    <div id="copyright" class="hoc clear"> 
      <p class="fl_left">Copyright &copy; 2022 - All Rights Reserved - <a href="https://yaelahka.com">Yaelahka.com</a></p>
    </div>
  </div>
</div>
<a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>