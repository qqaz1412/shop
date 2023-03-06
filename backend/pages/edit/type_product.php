<?php
$Patiphan = new classadmin;
$showedit_type_product = $Patiphan->showedit_type_product($_GET['id']);
?>
<div class="container mt-3">
    <div class="col-12">
        <div class="card" style="background-color: #292929;">
            <div class="card-header">
                <h3 class="card-title">แก้ไขประเภทสินค้า</h3>
            </div>
            <div class="card-body">
                <form>
                    <div class="user-box">
                        <input id="edit_name_type_product" value="<?php echo $showedit_type_product['name']; ?>" type="text" placeholder="ชื่อประเภทสินค้า">
                    </div>
                    <div class="user-box">
                        <input id="edit_image_type_product" value="<?php echo $showedit_type_product['image']; ?>" type="text" placeholder="รูปภาพสินค้า">
                    </div>
                    <div class="user-box">
                        <button type="button" class="btn btn-success submit_edit_type_product">แก้ไขประเภทสินค้า</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<input id="id_type_product" type="hidden" value="<?php echo $showedit_type_product['id'] ?>">
<script type="text/javascript" src="assets/js/edit_type_product.js"></script>