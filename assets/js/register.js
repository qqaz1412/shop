$(".submit_register").click(function(){
    var username = $("#username").val();
    var password = $("#password").val();
    var confirm = $("#confirm").val();
    var captcha = $("#g-recaptcha-response").val();
    $.ajax({
        type:"POST",
        url:"./data/register.php",
        dataType:"json",
        data:{username,password,confirm,captcha},
        success:function(data){
            if (data.status == "success") {
                Swal.fire({
                    icon: 'success',
                    title: 'สำเร็จ!',
                    text: data.message,
                }).then(function(){
                    window.location.href = '/home';
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