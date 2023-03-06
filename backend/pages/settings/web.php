<?php
$pluem = new classadmin;
$show_web = $pluem->show_web();
?>
<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <div class="card" style="background-color: #292929;">
                <div class="card-body">
                    <div class="user-box">
                        <input id="title_web" value="<?php echo $show_web['title'] ?>" type="text" placeholder="ชื่อเว็บไซต์">
                    </div>

                    <div class="user-box">
                        <input id="logo_web" value="<?php echo $show_web['logo'] ?>" type="text" placeholder="โลโก้เว็บ">
                    </div>
                    <div class="user-box">
                        <input id="contact_web" value="<?php echo $show_web['contact'] ?>" type="text" placeholder="ติดต่อฉัน">
                    </div>
                    <div class="user-box">
                        <input id="phone_web" value="<?php echo $show_web['phone'] ?>" type="text" placeholder="เบอร์รับเงิน(อังเปา)">
                    </div>
                    <div class="user-box">
                        <input id="key1_web" value="<?php echo $show_web['key1'] ?>" type="text" placeholder="Key1(ไคลเอ็นต์)">
                    </div>
                    <div class="user-box">
                        <input id="key2_web" value="<?php echo $show_web['key2'] ?>" type="text" placeholder="Key2(เซิร์ฟเวอร์)">
                    </div>
                    <div class="user-box">
                        <input id="textannounce_web" value="<?php echo $show_web['textannounce'] ?>" type="text" placeholder="ข้อความประกาศ">
                    </div>
                    <div class="user-box">
                        <input id="textmoredetails_web" value="<?php echo $show_web['textmoredetails'] ?>" type="text" placeholder="ข้อความรายละเอียดเพิ่มเติม">
                    </div>
                    <div class="user-box">
                        <input id="discord_web" value="<?php echo $show_web['discord'] ?>" type="text" placeholder="ไอดีDiscord(Discord)">
                    </div>
                    <div class="user-box">
                        <button class="btn btn-success w-100 submit_web">บันทึกข้อมูล</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="assets/js/settings_web.js"></script>