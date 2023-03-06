$(".del_product").click(function(){
    var id_type_product = $(this).attr("id_type_product")
    Swal.fire({
        title: 'คุณแน่ใจหรือไม่!',
        text: "คุณแน่ใจที่ต้องการลบประเภทหมายเลข "+id_type_product,
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
                url:"./api/v1/del_type_product.php",
                dataType:"json",
                data:{id_type_product},
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