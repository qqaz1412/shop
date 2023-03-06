$(".submit_changepassword").click(function(){
    var oldpassword = $("#oldpassword").val();
    var newpassword = $("#newpassword").val();
    var confirmnewpassword = $("#confirmnewpassword").val();
    $.ajax({
        type:"POST",
        url:"./data/changepassword.php",
        dataType:"json",
        data:{oldpassword,newpassword,confirmnewpassword},
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