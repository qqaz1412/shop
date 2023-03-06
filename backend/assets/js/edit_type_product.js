$(".submit_edit_type_product").click(function(){
    var edit_name_type_product = $("#edit_name_type_product").val();
    var edit_image_type_product = $("#edit_image_type_product").val();
    var id_type_product = $("#id_type_product").val();
    $.ajax({
        type:"POST",
        url:"./api/v1/edit_type_product.php",
        dataType:"json",
        data:{edit_name_type_product,edit_image_type_product,id_type_product},
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