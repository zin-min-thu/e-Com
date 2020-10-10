
$(document).ready(function() {
    $('#sort').on('change', function() {
        var sort = $(this).val();
        var url = $('#url').val();

        $.ajax({
            method: "post",
            url:url,
            data:{sort:sort,url:url},
            success:function(data) {
                $('.filter_products').html(data)
            }, error:function() {
                alert("Error");
            }
        })
    })
})