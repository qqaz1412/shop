$(".submit_add_type_product").click(function(){
    var add_name_type_product = $("#add_name_type_product").val();
    var add_image_type_product = $("#add_image_type_product").val();
    $.ajax({
        type:"POST",
        url:"./api/v1/add_type_product.php",
        dataType:"json",
        data:{add_name_type_product,add_image_type_product},
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