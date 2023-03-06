$(".submit_login").click(function(){
    var username = $("#username").val();
    var password = $("#password").val();
    var captcha = $("#g-recaptcha-response").val();
    $.ajax({
        type:"POST",
        url:"./data/login.php",
        dataType:"json",
        data:{username,password,captcha},
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