<?php
include '../../config/class.php';
$pluem = new classadmin;
if(empty($_SESSION['id_admin'])){
    echo json_encode(array('status'=>"error",'message'=>"ไม่ใช่แอดมิน"));
}elseif(empty($_POST['edit_name_type_product'] and $_POST['edit_image_type_product'] and $_POST['id_type_product'])){
    echo json_encode(array('status'=>"error",'message'=>"กรุณากรอกข้อมูลให้ครบ"));
}else{
    $name = $_POST['edit_name_type_product'];
    $image = $_POST['edit_image_type_product'];
    $id = $_POST['id_type_product'];
    $edit_product = $pluem->edit_type_product($name,$image,$id);
}
?>