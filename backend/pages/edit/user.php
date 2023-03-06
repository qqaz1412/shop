<?php
$pluem = new classadmin;
$showedit_user = $pluem->showedit_user($_GET['id']);
?>
<div class="container mt-3">
    <div class="col-12">
        <div class="card" style="background-color: #292929;">
            <div class="card-header">
                <h3 class="card-title">แก้ไขสมาชิก</h3>
            </div>
            <div class="card-body">
                <form>
                    <div class="user-box">
                        <input id="edit_user_user" value="<?php echo $showedit_user['username'] ?>" type="text" placeholder="ชื่อผู้ใช้">
                    </div>
                    <div class="user-box">
                        <input id="edit_pass_user" value="<?php echo $showedit_user['password'] ?>" type="text" placeholder="รหัสผ่าน">
                    </div>
                    <div class="user-box">
                        <input id="edit_point_user" value="<?php echo $showedit_user['point'] ?>" type="text" placeholder="เครดิต">
                    </div>
                    <div class="user-box">
                        <button type="button" class="btn btn-success submit_edit_user">แก้ไขสมาชิก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<input type="hidden" value="<?php echo $showedit_user['id']; ?>" id="id_edit_user">
<script type="text/javascript" src="assets/js/edit_user.js"></script>