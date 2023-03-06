<?php
$pluem = new classadmin;
$product_incard = $pluem->product_incard($_GET['id']);
?>
<div class="container mt-2">
    <div class="row">
        <div class="col-12">
            <div class="card" style="background-color: #292929;">
                <div class="card-body">
                <button type="button" class="btn btn-success my-2" data-toggle="modal" data-target="#add_product_incard">เพิ่มสินค้า</button>
                <table id="settings_viewweb" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ไอดี</th>
                            <th>สินค้าที่ได้รับ</th>
                            <th>ลบสินค้า</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($product_incard as $row){ ?>
                            <tr>
                                <td>
                                    <?php echo $row['id']; ?>
                                </td>
                                <td>
                                    <?php echo $row['item']; ?>
                                </td>
                                <td>
                                   <button type="button" class="btn btn-danger submit_del_product_incard" id_product_incard="<?php echo $row['id']; ?>">ลบสินค้า</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="add_product_incard">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content"style="background-color: #292929;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">เพิ่มสินค้า</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <div class="user-box">
                <h6 class="ml-auto text-white">สต๊อก<span id="stock"> 0</span> ชิ้น <span style="color: red;">*ห้ามเว้นบรรทัด</span></h6>
                <textarea id="add_item_product_incard" class="form-control" style="height: 300px;background-color: #292929;color:#fff;"></textarea>
            </div>
        </div>
        <button type="button" class="btn btn-success w-100 submit_add_product_incard">เพิ่มสินค้า</button>
    </div>
  </div>
</div>
<input type="hidden" value="<?php echo $_GET['id']; ?>" id="id_add_product_incard">
<script src="assets/js/settings_product_incard.js"></script>