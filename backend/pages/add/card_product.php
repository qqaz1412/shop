<div class="container mt-3">
    <div class="col-12">
        <div class="card" style="background-color: #292929;">
            <div class="card-header">
                <h3 class="card-title">เพิ่มการ์ดสินค้า</h3>
            </div>
            <div class="card-body">
                <form>
                    <div class="user-box">
                        <input id="add_name_card_product" type="text" placeholder="ชื่อการ์ดสินค้า">
                    </div>
                    <div class="user-box">
                        <input id="add_image_card_product" type="text" placeholder="รูปภาพสินค้า">
                    </div>
                    <div class="user-box">
                        <input id="add_price_card_product" type="number" placeholder="ราคาสินค้า">
                    </div>
                    <div class="user-box">
                        <input id="add_details_card_product" type="text" placeholder="รายละเอียดการ์ด">
                    </div>
                    <div class="user-box">
                        <button type="button" class="btn btn-success submit_add_card_product">เพิ่มการ์ดสินค้า</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<input type="hidden" value="<?php echo $_GET['id'] ?>" id="id_card_product_type">
<script type="text/javascript" src="assets/js/add_card_product.js"></script>