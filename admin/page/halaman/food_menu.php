<section class="panel important">
<ul class="utilities">
    <li><a href="add_menu.php" style="color: green;">+ Add</a></li>
</ul>   
<table>
  <thead>
    <tr>
      <th>No</th>
      <th>food name</th>
      <th>picture</th>
      <th>price</th>
      <th>description</th>
      <th>action</th>
    </tr>
  </thead>
  <tbody>
  <?php
       $menu = mysqli_query($query, "SELECT * FROM tb_menu ORDER BY tm_id");
       $no = 1;
       while($m = mysqli_fetch_assoc($menu)){
      ?>
    <tr>
      <td data-column="number"><?php echo $no++ ?></td>
      <td data-column="name costumer"><?php echo $m['tm_food_name'] ?></td>
      <td data-column="name menu"><img src="../../<?php echo $m['tm_img'] ?>" alt="" width="50" height="50"></img></td>
      <td data-column="price">Rp. <?php echo $m['tm_price'] ?></td>
      <td data-column="quantity"><?php echo $m['tm_desc'] ?></td>
      <td>
          <a href="delete_menu.php?idm=<?php echo $m['tm_id'] ?>" style="color:red;">Delete</a>
          ||
          <a href="update_menu.php?idm=<?php echo $m['tm_id'] ?>" style="color:orange;">update</a>
      <td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</section>