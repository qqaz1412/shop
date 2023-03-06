<?php
$Patiphan = new classwebshop;
$history_buyproduct = $Patiphan->history_buyproduct();
?>
<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="background-color: #292929;">
                    <table id="example" class="table table-striped table-bordered text-center" style="width:100%">
                        <thead>
                            <tr>
                                <th>ไอดีสินค้า</th>
                                <th>ชื่อสินค้า</th>
                                <th>สินค้าที่ได้รับ</th>
                                <th>ราคา</th>
                                <th>วันที่-เวลา</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($history_buyproduct as $row){ ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['item']; ?></td>
                                    <td><?php echo $row['price']; ?> บาท</td>
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
<script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>