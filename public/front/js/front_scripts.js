$(document).ready(function () {
    //Change Sort Filter Listing Product
    // $("#sort").on('change',function () {
    //     this.form.submit();
    // }));
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("#sort").on('change',function (){
        var sort = $(this).val();
        var fabric = get_filter('fabric');
        var sleeve = get_filter('sleeve');
        var pattern = get_filter('pattern');
        var fit = get_filter('fit');
        var occasion = get_filter('occasion');
        var url = $("#url").val();
        $.ajax({
           url:url,
           method:"get",
            data:{fabric:fabric,sleeve:sleeve,pattern:pattern,fit:fit,occasion:occasion,sort:sort,url:url},
            success:function(data){
               $('.filter_products').html(data);
            }
        });
    });
    $(".fabric").on('click',function () {
        var fabric = get_filter(this);
        var sleeve = get_filter('sleeve');
        var fit = get_filter('fit');
        var occasion = get_filter('occasion');
        var pattern = get_filter('pattern');
        var sort = $("#sort option:selected").val();
        var url = $("#url").val();
        $.ajax({
            url:url,
            method:"get",
            data:{fabric:fabric,sleeve:sleeve,sort:sort,url:url,fit:fit,occasion:occasion,pattern:pattern},
            success:function(data){
                $('.filter_products').html(data);
            }
        });
    });
    $(".sleeve").on('click',function () {
        var fabric = get_filter('fabric');
        var fit = get_filter('fit');
        var occasion = get_filter('occasion');
        var pattern = get_filter('pattern');
        var sleeve = get_filter(this);
        var sort = $("#sort option:selected").val();
        var url = $("#url").val();
        $.ajax({
            url:url,
            method:"get",
            data:{fabric:fabric,sleeve:sleeve,sort:sort,url:url,fit:fit,occasion:occasion,pattern:pattern},
            success:function(data){
                $('.filter_products').html(data);
            }
        });
    });
    $(".pattern").on('click',function () {
        var fabric = get_filter('fabric');
        var sleeve = get_filter('sleeve');
        var fit = get_filter('fit');
        var occasion = get_filter('occasion');
        var pattern = get_filter(this);
        var sort = $("#sort option:selected").val();
        var url = $("#url").val();
        $.ajax({
            url:url,
            method:"get",
            data:{fabric:fabric,pattern:pattern,fit:fit,occasion:occasion,sleeve:sleeve,sort:sort,url:url},
            success:function(data){
                $('.filter_products').html(data);
            }
        });
    });
    $(".fit").on('click',function () {
        var pattern = get_filter('pattern');
        var occasion = get_filter('occasion');
        var fabric = get_filter('fabric');
        var sleeve = get_filter('sleeve');
        var fit = get_filter(this);
        var sort = $("#sort option:selected").val();
        var url = $("#url").val();
        $.ajax({
            url:url,
            method:"get",
            data:{fabric:fabric,sleeve:sleeve,pattern:pattern,occasion:occasion,fit:fit,sort:sort,url:url},
            success:function(data){
                $('.filter_products').html(data);
            }
        });
    });
    $(".occasion").on('click',function () {
        var fabric = get_filter('fabric');
        var fit = get_filter('fit');
        var pattern = get_filter('pattern');
        var sleeve = get_filter('sleeve');
        var occasion = get_filter(this);
        var sort = $("#sort option:selected").val();
        var url = $("#url").val();
        $.ajax({
            url:url,
            method:"get",
            data:{fabric:fabric,occasion:occasion,fit:fit,pattern:pattern,sleeve:sleeve,sort:sort,url:url},
            success:function(data){
                $('.filter_products').html(data);
            }
        });
    });

    function get_filter(class_name){
        var filter=[];
        $(class_name).each(function(){
            filter.push($(this).val());
        });
        return filter;
    }


    //Get Attribute Price
    $("#getPrice").change(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var size =$(this).val();
        if (size == ""){
            alert("please Select Size");
            return false;
        }
        var product_id=$(this).attr("product_id");
        $.ajax({
            url:'/get-product-price',
            type:'post',
            data:{size:size,product_id:product_id},
            success:function (resp) {
                if(resp['discount']>0){
                    $(".getAttrPrice").html("$"+resp['final_price']);
                    $(".getAttrOldPrice").html("$"+resp['product_price']);

                }else{
                    $(".getAttrPrice").html("$"+resp['product_price']);
                }

            },error:function () {
                alert('error');
            }
        });
    });
    //Add To Cart
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.add-to-cart').on('click',function(){
        var id=$(this).attr('data-id');
        $.ajax({
            url:'/product/cart',
            type:'post',
            dataType:'json',
            data:{id:id},
            success:function(data){
                if(data.basket_create=='success'){
                    alert('product has been added to basket successfully');
                }
                else if(data.count=='exceeded'){
                    alert('product can not add to basket table');
                }
            }
        });
    });
    //Update Cart Items
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on('click','.qtybutton',function () {
      if ($(this).hasClass('qtyMinus')){
          var quantity=$(this).prev().val();
          if (quantity<=1){
              // alert("quantity must be greater than 1");
              Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Quantity must be greater than 1',
              })
              return false;
          }else {
              new_qty=parseInt(quantity)-1;

          }
      }
        if ($(this).hasClass('qtyPlus')){
            var quantity=$(this).prev().prev().val();
            new_qty=parseInt(quantity)+1;
        }
        // alert(new_qty);
        var cartid=$(this).data('cartid');
        // alert(cartid);
        $.ajax({
            type:'post',
            url:'/update-cart-item-qty',
            data:{"cartid":cartid,"qty":new_qty},
            success:function (resp) {
                // alert(resp);
                if (resp.status==false){
                    // alert(resp.message);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: resp.message,
                    })
                }
                $("#AppendCartItems").html(resp.view);
            },error:function () {
                alert('error');
            }
        });
    });

    //Delete Cart Item
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on('click','.btnItemDelete',function () {
        var cartid=$(this).data('cartid');
        var result=confirm(" want to delete this cart item?")
        if (result){
            $.ajax({
                type:'post',
                url:'/delete-cart-item',
                data:{"cartid":cartid},
                success:function (resp) {
                    // alert(resp);
                    $("#AppendCartItems").html(resp.view);
                },error:function () {
                    alert('error');
                }
            });
        }
    });
    // validate register form on keyup and submit
    $("#registerForm").validate({
        rules: {
            name: "required",
            mobile: {
                required: true,
                minlength: 11,
                maxlength:11,
                digits:true,
            },
            password: {
                required: true,
                minlength: 6
            },
            email: {
                required: true,
                email: true,
                remote:"check-email"
            },
        },
        messages: {
            name: "Please enter your name",
            mobile: {
                required: "Please enter your mobile number",
                minlength: "Your mobile number must consist of at least 11 characters",
                maxlength: "Your mobile number must consist of at maximum 11 characters",
                digits:"Please enter valid mobile number",
            },
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 6 characters long"
            },
            email: {
                required: "Please enter your email",
                email: "Please enter valid email address",
                remote:"Email already exists"
            },
        }
    });
    // validate login form on keyup and submit
    $("#loginForm").validate({
        rules: {
            password: {
                required: true,
                minlength: 6
            },
            email: {
                required: true,
                email: true,
            },
        },
        messages: {
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 6 characters long"
            },
            email: {
                required: "Please enter your email",
                email: "Please enter valid email address",
            },
        }
    });
    // validate information user form on keyup and submit
    $("#informationForm").validate({
        rules: {
            name: {
                required: true,
                minlength: 3,
            },
            mobile: {
                required: true,
                minlength: 11,
                maxlength:11,
                digits:true,
            },
            address: {
                minlength: 10
            },
        },
        messages: {
            name: {
                required: "Please enter your name",
                minlength: "Your name must consist of at least 3 characters",
            },
            mobile: {
                required: "Please enter your mobile number",
                minlength: "Your mobile number must consist of at least 11 characters",
                maxlength: "Your mobile number must consist of at maximum 11 characters",
                digits:"Please enter valid mobile number",
            },
            address: {
                minlength: "Your mobile number must consist of at least 10 characters",
            },
        }
    });
    //Compare Product
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.compare_product').on('click',function(){
        var id=$(this).attr('data-id');
        $.ajax({
            url:'/product/compare',
            type:'post',
            dataType:'json',
            data:{id:id},
            success:function(data){
                if(data.compare_create=='success'){
                    // alert('product has been added to compare list successfully');
                    Swal.fire({
                        position: 'top',
                        icon: 'success',
                        title: 'Your favourite Item has been saved for comparing',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
                else if(data.compare_fault=='exceeded'){
                    // alert('you have been added this product already');
                    Swal.fire({
                        position: 'top',
                        icon: 'error',
                        title: 'you have been added this product in compare list already',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        });
    });
    //Wishlist Product
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.wish_product').on('click',function(){
        var id=$(this).attr('data-id');
        $.ajax({
            url:'/product/wishlist',
            type:'post',
            dataType:'json',
            data:{id:id},
            success:function(data){
                if(data.wish_create=='success'){
                    // alert('product has been added to wishlist successfully');
                    Swal.fire({
                        position: 'top',
                        icon: 'success',
                        title: 'Your favourite Item has been saved',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
                else if(data.wish_fault=='exceeded'){
                    // alert('you have been added this product already');
                    Swal.fire({
                        position: 'top',
                        icon: 'error',
                        title: 'you have been added this product already',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        });
    });





    //confirm delete product  ** add script code of sweet alert site in header**
    $(".confirmDelete").click(function () {
        var record = $(this).attr("record");
        var recordid = $(this).attr("recordid");
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Deleted!',
                    'product has been deleted.',
                    'success'
                )
                window.location.href="/delete-"+record+"/"+recordid;
            }
        })
    });
    //Apply Coupon
    $("#ApplyCoupon").click(function () {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Imported Coupon Code Is Invalid',
        })

    });
})
