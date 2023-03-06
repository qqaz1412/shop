<?php
$Patiphan = new classwebshop;
$history_topup = $Patiphan->history_topup();
?>
<div class="container mt-3">
    <div class="row">
        <div class="col-12 text-center">
            <div class="card">
                <div class="card-body" style="background-color: #292929;">
                    <div class="card bg-danger">
                        <div class="card-body" style="background-color: #292929;">
                            <img src="https://media.discordapp.net/attachments/942998454945341500/957986021537091594/voucher.png" width="85px" class="img-fluid">
                            <br>
                            <span style="color: red;">แบ่งจำนวนเงินให้เท่ากัน และ กรอกคนรับซองเพียง 1 คนเท่านั้น</span>
                            <br>
                            <span style="color: red;">[ หากใส่จำนวนคนรับซองผิดจะไม่สามารถเติมเงินได้ ]</span>
                        </div>
                    </div>
                    <br>
                    <div class="user-box">
                        <input id="link_topup" type="text" placeholder="ลิงค์อังเปา">
                    </div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#howtotopup">วิธีการเติมเงิน</button>
                    <div class="user-box">
                        <a href="#" class="text-center w-100 submit_topup" type="button">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            เติมเงิน
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
          <div class="card mt-2">
              <div class="card-body" style="background-color: #292929;">
                <table id="example" class="table table-striped table-bordered text-center" style="width:100%">
                  <thead>
                    <tr>
                      <th>ลำดับที่</th>
                      <th>จำนวนเงิน</th>
                      <th>วันที่-เวลา</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($history_topup as $row){ ?>
                      <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['amount']; ?> บาท</td>
                        <td><?php echo $row['date']; ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="howtotopup">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark">วิธีการเติมเงิน</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="https://guszone.in.th/images/howtogift.png" width="100%">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">เข้าใจแล้ว</button>
      </div>
    </div>
  </div>
</div>
<script src="../../assets/js/topup.js"></script>
<script>
$(document).ready(function() {
  $('#example').DataTable();
});
</script>