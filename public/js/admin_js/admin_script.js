
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
    $(document).on("click",".updateSectionStatus", function() {
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
    $(document).on("click",".confirmDelete", function() {
        var record = $(this).attr("record");
        var recordId = $(this).attr("recordId");
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
          }).then((result) => {
            if (result.value) {
              window.location.href="/admin/delete-"+record+"/"+recordId;
            }
          });
    });

    //Update Sttribute status
    $(document).on("click",".updateStatusAttribute", function() {
        var status = $(this).text();
        var attribute_id = $(this).attr('attribute_id');
        $.ajax({
            type:'post',
            url:'/admin/update-status-attribute',
            data:{status:status,attribute_id:attribute_id},
            success:function(resp) {
                if(resp['status'] == 0) {
                    $("#attribute-"+attribute_id).html('<span style="color:red; font-weight:bold;" >Inactive</span>')
                } else if(resp['status'] == 1) {
                    $("#attribute-"+attribute_id).html('<span style="color:green; font-weight:bold;">Active</span>');
                }
            }, error:function() {
                alert("Error");
            }
        })
    });

    $(document).on("click",".updateStatusProductImage", function() {
        var status = $(this).text();
        var image_id = $(this).attr('productImageId');
        $.ajax({
            type:'post',
            url:'/admin/update-status-product-image',
            data:{status:status, image_id:image_id},
            success:function(resp) {
                if(resp['status'] == 0) {
                    $("#product-image-"+image_id).html('<span style="color:red; font-weight:bold;">Inactive</span>');
                } else if(resp['status'] == 1) {
                    $("#product-image-"+image_id).html('<span style="color:green; font-weight:bold;">Active</span>')
                }
            }, error:function() {
                alert("Error");
            }
        })
    });

    //Update Brand Status
    $(document).on("click",".updateStatusBrand", function() {
        var status = $(this).children("i").attr('status');
        var brand_id = $(this).attr('brand_id');
        $.ajax({
            type:'post',
            url:'/admin/update-status-brand',
            data:{status:status,brand_id:brand_id},
            success:function(resp) {
                if(resp['status'] == 0) {
                    $("#brand-"+brand_id).html('<i class="fa fa-toggle-off fa-lg text-red" status="Inactive"></i>')
                } else if(resp['status'] == 1) {
                    $("#brand-"+brand_id).html('<i class="fa fa-toggle-on fa-lg" status="Active"></i>');
                }
            }, error:function() {
                alert("Error");
            }
        })
    });

    //Update Bunner Status
    $(document).on("click",".updateStatusBunner", function() {
        var status = $(this).children("i").attr('status');
        var bunner_id = $(this).attr('bunner_id');
        $.ajax({
            type:'post',
            url:'/admin/update-status-bunner',
            data:{status:status,bunner_id:bunner_id},
            success:function(resp) {
                if(resp['status'] == 0) {
                    $("#bunner-"+bunner_id).html('<i class="fa fa-toggle-off fa-lg text-red" status="Inactive"></i>')
                } else if(resp['status'] == 1) {
                    $("#bunner-"+bunner_id).html('<i class="fa fa-toggle-on fa-lg" status="Active"></i>');
                }
            }, error:function() {
                alert("Error");
            }
        })
    });

});