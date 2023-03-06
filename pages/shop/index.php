<?php
$Patiphan = new classwebshop;
$type_product = $Patiphan->type_product();
$idtype_product = $_GET['id'];
$showcard = $Patiphan->showcard($idtype_product);
$showname_product = $Patiphan->showname_product($idtype_product);
?>
<?php if(empty($idtype_product)){ ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">สินค้าทั้งหมด</h1>
            <div class="row">
                <?php foreach($type_product as $row){ ?>
                    <div class="col-sm-3 mt-2">
                        <div class="card" style="background-color: #292929;">
                            <div class="card-body">
                                <div class="text-center mt-2">
                                    <img src="<?php echo $row['image']; ?>" width="40%">
                                    <p class="font-weight-bold mt-2 mb-0 text-white"><?php echo $row['name']; ?></p>
                                    <a class="btn btn-success mt-2" href="/shop?id=<?php echo $row['id']; ?>">ดูรายการ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>
    </div>
</div>
<?php }else{ ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="text-center">
                <img width="80" height="80" src="<?php echo $showname_product['image']; ?>">
                <h3><?php echo $showname_product['name']; ?></h1>
                <h5>กรุณากดอ่านรายละเอียดก่อนสั่งซื้อสินค้า</h5>
            </div>
            <div class="row">
                <?php foreach($showcard as $card){ 
                $totalproduct = $Patiphan->totalproduct($card['id']);
                ?>
                    <div class="col-sm-4 mt-2">
                        <div class="card" style="background-color: #292929;">
                        <img src="<?php echo $card['image']; ?>" width="100%">
                            <div class="card-body">
                                <div class="mt-2">
                                    <h5 class=""><?php echo $card['name']; ?></h5>
                                    <h6 class="">ราคา : <span style="color: yellow;"><?php echo $card['price']; ?></span> บาท</h6>
                                    <h6 class="">คงเหลือ : <?php echo $totalproduct['total']; ?> ชิ้น</h6>
                                    <h6 class="">รายละเอียดสินค้า : <br><span style="color:#E71C1C;"><?php echo $card['details']; ?></span></h6>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success mt-2 w-100 submit_buyproduct" id_product="<?php echo $card['id']; ?>" name_product="<?php echo $card['name']; ?>">ซื้อสินค้า</button>
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
<?php } ?>
<script src="../../assets/js/buyproduct.js"></script>