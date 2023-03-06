<?php
include '../../config/class.php';
$pluem = new classadmin;
if(empty($_SESSION['id_admin'])){
    echo json_encode(array('status'=>"error",'message'=>"ไม่ใช่แอดมิน"));
}elseif(empty($_POST['add_name_card_product'] and $_POST['add_image_card_product'] and $_POST['add_price_card_product'] and $_POST['id_card_product_type'] and $_POST['add_details_card_product'])){
    echo json_encode(array('status'=>"error",'message'=>"กรุณากรอกข้อมูลให้ครบ"));
}else{
    $name = $_POST['add_name_card_product'];
    $image = $_POST['add_image_card_product'];
    $price = $_POST['add_price_card_product'];
    $type = $_POST['id_card_product_type'];
    $details = $_POST['add_details_card_product'];
    $add_card_product = $pluem->add_card_product($name,$image,$price,$type,$details);
}
?>