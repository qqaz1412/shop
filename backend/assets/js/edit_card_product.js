$(".submit_edit_card_product").click(function(){
    var edit_name_card_product = $("#edit_name_card_product").val();
    var edit_image_card_product = $("#edit_image_card_product").val();
    var edit_price_card_product = $("#edit_price_card_product").val();
    var id_card_product = $("#id_card_product").val();
    var edit_details_card_product = $("#edit_details_card_product").val();
    $.ajax({
        type:"POST",
        url:"./api/v1/edit_card_product.php",
        dataType:"json",
        data:{edit_name_card_product,edit_image_card_product,edit_price_card_product,id_card_product,edit_details_card_product},
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