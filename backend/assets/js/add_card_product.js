$(".submit_add_card_product").click(function(){
    var add_name_card_product = $("#add_name_card_product").val();
    var add_image_card_product = $("#add_image_card_product").val();
    var add_price_card_product = $("#add_price_card_product").val();
    var id_card_product_type = $("#id_card_product_type").val();
    var add_details_card_product = $("#add_details_card_product").val();
    $.ajax({
        type:"POST",
        url:"./api/v1/add_card_product.php",
        dataType:"json",
        data:{add_name_card_product,add_image_card_product,add_price_card_product,id_card_product_type,add_details_card_product},
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