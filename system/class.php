<?php
require 'connect.php';
class classwebshop{
    function __construct()
	{
		$this->db = database();
	}
	public function history_bank(){
		$stmt = $this->db->prepare("SELECT * FROM history_bank WHERE username = :username");
        $stmt->execute([':username'=>$_SESSION['username']]);
        $result = $stmt->fetchAll();
        return $result;
	}
	public function topup_bank($amount,$name,$date,$time){
		$stmt = $this->db->prepare("SELECT * FROM history_bank WHERE username = :username ORDER BY id DESC LIMIT 1");
        $stmt->execute([':username'=>$_SESSION['username']]);
        $result_history_bank = $stmt->fetch();
		if($result_history_bank['status'] == "0"){
			echo json_encode(array('status'=>"error",'message'=>"ท่านได้ทำรายการไปแล้ว กรุณารอตรวจสอบ"));
		}else{
			$token = "Pfi4aIw0w5bzFe7304TkXNqtgLOwLy2dWziieg7n32P";
			$message = "\nแจ้งเตือนเติมเงิน\nชื่อผู้ใช้ : ".$_SESSION['username']."\nจำนวนเงิน : ".$amount."บาท\nชื่อบัญชี : ".$name."\nเมื่อวันที่ : ".$date."\nเมื่อเวลา : ".$time."น.";
			$chOne = curl_init(); 
			curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
			curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
			curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
			curl_setopt( $chOne, CURLOPT_POST, 1); 
			curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$message); 
			$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$token.'', );
			curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
			curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
			$result = curl_exec( $chOne ); 
			$inseart = $this->db->prepare("INSERT INTO `history_bank` (`username`, `amount`, `name`, `date`, `time`) VALUES (:username, :amount, :name, :date, :time);");
			try {
				$inseart->execute([':username'=>$_SESSION['username'],':amount'=>$amount,':name'=>$name,':date'=>$date,':time'=>$time]);
				echo json_encode(array('status'=>"success",'message'=>'ทำรายการสำเร็จ กรุณารอแอดมินตรวจสอบ'));
			} catch (Exception $e) {
				echo json_encode(array('status'=>"error",'message'=>$e->getmessage()));
			}
		}
	}
	public function topup_code($code){
		$stmt = $this->db->prepare("SELECT * FROM stock_code WHERE code = :code");
		$stmt->execute([':code'=>$code]);
		$result = $stmt->fetch();
		$stmt1 = $this->db->prepare("SELECT * FROM history_code WHERE code = :code AND username = :username");
		$stmt1->execute([':code'=>$code,':username'=>$_SESSION['username']]);
		if ($stmt1->RowCount() > 0) {
			echo json_encode(array('status'=>"error",'message'=>'ท่านเคยใช้โค๊ดนี้ไปแล้ว'));
		}else{
			if ($code == $result['code']){
				if ($result['amount'] == 0){
					echo json_encode(array('status'=>"error",'message'=>'โค๊ดถูกใช้งานหมดแล้ว'));
				}else{
					$updatepoint = $this->db->prepare("UPDATE tbl_username SET point = (point + :point) WHERE id = :id");
					$updateamount = $this->db->prepare("UPDATE stock_code SET amount = (amount - 1) WHERE code = :code");
					$inseart = $this->db->prepare("INSERT INTO `history_code` (`username`, `code`, `point`, `date`) VALUES (:username, :code, :point,CURRENT_TIMESTAMP);");
					try {
						$updatepoint->execute([':point'=>$result['point'],':id'=>$_SESSION['id']]);
						$updateamount->execute([':code'=>$code]);
						$inseart->execute([':username'=>$_SESSION['username'],':code'=>$code,':point'=>$result['point']]);
						echo json_encode(array('status'=>"success",'message'=>"แลกโค๊ด สำเร็จ ".$result['point']." บาท"));
					} catch (Exception $e) {
						echo json_encode(array('status'=>"error",'message'=>$e->getmessage()));
					}
				}
			}else{
				echo json_encode(array('status'=>"error",'message'=>'ไม่มีรหัสโค๊ดที่ท่านกรอกอยู่ในระบบ'));
			}
		}
	}
    public function web_config(){
		$stmt = $this->db->prepare("SELECT * FROM web_config WHERE id = '1'");
		$stmt->execute();
		$result = $stmt->fetch();
		return $result;
	}
	public function resultuser(){
		$stmt = $this->db->prepare("SELECT * FROM tbl_username WHERE id = :id");
		$stmt->execute([':id'=>$_SESSION['id']]);
		$result = $stmt->fetch();
		return $result;
	}
    public function type_product(){
        $stmt = $this->db->prepare("SELECT * FROM type_product ORDER BY id");
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    public function showcard($type){
        $stmt = $this->db->prepare("SELECT * FROM card_product WHERE type = :type");
        $stmt->execute([':type'=>$type]);
        $result = $stmt->fetchAll();
        return $result;
    }
    public function showname_product($id){
        $stmt = $this->db->prepare("SELECT * FROM type_product WHERE id = :id");
        $stmt->execute([':id'=>$id]);
        $result = $stmt->fetch();
        return $result;
    }
    public function totalproduct($type){
		$stmt = $this->db->prepare("SELECT count(id) as total FROM stock WHERE type = :type AND username_buy = '0'");
		$stmt->execute(['type'=>$type]);
		$result = $stmt->fetch();
		return $result;
	}
    public function login($username,$password,$captcha){
		$web_config = $this->web_config();
		$key = $web_config['key2'];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "secret=".$key."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close ($ch);
        $result = json_decode($server_output, true);
        if ($result['success']) {
			$stmt = $this->db->prepare("SELECT * FROM tbl_username WHERE username = :username");
			$stmt->execute([':username'=>$username]);
			$result = $stmt->fetch();
			if ($stmt->RowCount() > 0) {
				if ($password == $result['password']) {
					$_SESSION['id'] = $result['id'];
					$_SESSION['username'] = $result['username'];
                    echo json_encode(array('status'=>"success",'message'=>"เข้าสู่ระบบสำเร็จ")); 
				}else{
                    echo json_encode(array('status'=>"error",'message'=>"รหัสผ่านไม่ถูกต้อง")); 
				}
			}else{
				echo json_encode(array('status'=>"error",'message'=>"ไม่พบชื่อผู้ใช้นี้"));
			}
		}else{
            echo json_encode(array('status'=>"error",'message'=>"กรุณายืนยันตัวตน"));
		}
    }
    public function register($username,$password,$captcha){
		$web_config = $this->web_config();
		$key = $web_config['key2'];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "secret=".$key."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close ($ch);
        $result = json_decode($server_output, true);
        if ($result['success']) {
			$stmt = $this->db->prepare("SELECT * FROM tbl_username WHERE username = :username");
			$stmt->execute(array(':username'=>$username));
			if ($stmt->RowCount() > 0) {
				echo json_encode(array('status'=>"error",'message'=>"มีชื่อผู้ใช้นี้แล้ว"));
			}else{
				$inseart = $this->db->prepare("INSERT INTO `tbl_username` (`username`, `password`,`date`) VALUES (:username, :password,CURRENT_TIMESTAMP);");
				try {
					$inseart->execute([':username'=>$username,':password'=>$password]);
					$stmt = $this->db->prepare("SELECT * FROM tbl_username WHERE username = :username");
					$stmt->execute([':username'=>$username]);
					$result = $stmt->fetch();
					$_SESSION['id'] = $result['id'];
					$_SESSION['username'] = $result['username'];
					echo json_encode(array('status'=>"success",'message'=>"สมัครสมาชิกสำเร็จ"));
				} catch (Exception $e) {
					echo json_encode(array('status'=>"error",'message'=>$e->getmessage()));
				}
			}
        }else{
			echo json_encode(array('status'=>"error",'message'=>"กรุณายืนยันตัวตน"));
        }
	}
	public function buyproduct($type){
		$resultuser = $this->resultuser();
		$card = $this->db->prepare("SELECT * FROM card_product WHERE id = :id");
        $card->execute([':id'=>$type]);
        $resultcard = $card->fetch();
		
		$stmtstock = $this->db->prepare("SELECT count(id) as total FROM stock WHERE type = :type AND username_buy = '0'");
		$stmtstock->execute(['type'=>$type]);
		$resultstock = $stmtstock->fetch();
		if($resultstock['total'] == 0){
			echo json_encode(array('status'=>"error",'message'=>"สินค้าหมด"));
		}else{
			if($resultuser['point'] < $resultcard['price']){
				echo json_encode(array('status'=>"error",'message'=>"ยอดเงินไม่เพียงพอ"));
			}else{
				$stmt = $this->db->prepare("SELECT * FROM stock WHERE type = :type AND username_buy = '0' LIMIT 1");
				$stmt->execute([':type'=>$type]);
				$result = $stmt->fetch();
				$updatepoint = $this->db->prepare("UPDATE `tbl_username` SET `point`= point - :point WHERE id = :id");
				$updatestock = $this->db->prepare("UPDATE `stock` SET `username_buy`= :username_buy, `price`= :price, `date`= CURRENT_TIMESTAMP, `name`= :name WHERE id = :id");
				try {
					$updatepoint->execute([':point'=>$resultcard['price'],':id'=>$_SESSION['id']]);
					$updatestock->execute([':username_buy'=>$_SESSION['username'],':price'=>$resultcard['price'],':name'=>$resultcard['name'],':id'=>$result['id']]);
					echo json_encode(array('status'=>"success",'message'=>"ซื้อสินค้าสำเร็จ"));
				} catch (Exception $e) {
					echo json_encode(array('status'=>"error",'message'=>$e->getmessage()));
				}
			}
		}
	}
	public function topup_gif($link_topup){
		$web_config = $this->web_config();
		$phone = $web_config['phone'];
		$curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.xpluem.com/'.$link_topup.'/'.$phone,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        $response = curl_exec($curl);
		curl_close($curl);
		$result = json_decode($response);

		$codestatus = $result->code;
		$message = $result->message;
		$status = $result->status;
		if ($codestatus =="200"){
			$amount = $result->data->amount;
			$name = $result->data->name;
			$update = $this->db->prepare("UPDATE tbl_username SET point = point + :point WHERE id = :id");
			$inserttopup = $this->db->prepare("INSERT INTO `history_topup` (`username`, `name`, `amount`, `link`, `status`, `date`) VALUES (:username, :name, :amount, :link, :status, CURRENT_TIMESTAMP);");
			try {
				$inserttopup->execute([':username'=>$_SESSION['username'], ':name'=>$name, ':amount'=>$amount,':link'=>$link_topup,':status'=>"0"]);
				$update->execute([':point'=>$amount,':id'=>$_SESSION['id']]);
				echo json_encode(array('status'=>$status,'message'=>$message));
			} catch (Exception $e) {
				echo json_encode(array('status'=>"error",'message'=>$e->getmessage()));
			}
		}else{
			echo json_encode(array('status'=>$status,'message'=>$message));
		}
	}
	public function changepassword($oldpassword,$newpassword){
		$resultuser = $this->resultuser();
		if($resultuser['password'] == $oldpassword){
			$stmt = $this->db->prepare("UPDATE tbl_username SET password = :password WHERE id = :id");
			try {
				$stmt->execute([':password'=>$newpassword,':id'=>$_SESSION['id']]);
				echo json_encode(array('status'=>"success",'message'=>"เปลี่ยนรหัสผ่านสำเร็จ"));
			} catch (Exception $e) {
				echo json_encode(array('status'=>"error",'message'=>$e->getmessage()));
			}
		}else{
			echo json_encode(array('status'=>"error",'message'=>"รหัสผ่านเก่าไม่ถูกต้อง"));
		}
	}
	public function history_buyproduct(){
		$stmt = $this->db->prepare("SELECT * FROM stock WHERE username_buy = :username_buy");
        $stmt->execute([':username_buy'=>$_SESSION['username']]);
        $result = $stmt->fetchAll();
        return $result;
	}
	public function history_topup(){
		$stmt = $this->db->prepare("SELECT * FROM history_topup WHERE username = :username");
        $stmt->execute([':username'=>$_SESSION['username']]);
        $result = $stmt->fetchAll();
        return $result;
	}
}
?>