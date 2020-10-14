
$(document).ready(function() {

    $('#sort').on('change', function() {
        var sort = $(this).val();
        var url = $('#url').val();
        var fabric = get_filter("fabric");
        var sleeve = get_filter("sleeve");
        var pattern = get_filter("pattern");
        var fit = get_filter("fit");
        var occasion = get_filter("occasion");

        $.ajax({
            method: "post",
            url:url,
            data:{sort:sort,url:url,fabric:fabric,sleeve:sleeve,pattern:pattern,fit:fit,occasion:occasion},
            success:function(data) {
                $('.filter_products').html(data)
            }, error:function() {
                alert("Error");
            }
        })
    })

    $('.fabric').on('click', function() {
        var fabric = get_filter(this)
        var sleeve = get_filter("sleeve");
        var pattern = get_filter("pattern");
        var fit = get_filter("fit");
        var occasion = get_filter("occasion");
        var url = $('#url').val();
        var sort = $('#sort').val();

        $.ajax({
            method: "post",
            url:url,
            data:{sort:sort,url:url,fabric:fabric,sleeve:sleeve,pattern:pattern,fit:fit,occasion:occasion},
            success:function(data) {
                $('.filter_products').html(data)
            }, error:function() {
                alert("Error");
            }
        })
    });

    $('.sleeve').on('click', function() {
        var fabric = get_filter("fabric");
        var sleeve = get_filter("sleeve");
        var pattern = get_filter("pattern");
        var fit = get_filter("fit");
        var occasion = get_filter("occasion");
        var url = $('#url').val();
        var sort = $('#sort').val();

        $.ajax({
            method: "post",
            url:url,
            data:{sort:sort,url:url,fabric:fabric,sleeve:sleeve,pattern:pattern,fit:fit,occasion:occasion},
            success:function(data) {
                $('.filter_products').html(data)
            }, error:function() {
                alert("Error");
            }
        })
    });

    $('.pattern').on('click', function() {
        var fabric = get_filter("fabric");
        var sleeve = get_filter("sleeve");
        var pattern = get_filter("pattern");
        var fit = get_filter("fit");
        var occasion = get_filter("occasion");
        var url = $('#url').val();
        var sort = $('#sort').val();

        $.ajax({
            method: "post",
            url:url,
            data:{sort:sort,url:url,fabric:fabric,sleeve:sleeve,pattern:pattern,fit:fit,occasion:occasion},
            success:function(data) {
                $('.filter_products').html(data)
            }, error:function() {
                alert("Error");
            }
        })
    });

    $('.fit').on('click', function() {
        var fabric = get_filter("fabric");
        var sleeve = get_filter("sleeve");
        var pattern = get_filter("pattern");
        var fit = get_filter("fit");
        var occasion = get_filter("occasion");
        var url = $('#url').val();
        var sort = $('#sort').val();

        $.ajax({
            method: "post",
            url:url,
            data:{sort:sort,url:url,fabric:fabric,sleeve:sleeve,pattern:pattern,fit:fit,occasion:occasion},
            success:function(data) {
                $('.filter_products').html(data)
            }, error:function() {
                alert("Error");
            }
        })
    });

    $('.occasion').on('click', function() {
        var fabric = get_filter("fabric");
        var sleeve = get_filter("sleeve");
        var pattern = get_filter("pattern");
        var fit = get_filter("fit");
        var occasion = get_filter("occasion");
        var url = $('#url').val();
        var sort = $('#sort').val();

        $.ajax({
            method: "post",
            url:url,
            data:{sort:sort,url:url,fabric:fabric,sleeve:sleeve,pattern:pattern,fit:fit,occasion:occasion},
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