<?php
include '../system/class.php';
if(empty($_SESSION['id'])){
    echo json_encode(array('status'=>"error",'message'=>"กรุณาเข้าสู่ระบบ"));
}elseif(empty($_POST['id_product'])){
    echo json_encode(array('status'=>"error",'message'=>"ไม่พบสินค้านี้"));
}else{
    $Patiphan = new classwebshop;
    $buyproduct = $Patiphan->buyproduct($_POST['id_product']);
}
?>