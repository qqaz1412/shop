<?php
include '../../config/class.php';
$pluem = new classadmin;
if(empty($_SESSION['id_admin'])){
    echo json_encode(array('status'=>"error",'message'=>"ไม่ใช่แอดมิน"));
}elseif(empty($_POST['add_point_code'] and $_POST['add_amount_code'] and $_POST['add_code_code'])){
    echo json_encode(array('status'=>"error",'message'=>"กรุณากรอกข้อมูลให้ครบ"));
}else{
    $point = $_POST['add_point_code'];
    $amount = $_POST['add_amount_code'];
    $code = $_POST['add_code_code'];
    $add_code = $pluem->add_code($point,$amount,$code);
}
?>