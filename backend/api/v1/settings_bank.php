<?php
include '../../config/class.php';
$pluem = new classadmin;
if(empty($_SESSION['id_admin'])){
    echo json_encode(array('status'=>"error",'message'=>"ไม่ใช่แอดมิน"));
}elseif($_POST['type'] == "success"){
    $success = $pluem->success_bank($_POST['idbank']);
}elseif($_POST['type'] == "not_success"){
    $not_success = $pluem->not_success_bank($_POST['idbank']);
}elseif($_POST['type'] == "del_bank_history"){
    $not_success = $pluem->del_bank_history($_POST['idbank']);
}else{
    echo "้เข้ามาดูอะไร";
}

?>