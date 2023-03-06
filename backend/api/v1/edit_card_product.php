<?php
include '../../config/class.php';
$pluem = new classadmin;
if(empty($_SESSION['id_admin'])){
    echo json_encode(array('status'=>"error",'message'=>"ไม่ใช่แอดมิน"));
}elseif(empty($_POST['edit_name_card_product'] and $_POST['edit_image_card_product'] and $_POST['edit_price_card_product'] and $_POST['id_card_product'] and $_POST['edit_details_card_product'])){
    echo json_encode(array('status'=>"error",'message'=>"กรุณากรอกข้อมูลให้ครบ"));
}else{
    $name = $_POST['edit_name_card_product'];
    $image = $_POST['edit_image_card_product'];
    $price = $_POST['edit_price_card_product'];
    $id_card = $_POST['id_card_product'];
    $details = $_POST['edit_details_card_product'];
    $edit_user = $pluem->edit_card_product($name,$image,$price,$id_card,$details);
}
?>