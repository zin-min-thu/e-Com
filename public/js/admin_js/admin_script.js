
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

    //Append Category level
    $("#section-id").change(function() {
        var section_id = $(this).val();
        $.ajax({
            type:'post',
            url:'/admin/append-category-level',
            data:{section_id:section_id},
            success:function(resp) {
                $("#appendCagegoryLevel").html(resp);
            }, error:function() {
                alert("Error");
            }
        })
    });

    //Confirm Delete
    $(".confirmDelete").click(function() {
        var record = $(this).attr("record");
        var recordId = $(this).attr("recordId");
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.value) {
              window.location.href="/admin/delete-"+record+"/"+recordId;
            }
          });
    });
});