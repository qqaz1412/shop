<?php
include '../../config/class.php';
$pluem = new classadmin;
if(empty($_SESSION['id_admin'])){
    echo json_encode(array('status'=>"error",'message'=>"ไม่ใช่แอดมิน"));
}elseif(empty($_POST['add_item_product_incard'] and $_POST['id_add_product_incard'])){
    echo json_encode(array('status'=>"error",'message'=>"กรุณากรอกข้อมูลให้ครบ"));
}else{
    $item = $_POST['add_item_product_incard'];
    $id_product = $_POST['id_add_product_incard'];
    $add_card_product = $pluem->addstock($item,$id_product);
}
?>