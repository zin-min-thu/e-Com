
$(document).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //Get cart items count
    $.ajax({
        type:"post",
        url:'/get-cart-count',
        success:function(resp) {
            $('.get-cart-count').html(resp.count)
        }
    });

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

    //Cannge product price by size of attribute
    $('#change-size').on('change', function() {
        var size = $(this).val();
        var product_id = $(this).attr('product-id');
        $.ajax({
            type:"post",
            url:'/change-product-price',
            data:{size:size,product_id:product_id},
            success:function(resp) {
                if(resp['discount'] > 0) {
                    $('.change-price').html("<del>Rs."+resp['attribute_price']+"</del> "+resp['discount_percent']+"%"+" ->("+resp['discounted_price']+")");
                }else {
                    $('.change-price').html("Rs."+resp['attribute_price']);
                }
            }, error:function() {
                alert("Error");
            }
        })

    });

    $(document).on("click",".updateCartQuantity", function() {

        var cartId = $(this).attr('cartId');

        if($(this).hasClass("qtyMinus")) {
            var quantity = $(this).prev().val();
            if(quantity <= 1) {
                alert("Quanty must be at least 1 or more.");
                return false;
            } else {
                new_qty = parseInt(quantity)-1;
            }
        }
        if($(this).hasClass("qtyPlus")) {
            var quantity = $(this).prev().prev().val();
            new_qty = parseInt(quantity)+1;
        }

        $.ajax({
            type:'post',
            url:'/update-cart-quantity',
            data:{cartId:cartId,qty:new_qty},
            success:function(resp) {
                if(resp.status == false) {
                    alert(resp.message)
                }
                $('#appendCartItem').html(resp.view);
            }, error: function() {
                alert("Error")
            }
        })
    });

    $(document).on("click", ".deleteCartQuantity",function() {
        var cartId = $(this).attr('cartId');
        var result = confirm('Are you sure you want to delete cart item?');
        if(result) {
            $.ajax({
                type:'post',
                url:'/delete-cart-quantity',
                data:{cartId:cartId},
                success:function(resp) {
                    $('#appendCartItem').html(resp.view);
                },error:function() {
                    alert('Error')
                }
            })
        }
    });

    // validate signup form on keyup and submit
    $("#registerForm").validate({
        rules: {
            name: "required",
            mobile: {
                required: true,
                minlength: 6,
                maxlength: 10,
                digits: true,
            },
            email: {
                required: true,
                email: true,
                remote: "check-email"
            },
            password: {
                required: true,
                minlength: 5
            },
        },
        messages: {
            name: "Please enter your name",
            mobile: {
                required: "Please enter your mobile",
                minlength: "Your mobile must be at least 6 digits",
                maxlength: "Your mobile must not exceed 10 digits",
                digits: 'Please enter only valid number'
            },
            email: {
                required: "Please enter your email",
                email: "Please enter your valid email",
                remote: "Email already exists"
            },
            password: {
                required: "Please choose a password",
                minlength: "Your password must be at least 5 characters long"
            },
        }
    });

    // validate login form on keyup and submit
    $("#loginForm").validate({
        rules: {
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
                minlength: 5
            },
        },
        messages: {
            email: {
                required: "Please enter your email",
                email: "Please enter your valid email",
            },
            password: {
                required: "Please enter a password",
                minlength: "Your password must be at least 5 characters long"
            },
        }
    });

})