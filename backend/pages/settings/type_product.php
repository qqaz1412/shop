<?php
$Patiphan = new classadmin;
$type_product = $Patiphan->type_product();
?>
<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <div class="card" style="background-color: #292929;">
                <div class="card-body">
                    <a href="/backend/add_type_product" class="btn btn-success">+เพิ่มประเภทสินค้า</a>
                <div class="row">
                    <?php foreach($type_product as $row){ ?>
                        <div class="col-sm-3 mt-2">
                            <div class="card" style="background-color: #292929;">
                                <div class="card-body">
                                    <div class="text-center mt-2">
                                        <img src="<?php echo $row['image']; ?>" width="40%">
                                        <p class="font-weight-bold mt-2 mb-0 text-white"><?php echo $row['name']; ?></p>
                                        <a href="/backend/settings_card_product?id=<?php echo $row['id'] ?>"><button class="btn btn-success mt-2 w-100 submit_buyproduct">จัดการการ์ดสินค้า</button></a>
                                        <a href="/backend/edit_type_product?id=<?php echo $row['id'] ?>"><button class="btn btn-warning mt-2 w-100">แก้ไขประเภทสินค้า</button></a>
                                        <button class="btn btn-danger mt-2 w-100 del_product" id_type_product="<?php echo $row['id']; ?>">ลบประเภทสินค้า</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="assets/js/del_type_product.js"></script>