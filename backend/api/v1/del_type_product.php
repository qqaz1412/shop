<?php
include '../../config/class.php';
$pluem = new classadmin;
if (empty($_SESSION['id_admin'])){
    echo json_encode(array('status'=>"error",'message'=>'มึงไม่ใช่แอดมินไอ่สัส'));
}elseif (empty($_POST['id_type_product'])) {
	echo json_encode(array('status'=>"error",'message'=>'ไม่พบผู้ใช้'));
}else{
	$del_type_product = $pluem->del_type_product($_POST['id_type_product']);
}
?>