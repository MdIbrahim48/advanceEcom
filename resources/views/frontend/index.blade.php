@extends('layouts.frontend-master')

@section('frontend_title') Home @endsection
@section('content')

@php
    function bn_price($str){
        $en = [1,2,3,4,5,6,7,8,9,0];
        $bn = ['১','২','৩','৪','৫','৬','৭','৮','৯','০'];
        $str = str_replace($en,$bn,$str);
        return $str;
    }
@endphp
<!-- ============================================== HEADER : END ============================================== -->
<div class="body-content outer-top-xs" id="top-banner-and-menu">
	<div class="container">
	<div class="row">
	<!-- ============================================== SIDEBAR ============================================== -->
		<div class="col-xs-12 col-sm-12 col-md-3 sidebar">

			<!-- ================================== TOP NAVIGATION ================================== -->
            @include('frontend.inc.category')

<!-- ================================== TOP NAVIGATION : END ================================== -->

	<!-- ============================================== HOT DEALS ============================================== -->
    @include('frontend.inc.hot_deals')


<!-- ============================================== HOT DEALS: END ============================================== -->


 <!-- ============================================== SPECIAL OFFER ============================================== -->
    <div class="sidebar-widget outer-bottom-small wow fadeInUp">
        <h3 class="section-title">Special Offer</h3>
        <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                @foreach ($speacialOffers as $product)
                <div class="item">
                    <div class="products special-product">
                        <div class="product">
                            <div class="product-micro">
                                <div class="row product-micro-row">
                                    <div class="col col-xs-5">
                                        <div class="product-image">
                                            <div class="image">
                                                @if (session()->get('language') == 'bangla')
                                                    <a href="{{ route('product-details',['id'=>$product->id,'slug'=>$product->product_slug_bn]) }}"><img  src="{{asset($product->product_thumbnail)}}" alt=""></a>
                                                @else
                                                    <a href="{{ route('product-details',['id'=>$product->id,'slug'=>$product->product_slug_en]) }}"><img  src="{{asset($product->product_thumbnail)}}" alt=""></a>
                                                @endif
                                            </div>
                                            <!-- /.image -->
                                        </div>
                                        <!-- /.product-image -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col col-xs-7">
                                        <div class="product-info">
                                            <h3 class="name">
                                                @if (session()->get('language') == 'bangla')
                                                    <a href="{{ route('product-details',['id'=>$product->id,'slug'=>$product->product_slug_bn]) }}"> {{ $product->product_name_bn }}</a>
                                                @else
                                                    <a href="{{ route('product-details',['id'=>$product->id,'slug'=>$product->product_slug_en]) }}"> {{ $product->product_name_en }}</a>
                                                @endif
                                            </h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="product-price">
                                                @if ($product->discount_price == null)
                                                    @if (session()->get('language') == 'bangla')
                                                        <span class="price">${{ bn_price($product->selling_price) }}</span>
                                                    @else
                                                        <span class="price">${{ $product->selling_price }}</span>
                                                    @endif
                                                @else
                                                    @if (session()->get('language') == 'bangla')
                                                    <span class="price">${{ bn_price($product->discount_price) }} </span>
                                                        <span class="price-before-discount">${{ bn_price($product->selling_price) }}</span>
                                                    @else
                                                    <span class="price">${{ $product->discount_price }} </span>
                                                        <span class="price-before-discount">${{ $product->selling_price }}	</span>
                                                    @endif
                                                @endif
                                                {{-- <span class="price"> $450.99 </span> --}}
                                            </div>
                                            <!-- /.product-price -->
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.product-micro-row -->
                            </div>
                            <!-- /.product-micro -->
                        </div>
                        {{-- <div class="product">
                            <div class="product-micro">
                                <div class="row product-micro-row">
                                    <div class="col col-xs-5">
                                        <div class="product-image">
                                            <div class="image">
                                                <a href="#">
                                                    <img src="{{asset('frontend')}}/assets/images/products/p29.jpg" alt="" />
                                                </a>
                                            </div>
                                            <!-- /.image -->
                                        </div>
                                        <!-- /.product-image -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col col-xs-7">
                                        <div class="product-info">
                                            <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="product-price">
                                                <span class="price"> $450.99 </span>
                                            </div>
                                            <!-- /.product-price -->
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.product-micro-row -->
                            </div>
                            <!-- /.product-micro -->
                        </div>
                        <div class="product">
                            <div class="product-micro">
                                <div class="row product-micro-row">
                                    <div class="col col-xs-5">
                                        <div class="product-image">
                                            <div class="image">
                                                <a href="#">
                                                    <img src="{{asset('frontend')}}/assets/images/products/p28.jpg" alt="" />
                                                </a>
                                            </div>
                                            <!-- /.image -->
                                        </div>
                                        <!-- /.product-image -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col col-xs-7">
                                        <div class="product-info">
                                            <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="product-price">
                                                <span class="price"> $450.99 </span>
                                            </div>
                                            <!-- /.product-price -->
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.product-micro-row -->
                            </div>
                            <!-- /.product-micro -->
                        </div> --}}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- /.sidebar-widget-body -->
    </div>
<!-- /.sidebar-widget -->

<!-- ============================================== SPECIAL OFFER : END ============================================== -->
	<!-- ============================================== PRODUCT TAGS ============================================== -->
    @include('frontend.inc.product_tag')

<!-- ============================================== PRODUCT TAGS : END ============================================== -->
<!-- ============================================== SPECIAL DEALS ============================================== -->
    <div class="sidebar-widget outer-bottom-small wow fadeInUp">
        <h3 class="section-title">Special Deals</h3>
        <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
               @foreach ($speacialDeals as $product)
                <div class="item">
                    <div class="products special-product">
                        <div class="product">
                            <div class="product-micro">
                                <div class="row product-micro-row">
                                    <div class="col col-xs-5">
                                        <div class="product-image">
                                            <div class="image">
                                                @if (session()->get('language') == 'bangla')
                                                    <a href="{{ route('product-details',['id'=>$product->id,'slug'=>$product->product_slug_bn]) }}"><img  src="{{asset($product->product_thumbnail)}}" alt=""></a>
                                                @else
                                                    <a href="{{ route('product-details',['id'=>$product->id,'slug'=>$product->product_slug_en]) }}"><img  src="{{asset($product->product_thumbnail)}}" alt=""></a>
                                                @endif
                                            </div>
                                            <!-- /.image -->
                                        </div>
                                        <!-- /.product-image -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col col-xs-7">
                                        <div class="product-info">
                                            <h3 class="name">
                                                @if (session()->get('language') == 'bangla')
                                                    <a href="{{ route('product-details',['id'=>$product->id,'slug'=>$product->product_slug_bn]) }}"> {{ $product->product_name_bn }}</a>
                                                @else
                                                    <a href="{{ route('product-details',['id'=>$product->id,'slug'=>$product->product_slug_en]) }}"> {{ $product->product_name_en }}</a>
                                                @endif
                                            </h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="product-price">
                                                @if ($product->discount_price == null)
                                                    @if (session()->get('language') == 'bangla')
                                                        <span class="price">${{ bn_price($product->selling_price) }}</span>
                                                    @else
                                                        <span class="price">${{ $product->selling_price }}</span>
                                                    @endif
                                                @else
                                                    @if (session()->get('language') == 'bangla')
                                                    <span class="price">${{ bn_price($product->discount_price) }} </span>
                                                        <span class="price-before-discount">${{ bn_price($product->selling_price) }}</span>
                                                    @else
                                                    <span class="price">${{ $product->discount_price }} </span>
                                                        <span class="price-before-discount">${{ $product->selling_price }}	</span>
                                                    @endif
                                                @endif
                                            </div>
                                            <!-- /.product-price -->
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.product-micro-row -->
                            </div>
                            <!-- /.product-micro -->
                        </div>
                        {{-- <div class="product">
                            <div class="product-micro">
                                <div class="row product-micro-row">
                                    <div class="col col-xs-5">
                                        <div class="product-image">
                                            <div class="image">
                                                <a href="#">
                                                    <img src="{{asset('frontend')}}/assets/images/products/p15.jpg" alt="" />
                                                </a>
                                            </div>
                                            <!-- /.image -->
                                        </div>
                                        <!-- /.product-image -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col col-xs-7">
                                        <div class="product-info">
                                            <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="product-price">
                                                <span class="price"> $450.99 </span>
                                            </div>
                                            <!-- /.product-price -->
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.product-micro-row -->
                            </div>
                            <!-- /.product-micro -->
                        </div>
                        <div class="product">
                            <div class="product-micro">
                                <div class="row product-micro-row">
                                    <div class="col col-xs-5">
                                        <div class="product-image">
                                            <div class="image">
                                                <a href="#">
                                                    <img data-echo="assets/images/products/p26.jpg" alt="" />
                                                </a>
                                            </div>
                                            <!-- /.image -->
                                        </div>
                                        <!-- /.product-image -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col col-xs-7">
                                        <div class="product-info">
                                            <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="product-price">
                                                <span class="price"> $450.99 </span>
                                            </div>
                                            <!-- /.product-price -->
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.product-micro-row -->
                            </div>
                            <!-- /.product-micro -->
                        </div> --}}
                    </div>
                </div>
               @endforeach
            </div>
        </div>
        <!-- /.sidebar-widget-body -->
    </div>
<!-- /.sidebar-widget -->

<!-- ============================================== SPECIAL DEALS : END ============================================== -->
			<!-- ============================================== NEWSLETTER ============================================== -->
<div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
	<h3 class="section-title">Newsletters</h3>
	<div class="sidebar-widget-body outer-top-xs">
		<p>Sign Up for Our Newsletter!</p>
        <form role="form">
        	 <div class="form-group">
			    <label class="sr-only" for="exampleInputEmail1">Email address</label>
			    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
			  </div>
			<button class="btn btn-primary">Subscribe</button>
		</form>
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
<!-- ============================================== NEWSLETTER: END ============================================== -->

			<!-- ============================================== Testimonials============================================== -->
            @include('frontend.inc.testimonial')

<!-- ============================================== Testimonials: END ============================================== -->

<div class="home-banner">
<img src="{{asset('frontend')}}/assets/images/banners/LHS-banner.jpg" alt="Image">
</div>




		</div><!-- /.sidemenu-holder -->
		<!-- ============================================== SIDEBAR : END ============================================== -->

		<!-- ============================================== CONTENT ============================================== -->
		<div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
			<!-- ========================================== SECTION – HERO ========================================= -->

<div id="hero">
	<div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
        @foreach ($sliders as $item)

		<div class="item" style="background-image: url({{ asset($item->image) }});">
			<div class="container-fluid">
				<div class="caption bg-color vertical-center text-left">
                    <div class="slider-header fadeInDown-1">  @if ($item->title_en == null)
                        @else Shop Mama @endif</div>
					<div class="big-text fadeInDown-1">
                        @if (session()->get('language') == 'bangla')
                            <span>{{ $item->title_bn }}</span>
                        @else
                            <span> {{ $item->title_en }}</span>
                        @endif
					</div>

					<div class="excerpt fadeInDown-2 hidden-xs">
                        @if (session()->get('language') == 'bangla')
                            <span>{{ $item->description_bn }}</span>
                        @else
                            <span> {{ $item->description_en }}</span>
                        @endif
					</div>
                    @if ($item->title_en == null)
                    @else
                    <div class="button-holder fadeInDown-3">
						<a href="index6c11.html?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a>
					</div>
                    @endif

				</div><!-- /.caption -->
			</div><!-- /.container-fluid -->
		</div><!-- /.item -->

        @endforeach
	</div><!-- /.owl-carousel -->
</div>

<!-- ========================================= SECTION – HERO : END ========================================= -->

			<!-- ============================================== INFO BOXES ============================================== -->
<div class="info-boxes wow fadeInUp">
	<div class="info-boxes-inner">
		<div class="row">
			<div class="col-md-6 col-sm-4 col-lg-4">
				<div class="info-box">
					<div class="row">

						<div class="col-xs-12">
							<h4 class="info-box-heading green">money back</h4>
						</div>
					</div>
					<h6 class="text">30 Days Money Back Guarantee</h6>
				</div>
			</div><!-- .col -->

			<div class="hidden-md col-sm-4 col-lg-4">
				<div class="info-box">
					<div class="row">

						<div class="col-xs-12">
							<h4 class="info-box-heading green">free shipping</h4>
						</div>
					</div>
					<h6 class="text">Shipping on orders over $99</h6>
				</div>
			</div><!-- .col -->

			<div class="col-md-6 col-sm-4 col-lg-4">
				<div class="info-box">
					<div class="row">

						<div class="col-xs-12">
							<h4 class="info-box-heading green">Special Sale</h4>
						</div>
					</div>
					<h6 class="text">Extra $5 off on all items </h6>
				</div>
			</div><!-- .col -->
		</div><!-- /.row -->
	</div><!-- /.info-boxes-inner -->

</div><!-- /.info-boxes -->
<!-- ============================================== INFO BOXES : END ============================================== -->
			<!-- ============================================== SCROLL TABS ============================================== -->
<div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
	<div class="more-info-tab clearfix ">
	   <h3 class="new-product-title pull-left">@if (session()->get('language') == 'bangla')
        নতুন পন্যসমূহ @else New Products @endif </h3>
		<ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
			<li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">@if (session()->get('language') == 'bangla')
               সকল @else All @endif </a></li>
            @foreach ($categories as $category)
                <li><a data-transition-type="backSlide" href="#category{{ $category->id }}"
                        data-toggle="tab">
                        @if (session()->get('language') == 'bangla')
                        {{ $category->category_name_bn }} @else
                            {{ $category->category_name_en }} @endif
                    </a></li>
            @endforeach
		</ul><!-- /.nav-tabs -->
	</div>
	<div class="tab-content outer-top-xs">
		<div class="tab-pane in active" id="all">
			<div class="product-slider">
				<div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                    @foreach ($products as $product)
                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image">
                                            @if (session()->get('language') == 'bangla')
                                                <a href="{{ route('product-details',['id'=>$product->id,'slug'=>$product->product_slug_bn]) }}"><img  src="{{asset($product->product_thumbnail)}}" alt=""></a>
                                            @else
                                                <a href="{{ route('product-details',['id'=>$product->id,'slug'=>$product->product_slug_bn]) }}"><img  src="{{asset($product->product_thumbnail)}}" alt=""></a>
                                            @endif
                                        </div><!-- /.image -->
                                        @php
                                            $amount = (int)$product->selling_price - (int)$product->discount_price;
                                            $discount = ($amount/$product->selling_price) * 100;
                                        @endphp
                                        <div class="tag new">
                                            @if ($product->discount_price == null)
                                                <span>@if (session()->get('language') == 'bangla') নতুন @else new @endif </span>
                                            @else
                                            @if (session()->get('language') == 'bangla')
                                                {{ bn_price(round($discount)) }}% @else {{ round($discount) }}% @endif
                                            @endif
                                        </div>
                                    </div><!-- /.product-image -->
                                    <div class="product-info text-left">

                                        <h3 class="name">
                                            @if (session()->get('language') == 'bangla')
                                                <a href="{{ route('product-details',['id'=>$product->id,'slug'=>$product->product_slug_bn]) }}"> {{ $product->product_name_bn }}</a>
                                            @else
                                                <a href="{{ route('product-details',['id'=>$product->id,'slug'=>$product->product_slug_bn]) }}"> {{ $product->product_name_en }}</a>
                                            @endif
                                        </h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>

                                        <div class="product-price">
                                            @if ($product->discount_price == null)
                                                @if (session()->get('language') == 'bangla')
                                                    <span class="price">${{ bn_price($product->selling_price) }}	</span>
                                                @else
                                                    <span class="price">${{ $product->selling_price }}	</span>
                                                @endif

                                            @else
                                                @if (session()->get('language') == 'bangla')
                                                <span class="price">${{ bn_price($product->discount_price) }} </span>
                                                    <span class="price-before-discount">${{ bn_price($product->selling_price) }}	</span>
                                                @else
                                                <span class="price">${{ $product->discount_price }} </span>
                                                    <span class="price-before-discount">${{ $product->selling_price }}	</span>
                                                @endif

                                            @endif

                                        </div><!-- /.product-price -->
                                    </div><!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </button>
                                                    <button class="btn btn-primary cart-btn" type="button"> @if (session()->get('language') == 'bangla') কার্টে সংযুক্ত করুন @else Add to cart @endif </button>
                                                </li>
                                                <li class="lnk wishlist">
                                                    <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist">
                                                        <i class="icon fa fa-heart"></i>
                                                    </a>
                                                </li>

                                                <li class="lnk">
                                                    <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare">
                                                        <i class="fa fa-signal" aria-hidden="true"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div><!-- /.action -->
                                    </div><!-- /.cart -->
                                </div><!-- /.product -->
                            </div><!-- /.products -->
                        </div><!-- /.item -->
                    @endforeach

                </div><!-- /.home-owl-carousel -->
            </div><!-- /.product-slider -->
		</div><!-- /.tab-pane -->

        @foreach ($categories as $category)
            <div class="tab-pane" id="category{{ $category->id }}">
                <div class="product-slider">
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                        @php
                            $catwiseProduct = App\Models\Product::where('category_id', $category->id)
                                ->orderBy('id', 'DESC')
                                ->get();
                        @endphp
                        @forelse ($catwiseProduct as $product)
                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image">
                                            @if (session()->get('language') == 'bangla')
                                                <a href="{{ route('product-details',['id'=>$product->id,'slug'=>$product->product_slug_bn]) }}"><img  src="{{asset($product->product_thumbnail)}}" alt=""></a>
                                            @else
                                                <a href="{{ route('product-details',['id'=>$product->id,'slug'=>$product->product_slug_bn]) }}"><img  src="{{asset($product->product_thumbnail)}}" alt=""></a>
                                            @endif
                                        </div><!-- /.image -->
                                        @php
                                            $amount = (int)$product->selling_price - (int)$product->discount_price;
                                            $discount = ($amount/$product->selling_price) * 100;
                                        @endphp
                                        <div class="tag new">
                                            @if ($product->discount_price == null)
                                                <span>@if (session()->get('language') == 'bangla') নতুন @else new @endif </span>
                                            @else
                                            @if (session()->get('language') == 'bangla')
                                                {{ bn_price(round($discount)) }}% @else {{ round($discount) }}% @endif
                                            @endif
                                        </div>
                                    </div><!-- /.product-image -->
                                    <div class="product-info text-left">
                                        <h3 class="name">
                                            @if (session()->get('language') == 'bangla')
                                                <a href="{{ route('product-details',['id'=>$product->id,'slug'=>$product->product_slug_bn]) }}"> {{ $product->product_name_bn }}</a>
                                            @else
                                                <a href="{{ route('product-details',['id'=>$product->id,'slug'=>$product->product_slug_bn]) }}"> {{ $product->product_name_en }}</a>
                                            @endif
                                        </h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>

                                        <div class="product-price">
                                            @if ($product->discount_price == null)
                                                @if (session()->get('language') == 'bangla')
                                                    <span class="price">${{ bn_price($product->selling_price) }}	</span>
                                                @else
                                                    <span class="price">${{ $product->selling_price }}	</span>
                                                @endif

                                            @else
                                                @if (session()->get('language') == 'bangla')
                                                <span class="price">${{ bn_price($product->discount_price) }} </span>
                                                    <span class="price-before-discount">${{ bn_price($product->selling_price) }}	</span>
                                                @else
                                                <span class="price">${{ $product->discount_price }} </span>
                                                    <span class="price-before-discount">${{ $product->selling_price }}	</span>
                                                @endif

                                            @endif

                                        </div><!-- /.product-price -->
                                    </div><!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </button>
                                                    <button class="btn btn-primary cart-btn" type="button"> @if (session()->get('language') == 'bangla') কার্টে সংযুক্ত করুন @else Add to cart @endif </button>
                                                </li>
                                                <li class="lnk wishlist">
                                                    <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist">
                                                        <i class="icon fa fa-heart"></i>
                                                    </a>
                                                </li>

                                                <li class="lnk">
                                                    <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare">
                                                        <i class="fa fa-signal" aria-hidden="true"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div><!-- /.action -->
                                    </div><!-- /.cart -->
                                </div><!-- /.product -->
                            </div><!-- /.products -->
                        </div><!-- /.item -->
                        @empty
                            <h5 class="text-danger">
                                @if (session()->get('language') == 'bangla')
                                দুঃখিত কোনো পণ্য পাওয়া যায়নি @else No Product Found @endif
                            </h5>
                        @endforelse
                    </div><!-- /.home-owl-carousel -->
                </div><!-- /.product-slider -->
            </div><!-- /.tab-pane -->
         @endforeach

	</div><!-- /.tab-content -->
</div><!-- /.scroll-tabs -->
<!-- ============================================== SCROLL TABS : END ============================================== -->
			<!-- ============================================== WIDE PRODUCTS ============================================== -->
<div class="wide-banners wow fadeInUp outer-bottom-xs">
	<div class="row">
<div class="col-md-7 col-sm-7">
<div class="wide-banner cnt-strip">
<div class="image">
<img class="img-responsive" src="{{ asset('frontend/assets') }}/images/banners/home-banner1.jpg" alt="">
</div>

</div><!-- /.wide-banner -->
</div><!-- /.col -->
<div class="col-md-5 col-sm-5">
<div class="wide-banner cnt-strip">
<div class="image">
<img class="img-responsive" src="{{ asset('frontend/assets') }}/images/banners/home-banner2.jpg" alt="">
</div>

</div><!-- /.wide-banner -->
</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.wide-banners -->

<!-- ============================================== WIDE PRODUCTS : END ============================================== -->
<!-- ============================================== FEATURED PRODUCTS ============================================== -->
    <section class="section featured-product wow fadeInUp">
        <h3 class="section-title">Featured products</h3>
        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
            @foreach ($featureds as $featuredProduct)
                <div class="item item-carousel">
                    <div class="products">
                        <div class="product">
                            <div class="product-image">
                                <div class="image">
                                    @if (session()->get('language') == 'bangla')
                                        <a href="{{ route('product-details',['id'=>$featuredProduct->id,'slug'=>$featuredProduct->product_slug_bn]) }}"><img  src="{{asset($featuredProduct->product_thumbnail)}}" alt=""></a>
                                    @else
                                        <a href="{{ route('product-details',['id'=>$featuredProduct->id,'slug'=>$featuredProduct->product_slug_en]) }}"><img  src="{{asset($featuredProduct->product_thumbnail)}}" alt=""></a>
                                    @endif
                                </div>
                                <!-- /.image -->
                                <div class="tag hot">
                                    @php
                                        $amount = (int)$featuredProduct->selling_price - (int)$featuredProduct->discount_price;
                                        $discount = ($amount/$featuredProduct->selling_price) * 100;
                                    @endphp
                                    @if ($featuredProduct->discount_price == null)
                                        <span>@if (session()->get('language') == 'bangla') নতুন @else new @endif </span>
                                    @else
                                        @if (session()->get('language') == 'bangla')
                                        {{ bn_price(round($discount)) }}% @else {{ round($discount) }}% @endif
                                    @endif
                                    {{-- <span>hot</span> --}}
                                </div>
                            </div>
                            <!-- /.product-image -->
                            <div class="product-info text-left">
                                <h3 class="name">
                                    @if (session()->get('language') == 'bangla')
                                        <a href="{{ route('product-details',['id'=>$featuredProduct->id,'slug'=>$featuredProduct->product_slug_bn]) }}"> {{ $featuredProduct->product_name_bn }}</a>
                                    @else
                                        <a href="{{ route('product-details',['id'=>$featuredProduct->id,'slug'=>$featuredProduct->product_slug_bn]) }}"> {{ $featuredProduct->product_name_en }}</a>
                                    @endif
                                </h3>
                                <div class="rating rateit-small"></div>
                                <div class="description"></div>

                                <div class="product-price">
                                    @if ($featuredProduct->discount_price == null)
                                        @if (session()->get('language') == 'bangla')
                                            <span class="price">${{ bn_price($featuredProduct->selling_price) }}</span>
                                        @else
                                            <span class="price">${{ $featuredProduct->selling_price }}</span>
                                        @endif

                                    @else
                                        @if (session()->get('language') == 'bangla')
                                        <span class="price">${{ bn_price($featuredProduct->discount_price) }} </span>
                                            <span class="price-before-discount">${{ bn_price($featuredProduct->selling_price) }}</span>
                                        @else
                                        <span class="price">${{ $featuredProduct->discount_price }} </span>
                                            <span class="price-before-discount">${{ $featuredProduct->selling_price }}	</span>
                                        @endif

                                    @endif
                                </div>
                                <!-- /.product-price -->
                            </div>
                            <!-- /.product-info -->
                            <div class="cart clearfix animate-effect">
                                <div class="action">
                                    <ul class="list-unstyled">
                                        <li class="add-cart-button btn-group">
                                            <button class="btn btn-primary icon" id="{{ $featuredProduct->id }}" onclick="productView(this.id)" type="button" data-target="#cartModal" data-toggle="modal">
                                                <i class="fa fa-shopping-cart"></i>
                                            </button>
                                            <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                        </li>

                                        <li class="lnk wishlist">
                                            <a class="add-to-cart" href="detail.html" title="Wishlist">
                                                <i class="icon fa fa-heart"></i>
                                            </a>
                                        </li>

                                        <li class="lnk">
                                            <a class="add-to-cart" href="detail.html" title="Compare">
                                                <i class="fa fa-signal" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /.action -->
                            </div>
                            <!-- /.cart -->
                        </div>
                        <!-- /.product -->
                    </div>
                    <!-- /.products -->
                </div>
            <!-- /.item -->
            @endforeach

        </div>
        <!-- /.home-owl-carousel -->
    </section>
<!-- /.section -->
<!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

<!-- ============================================== skip_product_1 PRODUCTS ============================================== -->
<section class="section featured-product wow fadeInUp">
    <h3 class="section-title">
        @if (session()->get('language') == 'bangla')
            {{ $skip_category_1->category_name_bn }}
        @else
            {{ $skip_category_1->category_name_en }}
        @endif
    </h3>
    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
        @if (count($skip_product_1)>0)


        @foreach ($skip_product_1 as $featuredProduct)
            <div class="item item-carousel">
                <div class="products">
                    <div class="product">
                        <div class="product-image">
                            <div class="image">
                                @if (session()->get('language') == 'bangla')
                                    <a href="{{ route('product-details',['id'=>$featuredProduct->id,'slug'=>$featuredProduct->product_slug_bn]) }}"><img  src="{{asset($featuredProduct->product_thumbnail)}}" alt=""></a>
                                @else
                                    <a href="{{ route('product-details',['id'=>$featuredProduct->id,'slug'=>$featuredProduct->product_slug_en]) }}"><img  src="{{asset($featuredProduct->product_thumbnail)}}" alt=""></a>
                                @endif
                            </div>
                            <!-- /.image -->
                            <div class="tag hot">
                                @php
                                    $amount = (int)$featuredProduct->selling_price - (int)$featuredProduct->discount_price;
                                    $discount = ($amount/$featuredProduct->selling_price) * 100;
                                @endphp
                                @if ($featuredProduct->discount_price == null)
                                    <span>@if (session()->get('language') == 'bangla') নতুন @else new @endif </span>
                                @else
                                    @if (session()->get('language') == 'bangla')
                                    {{ bn_price(round($discount)) }}% @else {{ round($discount) }}% @endif
                                @endif
                                {{-- <span>hot</span> --}}
                            </div>
                        </div>
                        <!-- /.product-image -->
                        <div class="product-info text-left">
                            <h3 class="name">
                                @if (session()->get('language') == 'bangla')
                                    <a href="{{ route('product-details',['id'=>$featuredProduct->id,'slug'=>$featuredProduct->product_slug_bn]) }}"> {{ $featuredProduct->product_name_bn }}</a>
                                @else
                                    <a href="{{ route('product-details',['id'=>$featuredProduct->id,'slug'=>$featuredProduct->product_slug_bn]) }}"> {{ $featuredProduct->product_name_en }}</a>
                                @endif
                            </h3>
                            <div class="rating rateit-small"></div>
                            <div class="description"></div>

                            <div class="product-price">
                                @if ($featuredProduct->discount_price == null)
                                    @if (session()->get('language') == 'bangla')
                                        <span class="price">${{ bn_price($featuredProduct->selling_price) }}</span>
                                    @else
                                        <span class="price">${{ $featuredProduct->selling_price }}</span>
                                    @endif

                                @else
                                    @if (session()->get('language') == 'bangla')
                                    <span class="price">${{ bn_price($featuredProduct->discount_price) }} </span>
                                        <span class="price-before-discount">${{ bn_price($featuredProduct->selling_price) }}</span>
                                    @else
                                    <span class="price">${{ $featuredProduct->discount_price }} </span>
                                        <span class="price-before-discount">${{ $featuredProduct->selling_price }}	</span>
                                    @endif

                                @endif
                            </div>
                            <!-- /.product-price -->
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                            <div class="action">
                                <ul class="list-unstyled">
                                    <li class="add-cart-button btn-group">
                                        <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                            <i class="fa fa-shopping-cart"></i>
                                        </button>
                                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                    </li>

                                    <li class="lnk wishlist">
                                        <a class="add-to-cart" href="detail.html" title="Wishlist">
                                            <i class="icon fa fa-heart"></i>
                                        </a>
                                    </li>

                                    <li class="lnk">
                                        <a class="add-to-cart" href="detail.html" title="Compare">
                                            <i class="fa fa-signal" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.action -->
                        </div>
                        <!-- /.cart -->
                    </div>
                    <!-- /.product -->
                </div>
                <!-- /.products -->
            </div>
        <!-- /.item -->
        @endforeach
        @endif

    </div>
    <!-- /.home-owl-carousel -->
</section>
<!-- /.section -->
<!-- ============================================== skip_product_1 : END ============================================== -->

<!-- ============================================== skip Brand _product_1 PRODUCTS ============================================== -->
<section class="section featured-product wow fadeInUp">
    <h3 class="section-title">
        @if (session()->get('language') == 'bangla')
            {{ $skip_brand_1->brand_name_bn }}
        @else
            {{ $skip_brand_1->brand_name_en }}
        @endif
    </h3>
    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
        @foreach ($skip_brand_product_1 as $featuredProduct)
            <div class="item item-carousel">
                <div class="products">
                    <div class="product">
                        <div class="product-image">
                            <div class="image">
                                @if (session()->get('language') == 'bangla')
                                    <a href="{{ route('product-details',['id'=>$featuredProduct->id,'slug'=>$featuredProduct->product_slug_bn]) }}"><img  src="{{asset($featuredProduct->product_thumbnail)}}" alt=""></a>
                                @else
                                    <a href="{{ route('product-details',['id'=>$featuredProduct->id,'slug'=>$featuredProduct->product_slug_en]) }}"><img  src="{{asset($featuredProduct->product_thumbnail)}}" alt=""></a>
                                @endif
                            </div>
                            <!-- /.image -->
                            <div class="tag hot">
                                @php
                                    $amount = (int)$featuredProduct->selling_price - (int)$featuredProduct->discount_price;
                                    $discount = ($amount/$featuredProduct->selling_price) * 100;
                                @endphp
                                @if ($featuredProduct->discount_price == null)
                                    <span>@if (session()->get('language') == 'bangla') নতুন @else new @endif </span>
                                @else
                                    @if (session()->get('language') == 'bangla')
                                    {{ bn_price(round($discount)) }}% @else {{ round($discount) }}% @endif
                                @endif
                                {{-- <span>hot</span> --}}
                            </div>
                        </div>
                        <!-- /.product-image -->
                        <div class="product-info text-left">
                            <h3 class="name">
                                @if (session()->get('language') == 'bangla')
                                    <a href="{{ route('product-details',['id'=>$featuredProduct->id,'slug'=>$featuredProduct->product_slug_bn]) }}"> {{ $featuredProduct->product_name_bn }}</a>
                                @else
                                    <a href="{{ route('product-details',['id'=>$featuredProduct->id,'slug'=>$featuredProduct->product_slug_bn]) }}"> {{ $featuredProduct->product_name_en }}</a>
                                @endif
                            </h3>
                            <div class="rating rateit-small"></div>
                            <div class="description"></div>

                            <div class="product-price">
                                @if ($featuredProduct->discount_price == null)
                                    @if (session()->get('language') == 'bangla')
                                        <span class="price">${{ bn_price($featuredProduct->selling_price) }}</span>
                                    @else
                                        <span class="price">${{ $featuredProduct->selling_price }}</span>
                                    @endif

                                @else
                                    @if (session()->get('language') == 'bangla')
                                    <span class="price">${{ bn_price($featuredProduct->discount_price) }} </span>
                                        <span class="price-before-discount">${{ bn_price($featuredProduct->selling_price) }}</span>
                                    @else
                                    <span class="price">${{ $featuredProduct->discount_price }} </span>
                                        <span class="price-before-discount">${{ $featuredProduct->selling_price }}	</span>
                                    @endif

                                @endif
                            </div>
                            <!-- /.product-price -->
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                            <div class="action">
                                <ul class="list-unstyled">
                                    <li class="add-cart-button btn-group">
                                        <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                            <i class="fa fa-shopping-cart"></i>
                                        </button>
                                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                    </li>

                                    <li class="lnk wishlist">
                                        <a class="add-to-cart" href="detail.html" title="Wishlist">
                                            <i class="icon fa fa-heart"></i>
                                        </a>
                                    </li>

                                    <li class="lnk">
                                        <a class="add-to-cart" href="detail.html" title="Compare">
                                            <i class="fa fa-signal" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.action -->
                        </div>
                        <!-- /.cart -->
                    </div>
                    <!-- /.product -->
                </div>
                <!-- /.products -->
            </div>
        <!-- /.item -->
        @endforeach

    </div>
    <!-- /.home-owl-carousel -->
</section>
<!-- /.section -->
<!-- ============================================== skip_Brand product_1 : END ============================================== -->



<!-- ============================================== WIDE PRODUCTS ============================================== -->
<div class="wide-banners wow fadeInUp outer-bottom-xs">
	<div class="row">

		<div class="col-md-12">
			<div class="wide-banner cnt-strip">
				<div class="image">
					<img class="img-responsive" src="{{ asset('frontend/assets') }}/images/banners/home-banner.jpg" alt="">
				</div>
				<div class="strip strip-text">
					<div class="strip-inner">
						<h2 class="text-right">New Mens Fashion<br>
						<span class="shopping-needs">Save up to 40% off</span></h2>
					</div>
				</div>
				<div class="new-label">
				    <div class="text">NEW</div>
				</div><!-- /.new-label -->
			</div><!-- /.wide-banner -->
		</div><!-- /.col -->

	</div><!-- /.row -->
</div><!-- /.wide-banners -->
<!-- ============================================== WIDE PRODUCTS : END ============================================== -->
			<!-- ============================================== BEST SELLER ============================================== -->

<div class="best-deal wow fadeInUp outer-bottom-xs">
	<h3 class="section-title">Best seller</h3>
	<div class="sidebar-widget-body outer-top-xs">
		<div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
	        	        <div class="item">
	        	<div class="products best-product">
		        							<div class="product">
							<div class="product-micro">
	<div class="row product-micro-row">
		<div class="col col-xs-5">
			<div class="product-image">
				<div class="image">
					<a href="#">
						<img src="{{asset('frontend')}}/assets/images/products/p20.jpg" alt="">
					</a>
				</div><!-- /.image -->



								</div><!-- /.product-image -->
		</div><!-- /.col -->
		<div class="col2 col-xs-7">
			<div class="product-info">
				<h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
				<div class="rating rateit-small"></div>
				<div class="product-price">
				<span class="price">
					$450.99				</span>

			</div><!-- /.product-price -->

			</div>
		</div><!-- /.col -->
	</div><!-- /.product-micro-row -->
</div><!-- /.product-micro -->

						</div>
		        							<div class="product">
							<div class="product-micro">
	<div class="row product-micro-row">
		<div class="col col-xs-5">
			<div class="product-image">
				<div class="image">
					<a href="#">
						<img src="{{asset('frontend')}}/assets/images/products/p21.jpg" alt="">
					</a>
				</div><!-- /.image -->


								</div><!-- /.product-image -->
		</div><!-- /.col -->
		<div class="col2 col-xs-7">
			<div class="product-info">
				<h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
				<div class="rating rateit-small"></div>
				<div class="product-price">
				<span class="price">
					$450.99				</span>

			</div><!-- /.product-price -->

			</div>
		</div><!-- /.col -->
	</div><!-- /.product-micro-row -->
</div><!-- /.product-micro -->

						</div>
		        		        	</div>
	        </div>
	    		        <div class="item">
	        	<div class="products best-product">
		        							<div class="product">
							<div class="product-micro">
	<div class="row product-micro-row">
		<div class="col col-xs-5">
			<div class="product-image">
				<div class="image">
					<a href="#">
						<img src="{{asset('frontend')}}/assets/images/products/p22.jpg" alt="">
					</a>
				</div><!-- /.image -->


								</div><!-- /.product-image -->
		</div><!-- /.col -->
		<div class="col2 col-xs-7">
			<div class="product-info">
				<h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
				<div class="rating rateit-small"></div>
				<div class="product-price">
				<span class="price">
					$450.99				</span>

			</div><!-- /.product-price -->

			</div>
		</div><!-- /.col -->
	</div><!-- /.product-micro-row -->
</div><!-- /.product-micro -->

						</div>
		        							<div class="product">
							<div class="product-micro">
	<div class="row product-micro-row">
		<div class="col col-xs-5">
			<div class="product-image">
				<div class="image">
					<a href="#">
						<img src="{{asset('frontend')}}/assets/images/products/p23.jpg" alt="">
						</a>
				</div><!-- /.image -->



								</div><!-- /.product-image -->
		</div><!-- /.col -->
		<div class="col2 col-xs-7">
			<div class="product-info">
				<h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
				<div class="rating rateit-small"></div>
				<div class="product-price">
				<span class="price">
					$450.99				</span>

			</div><!-- /.product-price -->

			</div>
		</div><!-- /.col -->
	</div><!-- /.product-micro-row -->
</div><!-- /.product-micro -->

						</div>
		        		        	</div>
	        </div>
	    		        <div class="item">
	        	<div class="products best-product">
		        							<div class="product">
							<div class="product-micro">
	<div class="row product-micro-row">
		<div class="col col-xs-5">
			<div class="product-image">
				<div class="image">
					<a href="#">
						<img src="{{asset('frontend')}}/assets/images/products/p24.jpg" alt="">
					</a>
				</div><!-- /.image -->



								</div><!-- /.product-image -->
		</div><!-- /.col -->
		<div class="col2 col-xs-7">
			<div class="product-info">
				<h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
				<div class="rating rateit-small"></div>
				<div class="product-price">
				<span class="price">
					$450.99				</span>

			</div><!-- /.product-price -->

			</div>
		</div><!-- /.col -->
	</div><!-- /.product-micro-row -->
</div><!-- /.product-micro -->

						</div>
		        							<div class="product">
							<div class="product-micro">
	<div class="row product-micro-row">
		<div class="col col-xs-5">
			<div class="product-image">
				<div class="image">
					<a href="#">
						<img src="{{asset('frontend')}}/assets/images/products/p25.jpg" alt="">
					</a>
				</div><!-- /.image -->


								</div><!-- /.product-image -->
		</div><!-- /.col -->
		<div class="col2 col-xs-7">
			<div class="product-info">
				<h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
				<div class="rating rateit-small"></div>
				<div class="product-price">
				<span class="price">
					$450.99				</span>

			</div><!-- /.product-price -->

			</div>
		</div><!-- /.col -->
	</div><!-- /.product-micro-row -->
</div><!-- /.product-micro -->

						</div>
		        		        	</div>
	        </div>
	    		        <div class="item">
	        	<div class="products best-product">
		        							<div class="product">
							<div class="product-micro">
	<div class="row product-micro-row">
		<div class="col col-xs-5">
			<div class="product-image">
				<div class="image">
					<a href="#">
						<img src="{{asset('frontend')}}/assets/images/products/p26.jpg" alt="">
								</a>
				</div><!-- /.image -->



								</div><!-- /.product-image -->
		</div><!-- /.col -->
		<div class="col2 col-xs-7">
			<div class="product-info">
				<h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
				<div class="rating rateit-small"></div>
				<div class="product-price">
				<span class="price">
					$450.99				</span>

			</div><!-- /.product-price -->

			</div>
		</div><!-- /.col -->
	</div><!-- /.product-micro-row -->
</div><!-- /.product-micro -->

						</div>
		        							<div class="product">
							<div class="product-micro">
	<div class="row product-micro-row">
		<div class="col col-xs-5">
			<div class="product-image">
				<div class="image">
					<a href="#">
						<img src="{{asset('frontend')}}/assets/images/products/p27.jpg" alt="">
					</a>
				</div><!-- /.image -->


								</div><!-- /.product-image -->
		</div><!-- /.col -->
		<div class="col2 col-xs-7">
			<div class="product-info">
				<h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
				<div class="rating rateit-small"></div>
				<div class="product-price">
				<span class="price">
					$450.99				</span>

			</div><!-- /.product-price -->

			</div>
		</div><!-- /.col -->
	</div><!-- /.product-micro-row -->
</div><!-- /.product-micro -->

						</div>
		        		        	</div>
	        </div>
	    		    </div>
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
<!-- ============================================== BEST SELLER : END ============================================== -->

			<!-- ============================================== BLOG SLIDER ============================================== -->
<section class="section latest-blog outer-bottom-vs wow fadeInUp">
	<h3 class="section-title">latest form blog</h3>
	<div class="blog-slider-container outer-top-xs">
		<div class="owl-carousel blog-slider custom-carousel">

				<div class="item">
					<div class="blog-post">
						<div class="blog-post-image">
							<div class="image">
								<a href="blog.html"><img src="{{asset('frontend')}}/assets/images/blog-post/post1.jpg" alt=""></a>
							</div>
						</div><!-- /.blog-post-image -->


						<div class="blog-post-info text-left">
							<h3 class="name"><a href="#">Voluptatem accusantium doloremque laudantium</a></h3>
							<span class="info">By Jone Doe &nbsp;|&nbsp; 21 March 2016 </span>
							<p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
							<a href="#" class="lnk btn btn-primary">Read more</a>
						</div><!-- /.blog-post-info -->


					</div><!-- /.blog-post -->
				</div><!-- /.item -->


				<div class="item">
					<div class="blog-post">
						<div class="blog-post-image">
							<div class="image">
								<a href="blog.html"><img src="{{asset('frontend')}}/assets/images/blog-post/post2.jpg" alt=""></a>
							</div>
						</div><!-- /.blog-post-image -->


						<div class="blog-post-info text-left">
							<h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
							<span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
							<p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
							<a href="#" class="lnk btn btn-primary">Read more</a>
						</div><!-- /.blog-post-info -->


					</div><!-- /.blog-post -->
				</div><!-- /.item -->


				<!-- /.item -->


				<div class="item">
					<div class="blog-post">
						<div class="blog-post-image">
							<div class="image">
								<a href="blog.html"><img src="{{asset('frontend')}}/assets/images/blog-post/post1.jpg" alt=""></a>
							</div>
						</div><!-- /.blog-post-image -->


						<div class="blog-post-info text-left">
							<h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
							<span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
							<p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
							<a href="#" class="lnk btn btn-primary">Read more</a>
						</div><!-- /.blog-post-info -->


					</div><!-- /.blog-post -->
				</div><!-- /.item -->


				<div class="item">
					<div class="blog-post">
						<div class="blog-post-image">
							<div class="image">
								<a href="blog.html"><img src="{{asset('frontend')}}/assets/images/blog-post/post2.jpg" alt=""></a>
							</div>
						</div><!-- /.blog-post-image -->


						<div class="blog-post-info text-left">
						<h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
							<span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
							<p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
							<a href="#" class="lnk btn btn-primary">Read more</a>
						</div><!-- /.blog-post-info -->


					</div><!-- /.blog-post -->
				</div><!-- /.item -->


				<div class="item">
					<div class="blog-post">
						<div class="blog-post-image">
							<div class="image">
								<a href="blog.html"><img src="{{asset('frontend')}}/assets/images/blog-post/post1.jpg" alt=""></a>
							</div>
						</div><!-- /.blog-post-image -->


						<div class="blog-post-info text-left">
							<h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
							<span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
							<p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
							<a href="#" class="lnk btn btn-primary">Read more</a>
						</div><!-- /.blog-post-info -->


					</div><!-- /.blog-post -->
				</div><!-- /.item -->


		</div><!-- /.owl-carousel -->
	</div><!-- /.blog-slider-container -->
</section><!-- /.section -->
<!-- ============================================== BLOG SLIDER : END ============================================== -->

			<!-- ============================================== FEATURED PRODUCTS ============================================== -->
<section class="section wow fadeInUp new-arriavls">
	<h3 class="section-title">New Arrivals</h3>
	<div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

		<div class="item item-carousel">
			<div class="products">

	<div class="product">
		<div class="product-image">
			<div class="image">
				<a href="detail.html"><img  src="{{asset('frontend')}}/assets/images/products/p19.jpg" alt=""></a>
			</div><!-- /.image -->

			<div class="tag new"><span>new</span></div>
		</div><!-- /.product-image -->


		<div class="product-info text-left">
			<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>

			<div class="product-price">
				<span class="price">
					$450.99				</span>
										     <span class="price-before-discount">$ 800</span>

			</div><!-- /.product-price -->

		</div><!-- /.product-info -->
					<div class="cart clearfix animate-effect">
				<div class="action">
					<ul class="list-unstyled">
						<li class="add-cart-button btn-group">
							<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
								<i class="fa fa-shopping-cart"></i>
							</button>
							<button class="btn btn-primary cart-btn" type="button">Add to cart</button>

						</li>

		                <li class="lnk wishlist">
							<a class="add-to-cart" href="detail.html" title="Wishlist">
								 <i class="icon fa fa-heart"></i>
							</a>
						</li>

						<li class="lnk">
							<a class="add-to-cart" href="detail.html" title="Compare">
							    <i class="fa fa-signal" aria-hidden="true"></i>
							</a>
						</li>
					</ul>
				</div><!-- /.action -->
			</div><!-- /.cart -->
			</div><!-- /.product -->

			</div><!-- /.products -->
		</div><!-- /.item -->

		<div class="item item-carousel">
			<div class="products">

	<div class="product">
		<div class="product-image">
			<div class="image">
				<a href="detail.html"><img  src="{{asset('frontend')}}/assets/images/products/p28.jpg" alt=""></a>
			</div><!-- /.image -->

			<div class="tag new"><span>new</span></div>
		</div><!-- /.product-image -->


		<div class="product-info text-left">
			<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>

			<div class="product-price">
				<span class="price">
					$450.99				</span>
										     <span class="price-before-discount">$ 800</span>

			</div><!-- /.product-price -->

		</div><!-- /.product-info -->
					<div class="cart clearfix animate-effect">
				<div class="action">
					<ul class="list-unstyled">
						<li class="add-cart-button btn-group">
							<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
								<i class="fa fa-shopping-cart"></i>
							</button>
							<button class="btn btn-primary cart-btn" type="button">Add to cart</button>

						</li>

		                <li class="lnk wishlist">
							<a class="add-to-cart" href="detail.html" title="Wishlist">
								 <i class="icon fa fa-heart"></i>
							</a>
						</li>

						<li class="lnk">
							<a class="add-to-cart" href="detail.html" title="Compare">
							    <i class="fa fa-signal" aria-hidden="true"></i>
							</a>
						</li>
					</ul>
				</div><!-- /.action -->
			</div><!-- /.cart -->
			</div><!-- /.product -->

			</div><!-- /.products -->
		</div><!-- /.item -->

		<div class="item item-carousel">
			<div class="products">

	<div class="product">
		<div class="product-image">
			<div class="image">
				<a href="detail.html"><img  src="{{asset('frontend')}}/assets/images/products/p30.jpg" alt=""></a>
			</div><!-- /.image -->

			                        <div class="tag hot"><span>hot</span></div>
		</div><!-- /.product-image -->


		<div class="product-info text-left">
			<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>

			<div class="product-price">
				<span class="price">
					$450.99				</span>
										     <span class="price-before-discount">$ 800</span>

			</div><!-- /.product-price -->

		</div><!-- /.product-info -->
					<div class="cart clearfix animate-effect">
				<div class="action">
					<ul class="list-unstyled">
						<li class="add-cart-button btn-group">
							<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
								<i class="fa fa-shopping-cart"></i>
							</button>
							<button class="btn btn-primary cart-btn" type="button">Add to cart</button>

						</li>

		                <li class="lnk wishlist">
							<a class="add-to-cart" href="detail.html" title="Wishlist">
								 <i class="icon fa fa-heart"></i>
							</a>
						</li>

						<li class="lnk">
							<a class="add-to-cart" href="detail.html" title="Compare">
							    <i class="fa fa-signal" aria-hidden="true"></i>
							</a>
						</li>
					</ul>
				</div><!-- /.action -->
			</div><!-- /.cart -->
			</div><!-- /.product -->

			</div><!-- /.products -->
		</div><!-- /.item -->

		<div class="item item-carousel">
			<div class="products">

	<div class="product">
		<div class="product-image">
			<div class="image">
				<a href="detail.html"><img  src="{{asset('frontend')}}/assets/images/products/p1.jpg" alt=""></a>
			</div><!-- /.image -->

			                        <div class="tag hot"><span>hot</span></div>
		</div><!-- /.product-image -->


		<div class="product-info text-left">
			<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>

			<div class="product-price">
				<span class="price">
					$450.99				</span>
										     <span class="price-before-discount">$ 800</span>

			</div><!-- /.product-price -->

		</div><!-- /.product-info -->
					<div class="cart clearfix animate-effect">
				<div class="action">
					<ul class="list-unstyled">
						<li class="add-cart-button btn-group">
							<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
								<i class="fa fa-shopping-cart"></i>
							</button>
							<button class="btn btn-primary cart-btn" type="button">Add to cart</button>

						</li>

		                <li class="lnk wishlist">
							<a class="add-to-cart" href="detail.html" title="Wishlist">
								 <i class="icon fa fa-heart"></i>
							</a>
						</li>

						<li class="lnk">
							<a class="add-to-cart" href="detail.html" title="Compare">
							    <i class="fa fa-signal" aria-hidden="true"></i>
							</a>
						</li>
					</ul>
				</div><!-- /.action -->
			</div><!-- /.cart -->
			</div><!-- /.product -->

			</div><!-- /.products -->
		</div><!-- /.item -->

		<div class="item item-carousel">
			<div class="products">

	<div class="product">
		<div class="product-image">
			<div class="image">
				<a href="detail.html"><img  src="{{asset('frontend')}}/assets/images/products/p2.jpg" alt=""></a>
			</div><!-- /.image -->

			            <div class="tag sale"><span>sale</span></div>
		</div><!-- /.product-image -->


		<div class="product-info text-left">
			<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>

			<div class="product-price">
				<span class="price">
					$450.99				</span>
										     <span class="price-before-discount">$ 800</span>

			</div><!-- /.product-price -->

		</div><!-- /.product-info -->
					<div class="cart clearfix animate-effect">
				<div class="action">
					<ul class="list-unstyled">
						<li class="add-cart-button btn-group">
							<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
								<i class="fa fa-shopping-cart"></i>
							</button>
							<button class="btn btn-primary cart-btn" type="button">Add to cart</button>

						</li>

		                <li class="lnk wishlist">
							<a class="add-to-cart" href="detail.html" title="Wishlist">
								 <i class="icon fa fa-heart"></i>
							</a>
						</li>

						<li class="lnk">
							<a class="add-to-cart" href="detail.html" title="Compare">
							    <i class="fa fa-signal" aria-hidden="true"></i>
							</a>
						</li>
					</ul>
				</div><!-- /.action -->
			</div><!-- /.cart -->
			</div><!-- /.product -->

			</div><!-- /.products -->
		</div><!-- /.item -->

		<div class="item item-carousel">
			<div class="products">

	<div class="product">
		<div class="product-image">
			<div class="image">
				<a href="detail.html"><img  src="{{asset('frontend')}}/assets/images/products/p3.jpg" alt=""></a>
			</div><!-- /.image -->

			            <div class="tag sale"><span>sale</span></div>
		</div><!-- /.product-image -->


		<div class="product-info text-left">
			<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>

			<div class="product-price">
				<span class="price">
					$450.99				</span>
										     <span class="price-before-discount">$ 800</span>

			</div><!-- /.product-price -->

		</div><!-- /.product-info -->
					<div class="cart clearfix animate-effect">
				<div class="action">
					<ul class="list-unstyled">
						<li class="add-cart-button btn-group">
							<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
								<i class="fa fa-shopping-cart"></i>
							</button>
							<button class="btn btn-primary cart-btn" type="button">Add to cart</button>

						</li>

		                <li class="lnk wishlist">
							<a class="add-to-cart" href="detail.html" title="Wishlist">
								 <i class="icon fa fa-heart"></i>
							</a>
						</li>

						<li class="lnk">
							<a class="add-to-cart" href="detail.html" title="Compare">
							    <i class="fa fa-signal" aria-hidden="true"></i>
							</a>
						</li>
					</ul>
				</div><!-- /.action -->
			</div><!-- /.cart -->
			</div><!-- /.product -->

			</div><!-- /.products -->
		</div><!-- /.item -->
			</div><!-- /.home-owl-carousel -->
</section><!-- /.section -->
<!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

		</div><!-- /.homebanner-holder -->
		<!-- ============================================== CONTENT : END ============================================== -->
	</div><!-- /.row -->
@endsection
