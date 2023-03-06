<?php
require 'connect.php';
class classadmin{
    function __construct()
	{
		$this->db = database();
	}
	public function del_bank_history($id){
		$del_code = $this->db->prepare("DELETE FROM `history_bank` WHERE id = :id");
		$del_code->execute([':id'=>$id]);
		echo json_encode(array('status'=>"success",'message'=>'ลบคิวที่ '.$id." สำเร็จ"));
	}
	public function not_success_bank($id){
		$updatehistory_bank = $this->db->prepare("UPDATE `history_bank` SET `status` = '2' WHERE id = :id");
		try {
			$updatehistory_bank->execute([':id'=>$id]);
			echo json_encode(array('status'=>"success",'message'=>"แก้ไขคิวสำเร็จ"));
		} catch (Exception $e) {
			echo json_encode(array('status'=>"error",'message'=>$e->getmessage()));
		}
	}
	public function success_bank($id){
		$stmt = $this->db->prepare("SELECT * FROM history_bank WHERE id = :id");
		$stmt->execute([':id'=>$id]);
		$result = $stmt->fetch();
		if($result['status'] == "1"){
			echo json_encode(array('status'=>"error",'message'=>"ท่านได้อนุมัติคิวนี้ไปแล้ว"));
		}else{
			$stmt = $this->db->prepare("SELECT * FROM history_bank WHERE id = :id");
			$stmt->execute([':id'=>$id]);
			$result_history_bank = $stmt->fetch();

			$updateuser = $this->db->prepare("UPDATE `tbl_username` SET `point` = point + :point WHERE username = :username");
			$updatehistory_bank = $this->db->prepare("UPDATE `history_bank` SET `status` = '1' WHERE id = :id");
			$inserttopup = $this->db->prepare("INSERT INTO `history_topup` (`username`, `name`, `amount`, `link`, `status`, `date`) VALUES (:username, :name, :amount, :link, :status, CURRENT_TIMESTAMP);");
			try {
				$updateuser->execute([':point'=>$result['amount'],':username'=>$result_history_bank['username']]);
				$updatehistory_bank->execute([':id'=>$id]);
				$inserttopup->execute([':username'=>$result_history_bank['username'], ':name'=>$result['name'], ':amount'=>$result['amount'],':link'=>"-",':status'=>"0"]);
				echo json_encode(array('status'=>"success",'message'=>"แก้ไขคิวสำเร็จ"));
			} catch (Exception $e) {
				echo json_encode(array('status'=>"error",'message'=>$e->getmessage()));
			}
		}
	}
	public function show_history_bank_all(){
		$stmt = $this->db->prepare("SELECT * FROM history_bank ORDER BY id");
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}
	public function add_code($point,$amount,$code){
		$stmt = $this->db->prepare("SELECT * FROM stock_code WHERE code = :code");
		$stmt->execute([':code'=>$code]);
		if ($stmt->RowCount() > 0) {
			echo json_encode(array('status'=>"error",'message'=>"มีโค๊ดนี้แล้ว"));
		}else{
			$add_code = $this->db->prepare("INSERT INTO `stock_code` (`code`, `point`, `amount`) VALUES (:code, :point, :amount);");
			try {
				$add_code->execute([':code'=>$code,':point'=>$point,':amount'=>$amount]);
				echo json_encode(array('status'=>"success",'message'=>"เพิ่มข้อมูลสำเร็จ"));
			} catch (Exception $e) {
				echo json_encode(array('status'=>"error",'message'=>$e->getmessage()));
			}
		}
	}
	public function del_code($id){
		$del_code = $this->db->prepare("DELETE FROM `stock_code` WHERE id = :id");
		$del_code->execute([':id'=>$id]);
		echo json_encode(array('status'=>"success",'message'=>'ลบโค๊ดสำเร็จ'));
	}
	public function show_code(){
		$stmt = $this->db->prepare("SELECT * FROM stock_code ORDER BY id");
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}
	public function web_config(){
		$stmt = $this->db->prepare("SELECT * FROM web_config WHERE id = '1'");
		$stmt->execute();
		$result = $stmt->fetch();
		return $result;
	}
	public function login($username,$password){
		$stmt = $this->db->prepare("SELECT * FROM tbl_admin WHERE username = :username");
		$stmt->execute([':username'=>$username]);
		$result = $stmt->fetch();
		if ($stmt->RowCount() > 0) {
			if ($password == $result['password']) {
				$_SESSION['id_admin'] = $result['id'];
				$_SESSION['username_admin'] = $result['username'];
				$updatedate = $this->db->prepare("UPDATE `tbl_admin` SET `date`= CURRENT_TIMESTAMP  WHERE id = :id");
				$updatedate->execute([':id'=>$_SESSION['id_admin']]);
                echo json_encode(array('status'=>"success",'message'=>"เข้าสู่ระบบสำเร็จ")); 
			}else{
                	echo json_encode(array('status'=>"error",'message'=>"รหัสผ่านไม่ถูกต้อง")); 
				}
		}else{
			echo json_encode(array('status'=>"error",'message'=>"ไม่พบชื่อผู้ใช้นี้"));
		}
	}
	public function totaluser(){
		$stmt = $this->db->prepare("SELECT count(id) as total FROM tbl_username");
		$stmt->execute();
		$result = $stmt->fetch();
		return $result;
	}
	public function totaltopup(){
		$stmt = $this->db->prepare("SELECT sum(amount) as total FROM history_topup");
		$stmt->execute();
		$result = $stmt->fetch();
		return $result;
	}
	public function totalproduct(){
		$stmt = $this->db->prepare("SELECT count(id) as total FROM stock WHERE username_buy = '0'");
		$stmt->execute();
		$result = $stmt->fetch();
		return $result;
	}
	public function totalproduct_(){
		$stmt = $this->db->prepare("SELECT count(id) as total FROM stock WHERE username_buy != '0'");
		$stmt->execute();
		$result = $stmt->fetch();
		return $result;
	}
	public function show_user(){
		$stmt = $this->db->prepare("SELECT * FROM tbl_username ORDER BY id");
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}
	public function showedit_user($id){
		$stmt = $this->db->prepare("SELECT * FROM tbl_username WHERE id = :id");
		$stmt->execute([':id'=>$id]);
		$result = $stmt->fetch();
		return $result;
	}
	public function show_admin(){
		$stmt = $this->db->prepare("SELECT * FROM tbl_admin ORDER BY id");
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}
	public function showedit_admin($id){
		$stmt = $this->db->prepare("SELECT * FROM tbl_admin WHERE id = :id");
		$stmt->execute([':id'=>$id]);
		$result = $stmt->fetch();
		return $result;
	}
	public function edit_user($username,$passdword,$point,$id_user){
		$updateuser = $this->db->prepare("UPDATE `tbl_username` SET `username` = :username, `password` = :password, `point` = :point WHERE id = :id");
		try {
			$updateuser->execute([':username'=>$username,':password'=>$passdword,':point'=>$point,':id'=>$id_user]);
			echo json_encode(array('status'=>"success",'message'=>"แก้ไขข้อมูลสำเร็จ"));
		} catch (Exception $e) {
			echo json_encode(array('status'=>"error",'message'=>$e->getmessage()));
		}
	}
	public function add_user($username,$passdword,$point){
		$stmt = $this->db->prepare("SELECT * FROM tbl_username WHERE username = :username");
		$stmt->execute([':username'=>$username]);
		if ($stmt->RowCount() > 0) {
			echo json_encode(array('status'=>"error",'message'=>"มีชื่อผู้ใชนี้แล้ว"));
		}else{
			$add_admin = $this->db->prepare("INSERT INTO `tbl_username` (`username`, `password`, `point`) VALUES (:username, :password, :point);");
			try {
				$add_admin->execute([':username'=>$username,':password'=>$passdword,':point'=>$point]);
				echo json_encode(array('status'=>"success",'message'=>"เพิ่มข้อมูลสำเร็จ"));
			} catch (Exception $e) {
				echo json_encode(array('status'=>"error",'message'=>$e->getmessage()));
			}
		}
	}
	public function edit_admin($username,$passdword,$id_admin){
		$updateadmin = $this->db->prepare("UPDATE `tbl_admin` SET `username` = :username, `password` = :password WHERE id = :id");
		try {
			$updateadmin->execute([':username'=>$username,':password'=>$passdword,':id'=>$id_admin]);
			echo json_encode(array('status'=>"success",'message'=>"แก้ไขข้อมูลสำเร็จ"));
		} catch (Exception $e) {
			echo json_encode(array('status'=>"error",'message'=>$e->getmessage()));
		}
	}
	public function add_admin($username,$passdword){
		$stmt = $this->db->prepare("SELECT * FROM tbl_admin WHERE username = :username");
		$stmt->execute([':username'=>$username]);
		if ($stmt->RowCount() > 0) {
			echo json_encode(array('status'=>"error",'message'=>"มีชื่อผู้ใชนี้แล้ว"));
		}else{
			$add_admin = $this->db->prepare("INSERT INTO `tbl_admin` (`username`, `password`) VALUES (:username, :password);");
			try {
				$add_admin->execute([':username'=>$username,':password'=>$passdword]);
				echo json_encode(array('status'=>"success",'message'=>"เพิ่มข้อมูลสำเร็จ"));
			} catch (Exception $e) {
				echo json_encode(array('status'=>"error",'message'=>$e->getmessage()));
			}
		}
	}
	public function del_user($id){
		$del_user = $this->db->prepare("DELETE FROM `tbl_username` WHERE id = :id");
		$del_user->execute([':id'=>$id]);
		echo json_encode(array('status'=>"success",'message'=>'ลบผู้ใช้หมายเลข '.$id.' สำเร็จ'));
	}
	public function del_admin($id){
		$del_admin = $this->db->prepare("DELETE FROM `tbl_admin` WHERE id = :id");
		$del_admin->execute([':id'=>$id]);
		echo json_encode(array('status'=>"success",'message'=>'ลบผู้ดูแลระบบหมายเลข '.$id.' สำเร็จ'));
	}
	public function history_topup(){
		$stmt = $this->db->prepare("SELECT * FROM history_topup ORDER BY id");
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}
	public function history_product(){
		$stmt = $this->db->prepare("SELECT * FROM stock WHERE username_buy != '0' ORDER BY id");
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}
	
	public function del_type_product($id){
		$del_user = $this->db->prepare("DELETE FROM `type_product` WHERE id = :id");
		$del_user->execute([':id'=>$id]);
		echo json_encode(array('status'=>"success",'message'=>'ลบประเภทสินค้าหมายเลข '.$id.' สำเร็จ'));
	}
	public function type_product(){
		$stmt = $this->db->prepare("SELECT * FROM type_product");
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}
	public function card_product($type){
		$stmt = $this->db->prepare("SELECT * FROM card_product WHERE type = :type");
		$stmt->execute([':type'=>$type]);
		$result = $stmt->fetchAll();
		return $result;
	}
	public function add_type_product($name,$image){
		$add_product = $this->db->prepare("INSERT INTO `type_product` (`name`, `image`) VALUES (:name, :image);");
		try {
			$add_product->execute([':name'=>$name,':image'=>$image]);
			echo json_encode(array('status'=>"success",'message'=>"เพิ่มข้อมูลสำเร็จ"));
		} catch (Exception $e) {
			echo json_encode(array('status'=>"error",'message'=>$e->getmessage()));
		}
	}
	public function showedit_type_product($id){
		$stmt = $this->db->prepare("SELECT * FROM type_product WHERE id = :id");
		$stmt->execute([':id'=>$id]);
		$result = $stmt->fetch();
		return $result;
	}
	public function edit_type_product($name,$image,$id){
		$settings_web = $this->db->prepare("UPDATE `type_product` SET `name` = :name, `image` = :image WHERE id = :id");
		try {
			$settings_web->execute([':name'=>$name,':image'=>$image,':id'=>$id]);
			echo json_encode(array('status'=>"success",'message'=>"แก้ไขข้อมูลสำเร็จ"));
		} catch (Exception $e) {
			echo json_encode(array('status'=>"error",'message'=>$e->getmessage()));
		}
	}
	public function add_card_product($name,$image,$price,$type,$details){
		$add_product = $this->db->prepare("INSERT INTO `card_product` (`name`, `image`, `price`, `details`, `type`) VALUES (:name, :image, :price, :details, :type);");
		try {
			$add_product->execute([':name'=>$name,':image'=>$image,':price'=>$price,':details'=>$details,'type'=>$type]);
			echo json_encode(array('status'=>"success",'message'=>"เพิ่มข้อมูลสำเร็จ"));
		} catch (Exception $e) {
			echo json_encode(array('status'=>"error",'message'=>$e->getmessage()));
		}
	}
	public function showedit_card_product($id){
		$stmt = $this->db->prepare("SELECT * FROM card_product WHERE id = :id");
		$stmt->execute([':id'=>$id]);
		$result = $stmt->fetch();
		return $result;
	}
	public function edit_card_product($name,$image,$price,$id_card,$details){
		$updatecard = $this->db->prepare("UPDATE `card_product` SET `name` = :name, `image` = :image, `price` = :price, `details` = :details WHERE id = :id");
		try {
			$updatecard->execute([':name'=>$name,':image'=>$image,':price'=>$price,':details'=>$details,':id'=>$id_card]);
			echo json_encode(array('status'=>"success",'message'=>"แก้ไขข้อมูลสำเร็จ"));
		} catch (Exception $e) {
			echo json_encode(array('status'=>"error",'message'=>$e->getmessage()));
		}
	}
	public function del_card_product($id){
		$del_card_product = $this->db->prepare("DELETE FROM `card_product` WHERE id = :id");
		$del_card_product->execute([':id'=>$id]);
		echo json_encode(array('status'=>"success",'message'=>'ลบการ์ดสินค้าที่ '.$id.' สำเร็จ'));
	}
	public function product_incard($type){
		$stmt = $this->db->prepare("SELECT * FROM stock WHERE type = :type AND username_buy = '0'");
		$stmt->execute([':type'=>$type]);
		$result = $stmt->fetchAll();
		return $result;
	}


	public function show_web(){
		$stmt = $this->db->prepare("SELECT * FROM web_config WHERE id = 1");
		$stmt->execute();
		$result = $stmt->fetch();
		return $result;
	}
	public function settings_web($title,$logo,$contact,$phone,$key1,$key2,$textannounce,$textmoredetails,$discord){
		$settings_web = $this->db->prepare("UPDATE `web_config` SET `title` = :title, `logo` = :logo, `contact` = :contact, `phone` = :phone, `key1` = :key1, `key2` = :key2, `textannounce` = :textannounce, `textmoredetails` = :textmoredetails, `discord` = :discord WHERE id = 1");
		try {
			$settings_web->execute([':title'=>$title,':logo'=>$logo,'contact'=>$contact,'phone'=>$phone,':key1'=>$key1,':key2'=>$key2,':textannounce'=>$textannounce,':textmoredetails'=>$textmoredetails,':discord'=>$discord]);
			echo json_encode(array('status'=>"success",'message'=>"แก้ไขข้อมูลสำเร็จ"));
		} catch (Exception $e) {
			echo json_encode(array('status'=>"error",'message'=>$e->getmessage()));
		}
	}
	public function totalproduct_stock($type){
		$stmt = $this->db->prepare("SELECT count(id) as total FROM stock WHERE type = :type AND username_buy = '0'");
		$stmt->execute(['type'=>$type]);
		$result = $stmt->fetch();
		return $result;
	}
	public function addstock($item,$id_product){
		$string = preg_replace('~\R~u', "\n", $item);
		$exp_lines = explode("\n", $string);
		if (is_array($exp_lines)) {
			foreach ($exp_lines as $each_line) {
				if (trim($each_line) == '') {
					continue;
				}
				$stmt = $this->db->prepare("INSERT INTO `stock` (`item`, `type`) VALUES (:item, :type);");
				$stmt->execute([':item'=>$each_line,':type'=>$id_product]);
			}
			echo  json_encode(array('status'=>"success",'message'=>"เพิ่มข้อมูลสำเร็จ"));
		}
	}
	public function del_product_incard($id){
		$del_user = $this->db->prepare("DELETE FROM `stock` WHERE id = :id");
		$del_user->execute([':id'=>$id]);
		echo json_encode(array('status'=>"success",'message'=>'ลบสินค้าหมายเลข '.$id.' สำเร็จ'));
	}
}
?>