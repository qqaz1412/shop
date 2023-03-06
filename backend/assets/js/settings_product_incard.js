$(document).ready(function(){
    var items = $('#stock');
    $('#add_item_product_incard').keydown(function(e) {
        newLines = $(this).val().split("\n").length;
        items.text(newLines);
    });
});
$(".submit_del_product_incard").click(function(){
    var id_product_incard = $(this).attr("id_product_incard")
    Swal.fire({
        title: 'คุณแน่ใจหรือไม่!',
        text: "คุณแน่ใจที่ต้องการลบสินค้าที่ "+id_product_incard,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ใช่',
        cancelButtonText: 'ไม่'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type:"POST",
                url:"./api/v1/del_product_incard.php",
                dataType:"json",
                data:{id_product_incard},
                success:function(data){
                    if (data.status == "success") {
                        Swal.fire({
                            icon: 'success',
                            title: 'สำเร็จ!',
                            text: data.message,
                        }).then(function(){
                            window.location.reload();
                        })
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'เกิดข้อผิดพลาด!',
                            text: data.message,
                        })
                    }
                }
            })
        }
      })
})
$(".submit_add_product_incard").click(function(){
    var add_item_product_incard = $("#add_item_product_incard").val();
    var id_add_product_incard = $("#id_add_product_incard").val();
    $.ajax({
        type:"POST",
        url:"./api/v1/add_product_incard.php",
        dataType:"json",
        data:{add_item_product_incard,id_add_product_incard},
        success:function(data){
            if (data.status == "success") {
                Swal.fire({
                    icon: 'success',
                    title: 'สำเร็จ!',
                    text: data.message,
                }).then(function(){
                    window.location.reload();
                })
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'เกิดข้อผิดพลาด!',
                    text: data.message,
                })
            }
        }
    })
})