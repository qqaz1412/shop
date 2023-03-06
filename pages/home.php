<?php
$Patiphan = new classwebshop;
$web_config = $Patiphan->web_config();
?>
<center>
    <div class="col-9 mt-4">
        <div
        style="
        display: flex;
        place-items: center;
        column-gap: 1rem;
        background-color: rgba(0, 0, 0, 0.2);
        padding: 10px 30px;
        border-radius: 20px;
        height: 50px;
        margin-bottom: 25px;
        font-size: 16px;
        "
        >
        <a style="padding: 0px; margin: 0px; display: flex;">
            <i class="fas fa-bullhorn mr-2"></i>ประกาศ
        </a>
        <marquee><?php echo $web_config['textannounce']; ?></marquee>
        </div>
    </div>
</center>
</div>
<div class="container mt-4">
   <!--- <div class="row">
        <img src="https://sv1.picz.in.th/images/2022/11/20/Gh4N1n.png" class="img-thumbnail">
    </div> --->
</div>
<div class="container mt-4">
    <div class="row">
        <div class="col-sm-3 mt-2">
            <div class="card" style="background-color: #292929;">
                <div class="card-body">
                    <div class="text-center aos-init aos-animate">
                        <i class="fas fa-shield-alt fa-4x circle-bg"></i>
                        <p class="font-weight-bold mt-2 mb-0 text-white">ความปลอดภัย</p>
                        <p class="font-weight-light text-muted">รับประกันความปลอดภัย 100%</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3 mt-2">
            <div class="card" style="background-color: #292929;">
                <div class="card-body">
                    <div class="text-center aos-init aos-animate">
                        <i class="fas fa-money-check-alt fa-4x circle-bg"></i>
                        <p class="font-weight-bold mt-2 mb-0 text-white">ระบบเติมเงินอัตโนมัติ</p>
                        <p class="font-weight-light text-muted">วิธีการชำระเงินที่ทันสมัยเเละรวดเร็ว</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3 mt-2">
            <div class="card" style="background-color: #292929;">
                <div class="card-body">
                    <div class="text-center aos-init aos-animate">
                        <i class="fas fa-rocket fa-4x circle-bg"></i>
                        <p class="font-weight-bold mt-2 mb-0 text-white">จัดส่งที่เร็วที่สุด</p>
                        <p class="font-weight-light text-muted">บัญชีที่คุณซื้อจะถูกจัดส่งโดยทันที</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3 mt-2">
            <div class="card" style="background-color: #292929;">
                <div class="card-body">
                    <div class="text-center aos-init aos-animate">
                        <i class="fas fa-clock fa-4x circle-bg"></i>
                        <p class="font-weight-bold mt-2 mb-0 text-white">สนับสนุน</p>
                        <p class="font-weight-light text-muted">เว็บไชต์เปิดให้บริการตลอด 24 ชั่วโมง เวลาทำการแอดมิน 08:30-17:00น.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>