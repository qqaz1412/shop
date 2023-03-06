<?php
include '../../config/class.php';
$pluem = new classadmin;
if (empty($_SESSION['id_admin'])){
    echo json_encode(array('status'=>"error",'message'=>'มึงไม่ใช่แอดมินไอ่สัส'));
}elseif (empty($_POST['id_card_product'])) {
	echo json_encode(array('status'=>"error",'message'=>'ไม่พบการ์ดสินค้า'));
}else{
	$del_user = $pluem->del_card_product($_POST['id_card_product']);
}
?>