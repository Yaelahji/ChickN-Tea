<?php

include_once('../../conn.php');

if(isset($_POST['create'])){

    $name = $_POST['name'];
    $notes = $_POST['desc'];
    $price = $_POST['price'];
    $timestamp = date('Y-m-d h:i:s');

    $filename = $_FILES['image']['name'];
	$tmp_name = $_FILES['image']['tmp_name'];

	$type1 = explode('.', $filename);
    $type2 = $type1[1];
    
    $newname = 'images/'.time().'.'.$type2;


    // data format file yang di izinkan
    $diizinkan = array('jpg', 'jpeg', 'png', 'gif');

    //validasi format file
    if (!in_array($type2, $diizinkan)) {
        //jika format file tidak ada di dalam type yang di izinkan
        echo '<script>alert("Format File Tidak Di Izinkan")</script>';
    }else{
        //jika format file sesuai 
         move_uploaded_file($tmp_name, '../../images/'.$newname);

    $create = mysqli_query($query, "INSERT INTO tb_menu VALUE('','',
                                '".$name."',
                                '".$notes."',
                                '".$price."',
                                '".$newname."',
                                '".$timestamp."',
                                '".$timestamp."'
                                    )");
    if($create){
        echo '<script>window.location.href="index.php?halaman=menu"</script>';
    }else{
        echo "Gagal membuat menu".mysqli_error($create);
    }
    }                                     
    

}



?>