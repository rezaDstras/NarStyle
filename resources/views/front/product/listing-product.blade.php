@extends('layouts.front.layout')
@section('contact')
    <?php
    use App\Models\Section;
    $sections=Section::sections();
    ?>
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ul>
                    <li><a href="{{url('/')}}" title="Go to Home Page">Home</a><span>/</span></li>
                    <li><strong><a title="women" >
                            <?php echo $categoryDetails['breadcrumbs']; ?>
                        </a></strong></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="main-container col2-left-layout">
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-sm-push-3 main-inner">
                <div class="category-description std">
                    <div class="slider-items-products">
                        <div id="category-desc-slider" class="product-flexslider hidden-buttons">
                            <div class="slider-items slider-width-col1 owl-carousel owl-theme" style="opacity: 1; display: block;">
                                <div class="owl-wrapper-outer"><div class="owl-wrapper" style="width: 2172px; left: 0px; display: block; transition: all 0ms ease 0s; transform: translate3d(0px, 0px, 0px);">
                                        <div class="owl-item" style="width: 543px;">
                                            <div class="item"> <a href="#"><img alt="New Special Collection" src="{{asset('admin/images/category_image/'.$category->category_image)}}"></a>
                                                <div class="cat-img-title cat-bg cat-box">
                                                    <h6 class="cat-heading"><br>
                                                        {{$category->description}}
                                                        <br>
                                                        </h6>
                                                    <p>Look great & feel amazing in our stunning dresses.. </p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <article class="col-main">
                    <div class="page-title">
                        <h2>{{$categoryDetails['catDetails']['category_name']}}</h2>
                        <p style="float: right; padding-top:20px; color: grey">{{count($categoryProducts)}} product are available</p>
                    </div>
                    <div class="toolbar">
                        <div id="sort-by">
                            <form name="sortProducts" id="sortProducts">
                                <input type="hidden"  id="url"  value="{{$categoryDetails['catDetails']['url']}}">
                                <label class="left">Sort By: </label>
                                <select name="sort" id="sort" class="selectpicker" data-width="fit">
                                    <option>Select</option>
                                    <option value="product_latest"
                                            @if( isset($_GET['sort']) && $_GET['sort']=="product_latest") selected="" @endif
                                    >Latest Product</option>
                                    <option value="product_name_a_z"
                                            @if( isset($_GET['sort']) && $_GET['sort']=="product_name_a_z") selected="" @endif
                                    >Product Name A-Z</option>
                                    <option value="product_name_z_a"
                                            @if( isset($_GET['sort']) && $_GET['sort']=="product_name_z_a") selected="" @endif
                                    >Product Name Z-A</option>
                                    <option value="product_lowest"
                                            @if( isset($_GET['sort']) && $_GET['sort']=="product_lowest") selected="" @endif
                                    >Lowest Price Product</option>
                                    <option value="product_highest"
                                            @if( isset($_GET['sort']) && $_GET['sort']=="product_highest") selected="" @endif
                                    >Highest Price  Product</option>


                                </select>
                            </form>
                    </div>
                    <div class="category-products filter_products" >
                        <ul class="products-grid">
                            @foreach($categoryProducts as $product)
                                <li class="item col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                    <div class="item-inner">
                                        <div class="item-img">
                                            <div class="item-img-info"><a class="product-image" title="{{$product->product_name}}" href="{{url('/product/'.$product['product_name'])}}"> <img alt="Product tilte is here" src={{asset("/admin/images/product_images/large_image/".$product->main_image)}}> </a>
                                                @if(strtotime($product->created_at)>strtotime("-30 days"))
                                                    <div class="new-label new-top-left">new</div>
                                                @endif
                                                @if($product->product_discount>0)
                                                    <div class="sale-label sale-top-right">Sale</div>
                                                @endif
{{--                                                <a class="quickview-btn" href="quick-view.html"><span>Quick View</span></a>--}}
                                                <div class="mask-left-shop wish_product" data-id="{{$product['id']}}" style="cursor: pointer"><i class="fa fa-heart"></i></div>
                                                <div class="mask-right-shop compare_product" data-id="{{$product['id']}}" style="cursor: pointer"> <i class="fa fa-signal"></i></div>
                                            </div>
                                        </div>
                                        <div class="item-info">
                                            <div class="info-inner">
                                                <div class="item-title"> <a title="Product tilte is here" href="{{url('/product/'.$product['product_name'])}}">{{$product->product_name}} </a> </div>
                                                <div class="item-content">
{{--                                                    <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>--}}
                                                    <div class="price-box"> <span class="regular-price"> <span style="color: gray">Brand({{ucwords($product['brand']['name'])}})</span></span>
                                                    </div>
                                                    <div class="item-price">
                                                        @if($product->product_discount>0)
                                                            <?php
                                                            $calculate_discount=100-$product->product_discount;
                                                            $discount=($product->product_price/100)*$calculate_discount;
                                                            ?>
                                                            <div class="price-box"> <span class="regular-price"> <span class="price">${{number_format($discount)}}</span></span>
                                                                <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price">${{number_format($product->product_price)}}</span> </p>
                                                            </div>
                                                        @else
                                                            <div class="price-box"> <span class="regular-price"> <span class="price">${{number_format($product->product_price)}}</span></span></div>
                                                        @endif
                                                    </div>
                                                    <div class="actions">
                                                        <div class="add_cart">
                                                            <button class="button btn-cart" type="button"><a href="{{url('/product/'.$product->product_name)}}"><span ><i class="fa fa-shopping-cart"></i> Add to Cart</span></a></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
{{-- @include('front.product.ajax_listing-product')--}}
                    <div class="toolbar bottom">
                        <div class="row">
                            <div class="col-sm-6 text-left">
                                <div class="pages">
                                    <ul class="pagination">
                                     @if(!isset($_GET['sort']) && empty($_GET['sort']) )
                                        {{ $categoryProducts->links() }}
                                    @else
                                      {{-- paginate by sorting filter --}}
                                      {{$categoryProducts->appends(['sort' => $_GET['sort']])->links()}};
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
            <div class="sidebar col-sm-3 col-xs-12 col-sm-pull-9">
                <aside class="sidebar">
                    <div class="block block-layered-nav">
                        <div class="block-title">
                            <h3>Shop By</h3>
                        </div>
                        <div class="block-content">
                            <p class="block-subtitle">Shopping Options</p>
                            <dl id="narrow-by-list">
                                <p class="block-subtitle">Categories</p>
                                @foreach($sections as $section)
                                    <dt class="even">{{ucwords($section->name)}}</dt>
                                        @foreach($section['categories'] as $category)
                                       <dd class="even">
                                        <ol>
                                            <?php $countProduct=\App\Models\Product::where('category_id',$category['id'])->count(); ?>
                                            <li><a href="{{url($category['url'])}}">{{ucwords($category->category_name)}}</a> </li>
                                        </ol>
                                    </dd>
                                        @endforeach
                                @endforeach
                                <dt class="odd">Clothing Material</dt>
                                <dd class="odd">
                                    <ol class="bag-material">
                                        @foreach($fabrics as $fabric)
                                        <li>
                                            <div class="pretty p-icon p-smooth">
                                                <input class="fabric" type="checkbox" name="fabric[]" id="{{$fabric}}" value="{{$fabric}}">
                                                <div class="state p-success"> <i class="icon fa fa-check"></i>
                                                    <label>{{$fabric}}</label>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ol>
                                </dd>
                                <dt class="odd">Sleeves Option</dt>
                                <dd class="odd">
                                    <ol class="bag-material">
                                        @foreach($sleeves as $sleeve)
                                            <li>
                                                <div class="pretty p-icon p-smooth">
                                                    <input class="sleeve" type="checkbox" name="sleeve[]" id="{{$sleeve}}" value="{{$sleeve}}">
                                                    <div class="state p-success"> <i class="icon fa fa-check"></i>
                                                        <label>{{$sleeve}}</label>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ol>
                                </dd>
                                <dt class="odd">Pattern Option</dt>
                                <dd class="odd">
                                    <ol class="bag-material">
                                        @foreach($patterns as $pattern)
                                            <li>
                                                <div class="pretty p-icon p-smooth">
                                                    <input class="pattern" type="checkbox" name="pattern[]" id="{{$pattern}}" value="{{$pattern}}">
                                                    <div class="state p-success"> <i class="icon fa fa-check"></i>
                                                        <label>{{$pattern}}</label>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ol>
                                </dd>
                                <dt class="odd">Fit Option</dt>
                                <dd class="odd">
                                    <ol class="bag-material">
                                        @foreach($fits as $fit)
                                            <li>
                                                <div class="pretty p-icon p-smooth">
                                                    <input class="fit" type="checkbox" name="fit[]" id="{{$fit}}" value="{{$fit}}">
                                                    <div class="state p-success"> <i class="icon fa fa-check"></i>
                                                        <label>{{$fit}}</label>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ol>
                                </dd>
                                <dt class="odd">Occasion Option</dt>
                                <dd class="odd">
                                    <ol class="bag-material">
                                        @foreach($occassions as $occasion)
                                            <li>
                                                <div class="pretty p-icon p-smooth">
                                                    <input class="occasion"  type="checkbox" name="occassion[]" id="{{$occasion}}" value="{{$occasion}}">
                                                    <div class="state p-success"> <i class="icon fa fa-check"></i>
                                                        <label>{{$occasion}}</label>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ol>
                                </dd>
                            </dl>
                        </div>
                    </div>
                    <div class="custom-slider">
                        <div>
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li class="" data-target="#carousel-example-generic" data-slide-to="0"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="2" class="active"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="item"><img src="/front/images/slide3.jpg" alt="New Arrivals">
                                        <div class="carousel-caption">
                                            <h3><a title=" Sample Product" href="{{url('/shop')}}">New Arrivals</a></h3>
                                            <p>Look great & feel amazing in our stunning dresses..</p>
                                        </div>
                                    </div>
                                    <div class="item"><img src="/front/images/slide1.jpg" alt="Top Fashion">
                                        <div class="carousel-caption">
                                            <h3><a title=" Sample Product" href="{{url('/shop')}}">Top Fashion</a></h3>
                                            <p>Look great & feel amazing in our stunning dresses..</p>
                                        </div>
                                    </div>
                                    <div class="item active"><img src="/front/images/slide2.jpg" alt="Mid Season">
                                        <div class="carousel-caption">
                                            <h3><a title=" Sample Product" href="{{url('/shop')}}">Mid Season</a></h3>
                                            <p>Look great & feel amazing in our stunning dresses..</p>
                                        </div>
                                    </div>
                                </div>
                                <a class="left carousel-control" href="#" data-slide="prev"> <span class="sr-only">Previous</span></a> <a class="right carousel-control" href="#" data-slide="next"> <span class="sr-only">Next</span></a></div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>
@endsection
