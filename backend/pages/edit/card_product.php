<?php
$pluem = new classadmin;
$showedit_card_product = $pluem->showedit_card_product($_GET['id']);
?>
<div class="container mt-3">
    <div class="col-12">
        <div class="card" style="background-color: #292929;">
            <div class="card-header">
                <h3 class="card-title">แก้ไขการ์ดสินค้า</h3>
            </div>
            <div class="card-body">
                <form>
                    <div class="user-box">
                        <input id="edit_name_card_product" value="<?php echo $showedit_card_product['name'] ?>" type="text" placeholder="ชื่อการ์ดสินค้า">
                    </div>
                    <div class="user-box">
                        <input id="edit_image_card_product" value="<?php echo $showedit_card_product['image'] ?>" type="text" placeholder="รูปภาพสินค้า">
                    </div>
                    <div class="user-box">
                        <input id="edit_price_card_product" value="<?php echo $showedit_card_product['price'] ?>" type="number" placeholder="ราคาสินค้า">
                    </div>
                    <div class="user-box">
                        <input id="edit_details_card_product" value="<?php echo $showedit_card_product['details'] ?>" type="text" placeholder="รายละเอียดสินค้า">
                    </div>
                    <div class="user-box">
                        <button type="button" class="btn btn-success submit_edit_card_product">แก้ไขการ์ดสินค้า</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<input type="hidden" value="<?php echo $_GET['id'] ?>" id="id_card_product">
<script type="text/javascript" src="assets/js/edit_card_product.js"></script>