<?php
$Patiphan = new classwebshop;
$resultuser = $Patiphan->resultuser();
$web_config = $Patiphan->web_config();
?>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #363636;">
    <a class="navbar-brand" href="/home"><img src="<?php echo $web_config['logo'] ?>" width="60"> เสือป่า SHOP</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <?php if (empty($_SESSION['id'])){ ?>
        <?php }else{ ?>
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="/home"><i class="fas fa-home"></i> หน้าหลัก</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/shop"><i class="fas fa-shopping-cart"></i> ร้านค้า</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/topup"><i class="fas fa-money-check"></i> เติมเงิน</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/history_shop"><i class="fas fa-history"></i> ประวัติการซื้อสินค้า</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo $web_config['contact'] ?>"><i class="fab fa-discord"></i> Line</a>
            </li>
        </ul>
        <?php }?>
        <?php if(empty($_SESSION['id'])){ ?>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/login"><i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/register"><i class="fas fa-user-plus fa-fw"></i> สมัครสมาชิก</a>
            </li>
        </ul>
        <?php }else{?>
            <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/giftvoucher"><i class="fas fa-wallet"></i> <?php echo $resultuser['point']; ?> ฿</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/changepassword"><i class="fas fa-user"></i> เปลี่ยนรหัสผ่าน</a>
            </li>
            <li class="nav-item active">
                <a href="#" class="nav-link logout"><i class="fas fa-sign-out-alt"></i> ออกจากระบบ</a>
            </li>
        </ul>
        <?php } ?>
    </div>
</nav>
<script type="text/javascript" src="../assets/js/navbar.js"></script>