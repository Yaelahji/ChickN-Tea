<section class="panel important">
<ul class="utilities">
          <li><a href="add_orders.php" style="color: green;">+ Add</a></li>
</ul>   
<table>
  <thead>
    <tr>
      <th>No</th>
      <th>name costumer</th>
      <th>name menu</th>
      <th>qty</th>
      <th>no orders</th>
      <th>notes</th>
      <th>price</th>
      <th>action</th>
    </tr>
  </thead>
  <tbody>
      <?php
       $orders = mysqli_query($query, "SELECT * FROM tb_orders LEFT JOIN tb_menu
       ON to_tm_id=tm_id ORDER BY to_id");
       $no = 1;
       while($o = mysqli_fetch_assoc($orders)){
      ?>
    <tr>
      <td data-column="number"><?php echo $no++ ?></td>
      <td data-column="name costumer"><?php echo $o['to_name_costumer'] ?></td>
      <td data-column="name menu"><?php echo $o['tm_food_name'] ?></td>
      <td data-column="quantity"><?php echo $o['to_qty'] ?></td>
      <td data-column="no orders"><?php echo $o['to_no_orders'] ?></td>
      <td data-column="notes"><?php echo $o['to_notes'] ?></td>
      <td data-column="price">Rp. <?php echo $o['to_total_price'] ?></td>
      <td>
          <a href="delete_orders.php?ido=<?php echo $o['to_id'] ?>" style="color:red;">Delete</a>
          ||
          <a href="update_orders.php?ido=<?php echo $o['to_id'] ?>" style="color:orange;">update</a>
      <td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</section>