<?php
$pluem = new classadmin;
$show_code = $pluem->show_code();
?>
<div class="container mt-3">
    <div class="col-12">
        <div class="card" style="background-color: #292929;">
            <div class="card-header">
                <h3 class="card-title">จัดการโค๊ด</h3>
            </div>
            <div class="card-body">
                <button class="btn btn-success my-2" data-toggle="modal" data-target="#add_code">เพิ่มโค๊ด</button>
                <table id="settings_viewweb" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ไอดี</th>
                            <th>โค๊ด</th>
                            <th>จำนวนเงินที่ได้รับ</th>
                            <th>คงเหลือ</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($show_code as $row){ ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['code']; ?></td>
                            <td><?php echo $row['point']; ?></td>
                            <td><?php echo $row['amount']; ?> ครั้ง</td>
                            <td><button class="btn btn-danger del_code" idcode="<?php echo $row['id']; ?>" namecode="<?php echo $row['code']; ?>">ลบ</button></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="add_code">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background-color: #292929;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">เพิ่มโค๊ด</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <div class="user-box">
                <input id="add_point_code" type="number" placeholder="จำนวนเงินที่ได้รับ">
            </div>
        </div>
        <div class="form-group">
            <div class="user-box">
                <input id="add_amount_code" type="number" placeholder="จำนวนที่ใช้ได้ ครั้ง">
            </div>
        </div>
        <div class="form-group">
            <div class="user-box">
                <input id="add_code_code" type="text" placeholder="โค๊ด">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
        <button type="button" class="btn btn-success" id="submit_add_code">เพิ่มข้อมูล</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="assets/js/del_code.js"></script>
<script type="text/javascript" src="assets/js/add_code.js"></script>