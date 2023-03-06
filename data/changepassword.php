<?php
include '../system/class.php';
if(empty($_SESSION['id'])){
	echo json_encode(array('status'=>"error",'message'=>"กรุณาเข้าสู่ระบบ"));
}elseif(empty($_POST['oldpassword'] and $_POST['newpassword'] and $_POST['confirmnewpassword'])){
    echo json_encode(array('status'=>"error",'message'=>"กรุณากรอกข้อมูลให้ครบ"));
}elseif($_POST['newpassword'] != $_POST['confirmnewpassword']){
    echo json_encode(array('status'=>"error",'message'=>"กรุณากรอกรหัสผ่านใหม่ให้ตรงกัน"));
}else{
    $Patiphan = new classwebshop();
    $changepassword = $Patiphan->changepassword($_POST['oldpassword'],$_POST['newpassword']);
}

?>