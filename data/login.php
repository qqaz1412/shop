<?php
if(empty($_POST['username'] and $_POST['password'])){
    echo json_encode(array('status'=>"error",'message'=>"กรุณากรอกข้อมูลให้ครบ"));
}else{
    include '../system/class.php';
    $Patiphan = new classwebshop;
    $login = $Patiphan->login($_POST['username'],$_POST['password'],$_POST['captcha']);
}
?>