
$(document).ready(function() {

    $('#sort').on('change', function() {
        var sort = $(this).val();
        var url = $('#url').val();
        var fabric = get_filter("fabric");

        $.ajax({
            method: "post",
            url:url,
            data:{sort:sort,url:url,fabric:fabric},
            success:function(data) {
                $('.filter_products').html(data)
            }, error:function() {
                alert("Error");
            }
        })
    })

    $('.fabric').on('click', function() {
        var fabric = get_filter(this)
        var url = $('#url').val();
        var sort = $('#sort').val();
        console.log(fabric)

        $.ajax({
            method: "post",
            url:url,
            data:{sort:sort,url:url,fabric:fabric},
            success:function(data) {
                $('.filter_products').html(data)
            }, error:function() {
                alert("Error");
            }
        })
    });

    function get_filter(class_name) {
        var fabric = [];
        $('.'+class_name+':checked').each(function() {
            fabric.push($(this).val())
        })

        return fabric;
    }
})