<?php
$pluem = new classwebshop;
$history_bank = $pluem->history_bank();
?>
<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <div class="card" style="background-color: #292929;">
                <div class="card-body">
                    <h5>ระบบเติมเงินอัตโนมัติ</h5>
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" data-toggle="tab" href="#topup_bank">เติมธนาคาร</a>
                            <a class="nav-item nav-link" data-toggle="tab" href="#topup_giftvoucher">เติมอั่งเปา</a>
                            <a class="nav-item nav-link" data-toggle="tab" href="#topup_code">เติมโค้ด</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="topup_bank">
                            <div class="col-12 text-center mt-3">
                                <div style="border-bottom: 5px solid rgb(36, 88, 242);">
                                    <h2>Internet Banking</h2>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 mt-3">
                                        <div class="card">
                                            <div class="card-body" style="background-color: #292929;">
                                                    <img src="https://media.discordapp.net/attachments/930143981021589574/950044450078466078/5.png" width="70px" class="img-fluid">
                                                <div class="mt-2">
                                                    <h6><button class="btn " onclick="copyToClipboard('0000997625')">0000997625 ( คัดลอก )</button></h6>
                                                    <h5>ชื่อบัญชี -> นายภานุพงษ์ ชาบาง <- </h5>
                                                    <h6>เงินจะเข้าภายใน 5 นาที หากทำรายการเรียบร้อยแล้ว กรุณารอซักครู่นะคะ หากยอดเงินไม่เข้าภายใน5นาทีลูกค้าสามารถทักเข้ามาที่เพจได้เลยค่ะ</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <div class="user-box">
                                            <input id="amount_bank" type="number" placeholder="จำนวนเงิน">
                                        </div>
                                        <div class="user-box">
                                            <input id="name_bank" type="text" placeholder="ชื่อบัญชี">
                                        </div>
                                        <div class="user-box">
                                            <input id="date_bank" type="date">
                                        </div>
                                        <div class="user-box">
                                            <input id="time_bank" type="time">
                                        </div>
                                        <div class="user-box">
                                            <button class="btn btn-success w-100 submit_topup_bank">ทำรายการ</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body" style="background-color: #292929;">
                                        <table id="history_bank" class="table table-striped table-bordered text-center" style="width:100%">
                                            <thead>
                                                <tr>
                                                <th>ลำดับที่</th>
                                                <th>ชื่อผู้ใช้</th>
                                                <th>จำนวนเงิน</th>
                                                <th>ชื่อบัญชี</th>
                                                <th>วันที่-เวลา</th>
                                                <th>สถานะ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($history_bank as $row){ ?>
                                                <tr>
                                                    <td><?php echo $row['id']; ?></td>
                                                    <td><?php echo $row['username']; ?></td>
                                                    <td><?php echo $row['amount']; ?> บาท</td>
                                                    <td><?php echo $row['name']; ?></td>
                                                    <td><?php echo $row['date']." ".$row['time'] ?> น.</td>
                                                    <td><?php if($row['status'] == "0"){ echo "กำลังทำรายการ"; }elseif($row['status'] == "1"){ echo "<b class='text-success'>ทำรายการสำเร็จ</b>"; }elseif($row['status'] == "2"){ echo "<b class='text-danger'>ไม่พบรายการนี้</b>"; } ?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="topup_giftvoucher">
                            <div class="col-12 text-center mt-3">
                                <div style="border-bottom: 5px solid rgb(255, 78, 69);">
                                <h2>Gift Voucher</h2>
                            </div>
                                <div class="row">
                                    <div class="col-sm-12 mt-3">
                                        <div class="card">
                                            <div class="card-body" style="background-color: #292929;">
                                                    <img src="https://cdn.discordapp.com/attachments/900746415238697001/973131814833127444/tw.png" width="70px" class="img-fluid">
                                                <div class="mt-2">
                                                    <h6>แบ่งจำนวนเงินให้เท่ากัน และ กรอกคนรับซองเพียง 1 คนเท่านั้น</h6>
                                                    <h6>[ หากใส่จำนวนคนรับซองผิดจะไม่สามารถเติมเงินได้ ]</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <div class="user-box">
                                            <input id="link_topup" type="text" placeholder="ลิงค์อังเปา">
                                        </div>
                                        <div class="user-box">
                                            <button class="btn btn-success w-100 submit_topup_gif">ทำรายการ</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="topup_code">
                            <div class="col-12 text-center mt-3">
                                <div style="border-bottom: 5px solid rgb(188, 188, 188);">
                                <h2>Gift Code</h2>
                            </div>
                                <div class="row">
                                    <div class="col-sm-12 mt-3">
                                        <div class="card">
                                            <div class="card-body" style="background-color: #292929;">
                                                    <img src="https://media.discordapp.net/attachments/887300703314387035/1011556554899738644/giftcode.png" width="70px" class="img-fluid">
                                                <div class="mt-2">
                                                    <h6>สามารถรับCodeๆฟรีได้ที่กิจกรรม</h6>
                                                    <h6>1 Code สามารถใช้ได้1ครั้ง</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <div class="user-box">
                                            <input id="pass_code" type="text" placeholder="รหัสโค๊ด">
                                        </div>
                                        <div class="user-box">
                                            <button class="btn btn-success w-100 submit_topup_code">ทำรายการ</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../../assets/js/topup.js"></script>