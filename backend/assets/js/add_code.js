$("#submit_add_code").click(function(){
    var add_point_code = $("#add_point_code").val();
    var add_amount_code = $("#add_amount_code").val();
    var add_code_code = $("#add_code_code").val();
    $.ajax({
        type:"POST",
        url:"./api/v1/add_code.php",
        dataType:"json",
        data:{add_point_code,add_amount_code,add_code_code},
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