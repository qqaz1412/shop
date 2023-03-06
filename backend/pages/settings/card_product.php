<?php
$Patiphan = new classadmin;
$card_product = $Patiphan->card_product($_GET['id']);
?>
<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <div class="card" style="background-color: #292929;">
                <div class="card-body">
                    <a href="/backend/add_card_product?id=<?php echo $_GET['id']; ?>" class="btn btn-success">+เพิ่มการ์ดสินค้า</a>
                    <div class="row">
                        <?php foreach($card_product as $card){ 
                        $totalproduct_stock = $Patiphan->totalproduct_stock($card['id']);
                        ?>
                        <div class="col-sm-4 mt-2">
                            <div class="card" style="background-color: #292929;">
                            <img src="<?php echo $card['image']; ?>" width="100%">
                                <div class="card-body">
                                    <div class="mt-2">
                                        <h5 class="font-weight-bold mt-2 mb-0 text-white"><?php echo $card['name']; ?></h5>
                                        <h6 class="font-weight-bold mt-2 mb-0 text-white">ราคา <?php echo $card['price']; ?></h6>
                                        <h6 class="font-weight-bold mt-2 mb-0 text-white">คงเหลือ <?php echo $totalproduct_stock['total'] ?> ชิ้น</h6>
                                        <div class="row">
                                            <div class="col-sm-12">
                                            <a href="/backend/settings_product_incard?id=<?php echo $card['id'] ?>"><button class="btn btn-success mt-2 w-100 submit_buyproduct">จัดการสินค้า</button></a>
                                            <a href="/backend/edit_card_product?id=<?php echo $card['id'] ?>"><button class="btn btn-warning mt-2 w-100">แก้ไขการ์ดสินค้า</button></a>
                                            <button class="btn btn-danger mt-2 w-100 del_product" id_card_product="<?php echo $card['id']; ?>" name_card_product="<?php echo $card['name']; ?>">ลบการ์ดสินค้า</button>
                                            </div>
                                        </div>
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
<script src="assets/js/del_card_product.js"></script>