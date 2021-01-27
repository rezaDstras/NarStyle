$(document).ready(function () {
//check password is correct or not
    $("#current_pwd").keyup(function () {
        var current_pwd= $("#current_pwd").val();
        // alert(current_pwd);
        $.ajax({
            type:'post',
            url:'/admin/check-current-pwd',
            data:{current_pwd:current_pwd},
            success:function (resp) {
                if (resp=="false"){
                    $("#chkPwd").html("<font color=red>Current Password is incorrect</font>");
                }else if(resp=="true"){
                    $("#chkPwd").html("<font color=green>Current Password is correct</font>");
                }
            },error:function () {
                alert("Error");
            }
        });
    });
    //section active or inactive
    $(".updateSectionStatus").click(function () {
        var status = $(this).text();
        var section_id = $(this).attr("section_id");
        $.ajax({
           type:'post',
           url:'/admin/update-section-status',
            data:{status:status,section_id:section_id},
            success:function (resp) {
                if(resp['status']=="0"){
                    $("#section-"+section_id).html("<a class='updateSectionStatus' href='javascript:void(0)'>inactive</a>");
                }else if(resp['status']=="1"){
                    $("#section-"+section_id).html("<a class='updateSectionStatus' href='javascript:void(0)'>active</a>");

                }
            },error:function () {
                alert('"error');
            }
        });

    });
    //Update Category Status
    $(".updateCategoryStatus").click(function () {
        var status = $(this).text();
        var category_id = $(this).attr("category_id");
        $.ajax({
            type:'post',
            url:'/admin/update-category-status',
            data:{status:status,category_id:category_id},
            success:function (resp) {
                if(resp['status']=="0"){
                    $("#category-"+category_id).html("<a class='updateCategoryStatus' href='javascript:void(0)'>inactive</a>");
                }else if(resp['status']=="1"){
                    $("#category-"+category_id).html("<a class='updateCategoryStatus' href='javascript:void(0)'>active</a>");
                }
            },error:function () {
                alert('"error');
            }
        });
    });
    $("#section_id").change(function () {
        var section_id = $(this).val();
        $.ajax({
           type:"post",
            url:"/admin/category-level",
            data:{section_id:section_id},
            success:function(resp) {
                $("#parent_id").html(resp);
            },error:function () {
                alert('Error');
            }
        });
    });
    //confirm delete category with sweet alert ** add script code of sweet alert site in header**
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
                    'category has been deleted.',
                    'success'
                )
                window.location.href="/admin/delete-"+record+"/"+recordid;
            }
        })
    });
    //Update Product Status
    $(".updateProductStatus").click(function () {
        var status = $(this).text();
        var product_id = $(this).attr("product_id");
        $.ajax({
            type:'post',
            url:'/admin/update-product-status',
            data:{status:status,product_id:product_id},
            success:function (resp) {
                if(resp['status']=="0"){
                    $("#product-"+product_id).html("<a class='updateProductStatus' href='javascript:void(0)'>inactive</a>");
                }else if(resp['status']=="1"){
                    $("#product-"+product_id).html("<a class='updateProductStatus' href='javascript:void(0)'>active</a>");
                }
            },error:function () {
                alert('"error');
            }
        });
    });
    //Product Attribute Add - Remove Script
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div ><div style="height: 10px; "></div><input type="text" name="size[]"  placeholder="size" style="width: 150px"  value=""/>&nbsp;<input type="text" name="sku[]"  placeholder="sku" style="width: 150px"  value=""/>&nbsp;<input type="number" name="stock[]"  placeholder="stock" style="width: 150px"  value=""/>&nbsp;<input type="number" name="price[]"  placeholder="price" style="width: 150px"  value=""/><a href="javascript:void(0);" class="remove_button">&nbsp;<li class="fas fa-minus" ></li></a></div>'; //New input field html
    var x = 1; //Initial field counter is 1
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });

    //Update Attribute Status
    $(".updateAttributeStatus").click(function () {
        var status = $(this).text();
        var attribute_id = $(this).attr("attribute_id");
        $.ajax({
            type:'post',
            url:'/admin/update-attribute-status',
            data:{status:status,attribute_id:attribute_id},
            success:function (resp) {
                if(resp['status']=="0"){
                    $("#attribute-"+attribute_id).html("<a class='updateAttributeStatus' href='javascript:void(0)'>inactive</a>");
                }else if(resp['status']=="1"){
                    $("#attribute-"+attribute_id).html("<a class='updateAttributeStatus' href='javascript:void(0)'>active</a>");
                }
            },error:function () {
                alert("error");
            }
        });
    });
    //Update Image Product Status
    $(".updateImageStatus").click(function () {
        var status = $(this).text();
        var image_id = $(this).attr("image_id");
        $.ajax({
            type:'post',
            url:'/admin/update-image-status',
            data:{status:status,image_id:image_id},
            success:function (resp) {
                if(resp['status']=="0"){
                    $("#image-"+image_id).html("<a class='updateImageStatus' href='javascript:void(0)'>inactive</a>");
                }else if(resp['status']=="1"){
                    $("#image-"+image_id).html("<a class='updateImageStatus' href='javascript:void(0)'>active</a>");
                }
            },error:function () {
                alert('"error');
            }
        });
    });
    //Update brand Status
    $(".updateBrandStatus").click(function () {
        var status = $(this).children("i").attr("status");
        var brand_id = $(this).attr("brand_id");
        $.ajax({
            type:'post',
            url:'/admin/update-brand-status',
            data:{status:status,brand_id:brand_id},
            success:function (resp) {
                if(resp['status']=="0"){
                    $("#brand-"+brand_id).html("<i class='fas fa-toggle-off' aria-hidden='true' status='inactive'></i>");
                }else if(resp['status']=="1"){
                    $("#brand-"+brand_id).html("<i class='fas fa-toggle-on' aria-hidden='true' status='active'></i>");
                }
            },error:function () {
                alert('"error');
            }
        });
    });

    //Update Banner Status
    $(".updateBannerStatus").click(function () {
        var status = $(this).children("i").attr("status");
        var banner_id = $(this).attr("banner_id");
        $.ajax({
            type:'post',
            url:'/admin/update-banner-status',
            data:{status:status,banner_id:banner_id},
            success:function (resp) {
                if(resp['status']=="0"){
                    $("#banner-"+banner_id).html("<i class='fas fa-toggle-off' aria-hidden='true' status='inactive'></i>");
                }else if(resp['status']=="1"){
                    $("#banner-"+banner_id).html("<i class='fas fa-toggle-on' aria-hidden='true' status='active'></i>");
                }
            },error:function () {
                alert('"error');
            }
        });
    });

    //Update Coupon Status
    $(".updateCouponStatus").click(function () {
        var status = $(this).children("i").attr("status");
        var coupon_id = $(this).attr("coupon_id");
        $.ajax({
            type:'post',
            url:'/admin/update-coupon-status',
            data:{status:status,coupon_id:coupon_id},
            success:function (resp) {
                if(resp['status']=="0"){
                    $("#coupon-"+coupon_id).html("<i class='fas fa-toggle-off' aria-hidden='true' status='inactive'></i>");
                }else if(resp['status']=="1"){
                    $("#coupon-"+coupon_id).html("<i class='fas fa-toggle-on' aria-hidden='true' status='active'></i>");
                }
            },error:function () {
                alert('"error');
            }
        });
    });
    //Show Manual Or Automatic Field in Coupon Form
    $("#ManualCoupon").click(function () {
        $("#couponField").show();
    });
    $("#AutomaticCoupon").click(function () {
        $("#couponField").hide();
    });
    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

});
