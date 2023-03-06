<?php
$pluem = new classadmin;
$totaluser = $pluem->totaluser();
$totaltopup = $pluem->totaltopup();
$totalproduct = $pluem->totalproduct();
$totalproduct_ = $pluem->totalproduct_();
$show_history_bank_all = $pluem->show_history_bank_all();
?>
<div class="container mt-3">
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h4><?php echo $totaluser['total']; ?> คน</h4>
                    <p>ผู้ใช้ทั้งหมด</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h4>
                        <?php if(empty($totaltopup['total'])){
                            echo "0.00";
                        }else{
                            echo $totaltopup['total'];
                        }
                        ?> บาท
                    </h4>
                    <p>ยอดเติมเงินทั้งหมด</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
            </div>
        </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h4><?php echo $totalproduct['total']; ?> ชิ้น</h4>
                <p>สินค้าคงเหลือทั้งหมด</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
        </div>
    </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h4><?php echo $totalproduct_['total']; ?> ชิ้น</h4>
                    <p>สินค้าที่ขายไปทั้งหมด</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card" style="background-color: #292929;">
                <div class="card-body">
                <h6 class="text-center">ประวัติการเติมเงิน (ธนาคาร)</h6>
                    <table id="settings_viewweb" class="table table-striped table-bordered text-center" style="width:100%">
                        <thead>
                            <tr>
                                <th>ลำดับที่</th>
                                <th>ชื่อผู้ใช้</th>
                                <th>จำนวนเงิน</th>
                                <th>ชื่อบัญชี</th>
                                <th>วันที่-เวลา</th>
                                <th>สถานะ</th>
                                <th>สำเร็จ</th>
                                <th>ไม่สำเร็จ</th>
                                <th>ลบ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($show_history_bank_all as $row){ ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['amount']; ?> บาท</td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['date']." ".$row['time'] ?> น.</td>
                                    <td><?php if($row['status'] == "0"){ echo "กำลังทำรายการ"; }elseif($row['status'] == "1"){ echo "<b class='text-success'>ทำรายการสำเร็จ</b>"; }elseif($row['status'] == "2"){ echo "<b class='text-danger'>ไม่พบรายการนี้</b>"; } ?></td>
                                    <td><button class="btn btn-success submit_success_bank" idbank="<?php echo $row['id']; ?>">สำเร็จ</button></td>
                                    <td><button class="btn btn-warning submit_not_success_bank" idbank="<?php echo $row['id']; ?>">ไม่สำเร็จ</button></td>
                                    <td><button class="btn btn-danger del_bank_history" idbank="<?php echo $row['id']; ?>">ลบคิว</button></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="assets/js/settings_bank.js"></script>