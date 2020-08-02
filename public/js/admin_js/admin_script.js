
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
                alert("Error");
            }
        });
    });

    //Update Section Status
    $(".updateSectionStatus").click(function() {
        var status = $(this).text();
        var section_id = $(this).attr('section_id');
        $.ajax({
            type:'post',
            url:'/admin/update-section-status',
            data:{status:status,section_id:section_id},
            success:function(resp) {
                if(resp['status'] == 0) {
                    $("#section-"+section_id).html("<a class='updateSectionStatus' href='javascript:void(0)'>Inactive</a>");
                } else if(resp['status'] == 1) {
                    $("#section-"+section_id).html("<a class='updateSectionStatus' href='javascript:void(0)'>Active</a>");
                }
            }, error:function() {
                alert("Error");
            }
        })
    });
});