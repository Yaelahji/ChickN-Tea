<?php 

include_once "../../conn.php";
error_reporting(0);

if(isset($_POST['update'])){

    $id = $_POST['id'];
    $name = $_POST['name'];
    $notes = $_POST['desc'];
    $price = $_POST['price'];
    $foto = $_POST['foto'];
    $timestamp = date('Y-m-d h:i:s');

    $filename = $_FILES['foto2']['name'];
	$tmp_name = $_FILES['foto2']['tmp_name'];

					//jika admin ngubah gambar apa yng akn di lakukan

					if ($filename != '') {

					$type1 = explode('.', $filename);
					$type2 = $type1[1];

					$newname = '../../images'.time().'.'.$type2;

					// data format file yang di izinkan
					$diizinkan = array('jpg', 'jpeg', 'png', 'gif');

						// code...
						//validasi format file
					if (!in_array($type2, $diizinkan)) {
						//jika format file tidak ada di dalam type yang di izinkan
						echo '<script>alert("Format File Tidak Di Izinkan")</script>';
					}else{
						unlink('./images/'.$foto);
						 move_uploaded_file($tmp_name, '../../images/'.$newname);
						 $namagambar = $newname;

					}


					}else{
						//jika admin tidak ganti gambar
						$namagambar = $foto;

					}


    $update = mysqli_query($query, "UPDATE tb_menu SET 
                            tm_food_name='$name',
                            tm_desc='$notes',
                            tm_price='$price',
                            tm_updated_at='$timestamp',
                            tm_img='$namagambar' WHERE
                            tm_id='$id'");
    if($update){
        echo "<script>window.location.href='index.php?halaman=menu'</script>";
    }else{
        echo "Gagal update data".mysqli_error($update);
    }


    

    




}

?>