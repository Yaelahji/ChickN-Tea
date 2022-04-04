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
<link href="layout/styles/slide.css" rel="stylesheet" type="text/css" media="all">
<link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+P+One&family=Oswald:wght@200&display=swap" rel="stylesheet">

  
</head>
<body id="top">
<div class="wrapper row0">
  <div id="topbar" class="hoc clear"> 
      <h1 class="title-sub">Chick 'N Tea Application</h1>
    <div class="fl_right">
      <ul class="nospace">
        <li><a href="#"><i class="fas fa-home" style="font-size: 25px; color: red;"></i></a></li>
        <li><a href="#latest" title="Food Menu"><i class="fas fa-utensils" style="font-size: 25px; color: red"></i></a></li>
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
  <section id="services" class="hoc container clear"> 
    <div class="sectiontitle">
      <h6 class="heading">New Food</h6>
    </div>
    <ul class="nospace group grid-3">
    <?php
    $newProduct = mysqli_query($query, "SELECT * FROM tb_menu ORDER BY tm_id DESC LIMIT 1");
    while ($np = $newProduct->fetch_assoc()) {
    $rupiah = "Rp " . number_format($np['tm_price'],0,',','.');
    ?>
      <li class="one_third">
        <form action="add_new.php" method="POST">
        <article>
          <p class="heading2"><?= $np['tm_food_name']; ?></p>
          <img class="image" src="<?= $np['tm_img']; ?>">
          <input type="hidden" value="<?= $np['tm_id']; ?>" name="id">
          <input type="hidden" value="<?= $np['tm_price']; ?>" name="price">
          <p><?= $rupiah ?></p>
          <p class="pt"><?= $np['tm_desc']; ?></p>
          <li> <footer><input type="submit" class="btncss" name="add" value="Add To Cart"></footer></li>
        </article>
        </form>
      </li>
    <?php } ?>
    <?php
    $newProduct = mysqli_query($query, "SELECT * FROM tb_menu ORDER BY tm_id !=1 DESC LIMIT 2");
    while ($np = $newProduct->fetch_assoc()) {
      $rupiah = "Rp " . number_format($np['tm_price'],0,',','.');
      ?>
      <li class="one_third">
        <form action="add_new.php" method="POST">
        <article>
          <p class="heading2"><?= $np['tm_food_name']; ?></p>
          <img class="image" src="<?= $np['tm_img']; ?>">
          <input type="hidden" value="<?= $np['tm_id']; ?>" name="id">
          <input type="hidden" value="<?= $np['tm_price']; ?>" name="price">
          <p><?= $rupiah ?></p>
          <p class="pt"><?= $np['tm_desc']; ?></p>
          <li> <footer><input type="submit" class="btncss" name="add" value="Add To Cart"></footer></li>
        </article>
      </form>
      </li>
      <?php } ?>
      </ul>
  </section>
</div>
<div class="bgded overlay">
  <section class="hoc container clear"> 
    <div id="slideshow">
      <h6 class="heading">How To Order</h6>
      <div class="slide-wrapper">
        <div class="slide"><img src="images/slide1.png" alt=""></div>
        <div class="slide"><img src="images/slide2.png" alt=""></div>
        <div class="slide"><img src="images/slide3.png" alt=""></div>
      </div>
    </div>
    <section class="hoc container clear"> 
</div>
<div id="latest" class="wrapper row2">
  <section class="hoc container clear"> 
    <div  class="sectiontitle">
      
      <h6 class="heading">Food Menu</h6>
    </div >
    <ul class="nospace group sd-third">
    <?php
    $displayProduct = mysqli_query($query, "SELECT * FROM tb_menu LIMIT 1");
    while ($prod = $displayProduct->fetch_assoc()) {
    $rupiah = "Rp " . number_format($prod['tm_price'],0,',','.');
    ?>
      <li class="one_third first">
        <form action="" method="POST">
          <article>
            <figure><img src="<?= $prod['tm_img']; ?>" alt="">
            <figcaption>
              <input type="hidden" value="<?= $prod['tm_id']; ?>" name="id">
              <input type="hidden" value="<?= $prod['tm_price']; ?>" name="price">
              <h6 class="heading"><?= $prod['tm_food_name']; ?></h6>
              <ul class="nospace meta clear">
             <li> <footer><input type="submit" class="btncss" name="btn" value="Add To Cart"></footer></li>
                <li>
                  <p><?= $rupiah ?></p>
                </li>
              </ul>
            </figcaption>
          </figure>
          <p><?= $prod['tm_desc']; ?></p>
        </article>
      </form>
      </li>
      <?php } ?>
      <?php
      $displayProduct = mysqli_query($query, "SELECT * FROM tb_menu WHERE tm_id !=1 LIMIT 2");
      while ($prod = $displayProduct->fetch_assoc()) {
      $rupiah = "Rp " . number_format($prod['tm_price'],0,',','.');
      ?>
      <li class="one_third">
        <article>
        <form action="" method="POST">
          <input type="hidden" name="id" value="<?= $prod['tm_id']; ?>">
          <input type="hidden" value="<?= $prod['tm_price']; ?>" name="price">
          <figure><img src="<?= $prod['tm_img']; ?>" alt="">
            <figcaption>
              <h6 class="heading"><?= $prod['tm_food_name']; ?></h6>
              <ul class="nospace meta clear">
              <li> <footer><input type="submit" class="btncss" name="btn" value="Add To Cart"></footer></li>
                <li>
                  <p><?= $rupiah ?></p>
                </li>
              </ul>
            </figcaption>
          </figure>
          <p><?= $prod['tm_desc']; ?></p>
        </form>
        </article>
      </li>
      <?php } ?>
      <?php
    $displayProduct = mysqli_query($query, "SELECT * FROM tb_menu WHERE tm_id='4'");
    while ($prod = $displayProduct->fetch_assoc()) {
    $rupiah = "Rp " . number_format($prod['tm_price'],0,',','.');
    ?>
      <li class="one_third first">
        <article>
          <form action="" method="POST">
          <input type="hidden" name="id" value="<?= $prod['tm_id']; ?>">
          <input type="hidden" value="<?= $prod['tm_price']; ?>" name="price">
          <figure><img src="<?= $prod['tm_img']; ?>" alt="">
            <figcaption>
              <h6 class="heading"><?= $prod['tm_food_name']; ?></h6>
              <ul class="nospace meta clear">
              <li> <footer><input type="submit" class="btncss" name="btn" value="Add To Cart"></footer></li>
                <li>
                  <p><?= $rupiah ?></p>
                </li>
              </ul>
            </figcaption>
          </figure>
          <p><?= $prod['tm_desc']; ?></p>
          </form>
        </article>
      </li>
      <?php } ?>
      <?php
      $displayProduct = mysqli_query($query, "SELECT * FROM tb_menu ORDER BY tm_id ASC LIMIT 4,10");
      while ($prod = $displayProduct->fetch_assoc()) {
      $rupiah = "Rp " . number_format($prod['tm_price'],0,',','.');
      ?>
      <li class="one_third">
        <article>
        <form action="" method="POST">
          <input type="hidden" name="id" value="<?= $prod['tm_id']; ?>">
          <input type="hidden" value="<?= $prod['tm_price']; ?>" name="price">
          <figure><img src="<?= $prod['tm_img']; ?>" alt="">
            <figcaption>
              <h6 class="heading"><?= $prod['tm_food_name']; ?></h6>
              <ul class="nospace meta clear">
              <li> <footer><input type="submit" class="btncss" name="btn" value="Add To Cart"></footer></li>
                <li>
                  <p><?= $rupiah ?></p>
                </li>
              </ul>
            </figcaption>
          </figure>
          <p><?= $prod['tm_desc']; ?></p>
        </form>
        </article>
      </li>
      <?php } ?>
    </ul>
</div>
<div class="bgded overlay"> 
  <div class="wrapper row5">
    <div id="copyright" class="hoc clear"> 
      <p class="fl_left">Copyright &copy; 2022 - All Rights Reserved - <a href="https://yaelahka.com">Yaelahka.com</a></p>
    </div>
  </div>
</div>
<a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>


<?php 
      include "conn.php";

      if(isset($_POST['btn'])){

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
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>