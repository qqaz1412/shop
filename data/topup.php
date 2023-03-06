<?php
include '../system/class.php';
$pluem = new classwebshop;
if(empty($_SESSION['id'])){
    echo json_encode(array('status'=>"error",'message'=>"กรุณาเข้าสู่ระบบ"));
}elseif($_POST['type'] == "topup_bank"){
    if(empty($_POST['amount'] and $_POST['name'] and $_POST['date'] and $_POST['time'])){
        echo json_encode(array('status'=>"error",'message'=>"กรุณากรอกข้อมูลให้ครบ"));
    }else{
        $topup_bank = $pluem->topup_bank($_POST['amount'],$_POST['name'],$_POST['date'],$_POST['time']);
    }
}elseif($_POST['type'] == "topup_gif"){
    if(empty($_POST['link_topup'])){
        echo json_encode(array('status'=>"error",'message'=>"กรุณากรอกข้อมูลให้ครบ"));
    }else{
        $string = "https://gift.truemoney.com/campaign/?v=";
        $voucher = $_POST['link_topup'];
        $link_topup = explode("?v=", $voucher)[1];
        if(empty($link_topup)){
            echo json_encode(array('status'=>"error",'message'=>"กรุณากรอกอั่งเปาให้ถูกต้อง"));
        }else{
            $topup_gif = $pluem->topup_gif($link_topup);
        }
    }
}elseif($_POST['type'] == "topup_code"){
    if(empty($_POST['code'])){
        echo json_encode(array('status'=>"error",'message'=>"กรุณากรอกข้อมูลให้ครบ"));
    }else{
        $topup_code = $pluem->topup_code($_POST['code']);
    }
}else{
    echo "จะเข้ามาดูอะไรครับ";
}
?>