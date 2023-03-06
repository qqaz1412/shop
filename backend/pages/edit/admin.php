<?php
$pluem = new classadmin;
$showedit_admin = $pluem->showedit_admin($_GET['id']);
?>
<div class="container mt-3">
    <div class="col-12">
        <div class="card" style="background-color: #292929;">
            <div class="card-header">
                <h3 class="card-title">แก้ไขผู้ดูแลระบบ</h3>
            </div>
            <div class="card-body">
                <form>
                    <div class="user-box">
                        <input id="edit_user_admin" value="<?php echo $showedit_admin['username'] ?>" type="text" placeholder="ชื่อผู้ใช้">
                    </div>
                    <div class="user-box">
                        <input id="edit_pass_admin" value="<?php echo $showedit_admin['password'] ?>" type="text" placeholder="รหัสผ่าน">
                    </div>
                    <div class="user-box">
                        <button type="button" class="btn btn-success submit_edit_admin">แก้ไขผู้ดูแลระบบ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<input type="hidden" value="<?php echo $showedit_admin['id']; ?>" id="id_edit_admin">
<script type="text/javascript" src="assets/js/edit_admin.js"></script>