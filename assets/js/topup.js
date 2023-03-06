$(document).ready(function() {
    $('#history_bank').DataTable();
  });
function copyToClipboard(e) {
    var tempItem = document.createElement('input');

    tempItem.setAttribute('type','text');
    tempItem.setAttribute('display','none');
    
    let content = e;
    if (e instanceof HTMLElement) {
            content = e.innerHTML;
    }
    
    tempItem.setAttribute('value',content);
    document.body.appendChild(tempItem);
    
    tempItem.select();
    document.execCommand('Copy');

    tempItem.parentElement.removeChild(tempItem);
    Swal.fire({
        icon: 'success',
        title: 'สำเร็จ!',
        text: "คัดลอกชื่อบัญชีเรียบร้อยแล้ว",
    })
}
$(".submit_topup_bank").click(function(){
    var amount = $("#amount_bank").val();
    var name = $("#name_bank").val();
    var date = $("#date_bank").val();
    var time = $("#time_bank").val();
    var type = "topup_bank";
    $.ajax({
        type:"POST",
        url:"./data/topup.php",
        dataType:"json",
        data:{amount,name,date,time,type},
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
$(".submit_topup_gif").click(function(){
    var link_topup = $("#link_topup").val();
    var type = "topup_gif";
    $.ajax({
        type:"POST",
        url:"./data/topup.php",
        dataType:"json",
        data:{link_topup,type},
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
$(".submit_topup_code").click(function(){
    var code = $("#pass_code").val();
    var type = "topup_code";
    $.ajax({
        type:"POST",
        url:"./data/topup.php",
        dataType:"json",
        data:{code,type},
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