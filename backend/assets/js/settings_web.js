$(".submit_web").click(function(){
    var title_web = $("#title_web").val();
    var logo_web = $("#logo_web").val();
    var contact_web = $("#contact_web").val();
    var phone_web = $("#phone_web").val();

    var key1_web = $("#key1_web").val();
    var key2_web = $("#key2_web").val();
    var textannounce_web = $("#textannounce_web").val();
    var textmoredetails_web = $("#textmoredetails_web").val();
    var discord_web = $("#discord_web").val();
    $.ajax({
        type:"POST",
        url:"./api/v1/settings_web.php",
        dataType:"json",
        data:{title_web,logo_web,contact_web,phone_web,key1_web,key2_web,textannounce_web,textmoredetails_web,discord_web},
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