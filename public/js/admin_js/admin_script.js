
$(document).ready(function() {
    //Check admin password is correct or not
    $("#current-password").keyup(function() {
        var current_password = $(this).val();
        $.ajax({
            type:'post',
            url:'/admin/check-current-password',
            data:{current_password:current_password},
            success:function(resp){
                if(resp =="false") {
                    $("#checkCurrentPassword").html("<font color=red>Current Passowrd is incorrect.</font>");
                } else if(resp =="true") {
                    $("#checkCurrentPassword").html("<font color=green>Current Passowrd is correct.</font>")
                }
            },error:function(){
                // alert("Error");
            }
        });
    });
});