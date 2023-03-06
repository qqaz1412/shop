<?php
$Patiphan = new classwebshop;
$web_config = $Patiphan->web_config();
?>
<div class="container mt-5">
    <div class="row justify-content-center mt-4 mb-4">
        <div class="col-md-8">
            <div class="card card-border">
                <div class="card-body card-border" style="background-color: #292929;">
                    <h5>เข้าสู่ระบบ</h5>
                    <div id="status-login"></div>
                    <p></p>
                    <hr>
                    <form>
                        <div class="user-box">
                            <input id="username" type="text"placeholder="ชื่อบัญชีผู้ใช้งาน">
                        </div>
                        <div class="user-box">
                            <input id="password" type="password" placeholder="รหัสผ่าน">
                        </div>
                        <center>
                            <div class="user-box">
                                <div class="g-recaptcha" data-sitekey="<?php echo $web_config['key1']; ?>"></div>
                            </div>
                        </center>
                        <div class="user-box">
                            <a href="#" class="text-center w-100 submit_login" type="button">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                                เข้าสู่ระบบ
                            </a>
                        </div>
                        <p></p>
                        <a href="/register">สมัครสมาชิก</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="../../assets/js/login.js"></script>