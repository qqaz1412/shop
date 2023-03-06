<?php
if(empty($_POST['username'] and $_POST['password'] and $_POST['confirm'])){
    echo json_encode(array('status'=>"error",'message'=>"กรุณากรอกข้อมูลให้ครบ"));
}elseif($_POST['password'] != $_POST['confirm']){
    echo json_encode(array('status'=>"error",'message'=>"กรุณากรอกรหัสผ่านให้ตรงกัน"));
}elseif($_POST['username'] == "admin"){
    echo json_encode(array('status'=>"error",'message'=>"ไม่สามารถใช้ชื่อผู้ใช้นี้ได้"));
}elseif($_POST['username'] == "demo"){
    echo json_encode(array('status'=>"error",'message'=>"ไม่สามารถใช้ชื่อผู้ใช้นี้ได้"));
}else{
    include '../system/class.php';
    $pluem = new classwebshop;
    $username = $_POST['username'];
    $password = $_POST['password'];
    $captcha = $_POST['captcha'];
    $register = $pluem->register($username,$password,$captcha);
}
?>