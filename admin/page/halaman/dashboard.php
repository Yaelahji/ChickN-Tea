<section class="panel important">
<section id="services">
    <div class="container">
        <div class="row space-rows" id="animated-cards">
            <div class="col">
                <div class="card cards-shadown cards-hover">
                    <div class="card-header">
                        <div class="cardheader-text">
                            <h4 id="heading-card-1" class="heading-card">Food Menu</h4>
                            <p id="cardheader-subtext-1" class="cardheader-subtext">Chick 'N Tea</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php
                         $data = mysqli_query($query, "SELECT * FROM tb_menu WHERE tm_id");
                        
                        ?>
                        <h1 class="card-text cardbody-sub-text"><?php echo mysqli_num_rows($data) ?></h1>
                        <p class="card-text cardbody-sub-text"><a href="index.php?halaman=menu">the latest data on the current food menu</a></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card cards-shadown cards-hover">
                    <div class="card-header">
                        <div class="cardheader-text">
                            <h4 id="heading-card-2" class="heading-card">Data Orders</h4>
                            <p id="cardheader-subtext-2" class="cardheader-subtext">Chick 'N Tea</p>
                        </div>
                    </div>
                    <div class="card-body">
                    <?php
                         $data = mysqli_query($query, "SELECT * FROM tb_orders WHERE to_id");
                        
                        ?>
                    <h1 class="card-text cardbody-sub-text"><?php echo mysqli_num_rows($data) ?></h1>
                        <p class="card-text cardbody-sub-text"><a href="index.php?halaman=menu">the latest data on the current Orders Menu</a></p>
                    </div>
                </div>
                <br>
                <br>
                <table>
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>name costumer</th>
                        <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $orders = mysqli_query($query, "SELECT * FROM tb_table ORDER BY tt_id");
                        $no = 1;
                        while($o = mysqli_fetch_array($orders)){
                            if($o['tt_status']=='OFF'){
                                ?>
                                <tr>
                                    <td data-column="number"><?php echo $no++ ?></td>
                                    <td data-column="number">Table <?php echo $o['tt_table_no'] ?></td>
                                    <td>
                                        <a href="ChangeStatus_table.php?idt=<?php echo $o['tt_id'] ?>" style="color:red;">Changes</a>
                                    <td>
                                </tr>
                                <?php
                            }
                            }
                        ?>
                    </tbody>
                    </table>
            </div>
    </div>
</section>
</section>