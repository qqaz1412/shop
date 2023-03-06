<?php
include '../../config/class.php';
$pluem = new classadmin;
if(empty($_SESSION['id_admin'])){
    echo json_encode(array('status'=>"error",'message'=>"ไม่ใช่แอดมิน"));
}elseif(empty($_POST['add_name_type_product'] and $_POST['add_image_type_product'])){
    echo json_encode(array('status'=>"error",'message'=>"กรุณากรอกข้อมูลให้ครบ"));
}else{
    $name = $_POST['add_name_type_product'];
    $image = $_POST['add_image_type_product'];
    $add_product = $pluem->add_type_product($name,$image);
}
?>