<?php
use App\Models\Brand;
$brands=Brand::getBrands();
?>
<div class="container jtv-brand-logo-block">
    <div class="jtv-brand-logo">
        <div class="slider-items-products">
            <div id="jtv-brand-logo-slider" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col6">
                    @foreach($brands as $brand)
                    <div class="item"><a href="{{url('/brand/'.$brand->name)}}"><img src="{{asset('admin/images/brand_images/'.$brand->image)}}" alt="Brand Logo"></a> </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
