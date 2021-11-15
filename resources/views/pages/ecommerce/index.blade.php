@extends("pages.ecommerce.layout.index")

@section('head')

<title>{{$merchant->name}}</title>

<link href="/css/prod/ecommerce/cms.min.css{{ config('app.link_version') }}" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="/js/prod/ecommerce/cms.min.js{{ config('app.link_version') }}"></script>

@endsection

@section('content')

 <!-- Content section -->
 <div class="content">
    <div class='container'>
        <div class='row'>
            <div class='col-12 wow fadeInUp' data-wow-duration="0.5s" data-wow-delay="0.3s">
                <section class='banner-section position-relative wow fadeInUp' data-wow-duration="1s"
                    data-wow-delay="0.3s">
                    <div class='row'>
                        <div class='col-12'>
                            <div class="banner-slick">
                                <div class='banner-image'
                                    style="background: url('/img/picture/demo1.jpg')">
                                </div>

                                <div class='banner-image'
                                    style="background: url('/img/picture/demo2.jpg')">
                                </div>

                                <div class='banner-image'
                                    style="background: url('/img/picture/demo3.jpg')">
                                </div>

                                <div class='banner-image'
                                    style="background: url('/img/picture/demo4.jpg')">
                                </div>

                                <div class='banner-image'>
                                    <video autoplay loop muted defaultMuted playsinline
                                        oncontextmenu="return false;" preload="auto">
                                        <source
                                            src="/img/picture/demo_video.mp4">
                                    </video>
                                </div>
                            </div>
                        </div>
                        <div class='dropfilter'></div>
                        <div class='cover-content col-12 d-flex flex-column justify-content-center'>
                            <div class=' pl-5  width-60'>
                                <h1> Welcome to the {{$merchant->name}} </h1>
                                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <a   class='under-development' data-title='Page Block' data-desc='This section is the content prepared by the merchant through the merchant dashboard Page Builder.'>
                                    <button class='btn btn-primary mt-3'>Learn More</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class='col-12 wow fadeInUp' data-wow-duration="0.5s" data-wow-delay="0.3s">
                <div class='d-flex align-items-left flex-column cms-section text-left '>
                    <hr class='theme-line ml-0 mb-4' style='width:50px;' />
                    <p class='width-60' style="margin:auto; margin-left:0;">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                </div>
            </div>
            <div class='col-12 wow fadeInUp' data-wow-duration="0.5s" data-wow-delay="0.3s">
                <div class='cms-section'>
                    <div class='row'>
                        <div class='col-sm-6 col-md-4 mb-3'>
                            <div class='highlight_d picture-box flex-column d-flex justify-content-center align-items-left text-left'
                                style="background:url('/img/picture/demos1.jpg')">
                                <div class='dropfilter'></div>
                                <div class='row highlight_d_content'>
                                    <div class='col-12 pl-5 highlight_d_col_text'>
                                        <h1> one.two.free!</h1>
                                        <p class='width-60 mb-3' style="margin:auto; margin-left:0;"> We know what
                                            your skin wants, and we are all your skin need. Get the whole new series
                                            for only $99.90. </p>
                                        <a  class='under-development' data-title='Page Block' data-desc='This section is the content prepared by the merchant through the merchant dashboard Page Builder.'>
                                            <button class='btn btn-primary mt-3'>Learn More</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='col-sm-6 col-md-4 mb-3'>
                            <div class='highlight_d picture-box flex-column d-flex justify-content-center align-items-left text-left'
                                style="background:url('/img/picture/demos2.jpg')">
                                <div class='dropfilter'></div>
                                <div class='row highlight_d_content'>
                                    <div class='col-12 pl-5 highlight_d_col_text'>
                                        <h1> one.two.free!</h1>
                                        <p class='width-60 mb-3' style="margin:auto; margin-left:0;"> We know what
                                            your skin wants, and we are all your skin need. Get the whole new series
                                            for only $99.90. </p>
                                        <a  class='under-development' data-title='Page Block' data-desc='This section is the content prepared by the merchant through the merchant dashboard Page Builder.'>
                                            <button class='btn btn-primary mt-3'>Learn More</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='col-sm-6 col-md-4 mb-3'>
                            <div class='highlight_d picture-box flex-column d-flex justify-content-center align-items-left text-left'
                                style="background:url('/img/picture/demos3.jpg')">
                                <div class='dropfilter'></div>
                                <div class='row highlight_d_content'>
                                    <div class='col-12 pl-5 highlight_d_col_text'>
                                        <h1> one.two.free!</h1>
                                        <p class='width-60 mb-3' style="margin:auto; margin-left:0;"> We know what
                                            your skin wants, and we are all your skin need. Get the whole new series
                                            for only $99.90. </p>
                                        <a  class='under-development' data-title='Page Block' data-desc='This section is the content prepared by the merchant through the merchant dashboard Page Builder.'>
                                            <button class='btn btn-primary mt-3'>Learn More</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='col-sm-6 col-md-4 mb-3'>
                            <div class='highlight_d picture-box flex-column d-flex justify-content-center align-items-left text-left'
                                style="background:url('/img/picture/demos4.jpg')">
                                <div class='dropfilter'></div>
                                <div class='row highlight_d_content'>
                                    <div class='col-12 pl-5 highlight_d_col_text'>
                                        <h1> one.two.free!</h1>
                                        <p class='width-60 mb-3' style="margin:auto; margin-left:0;"> We know what
                                            your skin wants, and we are all your skin need. Get the whole new series
                                            for only $99.90. </p>
                                        <a  class='under-development' data-title='Page Block' data-desc='This section is the content prepared by the merchant through the merchant dashboard Page Builder.'>
                                            <button class='btn btn-primary mt-3'>Learn More</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='col-sm-6 col-md-4 mb-3'>
                            <div class='highlight_d picture-box flex-column d-flex justify-content-center align-items-left text-left'
                                style="background:url('/img/picture/demos5.png')">
                                <div class='dropfilter'></div>
                                <div class='row highlight_d_content'>
                                    <div class='col-12 pl-5 highlight_d_col_text'>
                                        <h1> one.two.free!</h1>
                                        <p class='width-60 mb-3' style="margin:auto; margin-left:0;"> We know what
                                            your skin wants, and we are all your skin need. Get the whole new series
                                            for only $99.90. </p>
                                        <a  class='under-development' data-title='Page Block' data-desc='This section is the content prepared by the merchant through the merchant dashboard Page Builder.'>
                                            <button class='btn btn-primary mt-3'>Learn More</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='col-sm-6 col-md-4 mb-3'>
                            <div class='highlight_d picture-box flex-column d-flex justify-content-center align-items-left text-left'
                                style="background:url('/img/picture/demos6.jpg')">
                                <div class='dropfilter'></div>
                                <div class='row highlight_d_content'>
                                    <div class='col-12 pl-5 highlight_d_col_text'>
                                        <h1> one.two.free!</h1>
                                        <p class='width-60 mb-3' style="margin:auto; margin-left:0;"> We know what
                                            your skin wants, and we are all your skin need. Get the whole new series
                                            for only $99.90. </p>
                                        <a  class='under-development' data-title='Page Block' data-desc='This section is the content prepared by the merchant through the merchant dashboard Page Builder.'>
                                            <button class='btn btn-primary mt-3'>Learn More</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class='col-12 wow fadeInUp' data-wow-duration="0.5s" data-wow-delay="0.3s">
                <div class='d-flex align-items-right flex-column cms-section text-right '>

                    <hr class='theme-line mr-0 mb-4' style='width:50px;' />
                    <p class='width-60' style="margin:auto; margin-right:0;">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
                    </p>

                </div>
            </div>
            <div class='col-12 wow fadeInUp' data-wow-duration="0.5s" data-wow-delay="0.3s">
                <div class='cms-section row'>
                    <div class='col-sm-12'>
                        <h3 class='mb-1'> Featured Product </h3>
                        <small class='opacity-7'> A Moments of Healthy Juice. </small>
                    </div>
                    <div class='col-sm-12'>
                        <div class='row product_a mt-4 hover-container'>

                            <div class='col-sm-4 product-item hover-item'>
                                <a href="/product/clothes22">
                                    <div class='product-item text-left'>
                                        <span class='new-label'> SALE</span>

                                        <div class='picture-box mb-3 position-relative'
                                            style="background:url('/img/picture/demo2.jpg')">
                                        </div>
                                        <p class='mb-1'> <b> Makeup Premium </b> </p>
                                        <p class='opacity-8 product-price' data-total='1.00'> $ 1.00 </p>
                                    </div>
                                </a>

                            </div>

                            <div class='col-sm-4 product-item hover-item'>
                                <a href="/product/MakeupFoundation">
                                    <div class='product-item text-left'>

                                        <div class='picture-box mb-3 position-relative'
                                            style="background:url('/img/picture/demo1.jpg')">
                                        </div>
                                        <p class='mb-1'> <b> Makeup Foundation </b> </p>
                                        <p class='price product-price' data-total='161.5'> <span
                                                class='discountedPrice'>$ 161.50 <span class='strikePrice'>$190.00</span> </span> </p>
                                    </div>
                                </a>

                            </div>

                            <div class='col-sm-4 product-item hover-item'>
                                <a href="/product/Skincareset11">
                                    <div class='product-item text-left'>

                                        <div class='picture-box mb-3 position-relative'
                                            style="background:url('/img/picture/skin1.jpg')">
                                        </div>
                                        <p class='mb-1'> <b> Skin Care Set </b> </p>
                                        <p class='opacity-8 product-price' data-total='120.00'> $120.00 </p>
                                    </div>
                                </a>

                            </div>

                            <div class='col-sm-4 product-item hover-item'>
                                <a href="/product/Shirt">
                                    <div class='product-item text-left'>
                                        <span class='new-label'> SALE</span>

                                        <div class='picture-box mb-3 position-relative'
                                            style="background:url('/img/picture/skin2.jpg')">
                                        </div>
                                        <p class='mb-1'> <b> Cloud Skincare Set </b> </p>
                                        <p class='opacity-8 product-price' data-total='0.01'> $ 0.01 </p>
                                    </div>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class='col-12 wow fadeInUp' data-wow-duration="0.5s" data-wow-delay="0.3s">
                <div class='cms-section row'>

                    <div class='col-sm-12 text-center'>
                        <h3 class='mb-1'> All Category </h3>
                        <small class='opacity-7'> Browse all of our items below </small>
                    </div>
                    <div class='col-sm-12'>
                        <div class='row category_b mt-4  justify-content-center hover-container'>

                            <div class='col-sm-4 col-md-2 mb-3 category-item text-center hover-item'>
                                <a href='/store#category-43'>
                                    <div class='picture-box mb-3'
                                        style="background:url('/img/picture/demo1.jpg')">
                                    </div>
                                    <p class='mb-1 opacity-8'>Best Seller </p>
                                </a>
                            </div>

                            <div class='col-sm-4 col-md-2 mb-3 category-item text-center hover-item'>
                                <a href='/store#category-20'>
                                    <div class='picture-box mb-3'
                                        style="background:url('/img/picture/demo3.jpg')">
                                    </div>
                                    <p class='mb-1 opacity-8'>Promotion </p>
                                </a>
                            </div>

                            <div class='col-sm-4 col-md-2 mb-3 category-item text-center hover-item'>
                                <a href='/store#category-19'>
                                    <div class='picture-box mb-3'
                                        style="background:url('/img/picture/demo2.jpg')">
                                    </div>
                                    <p class='mb-1 opacity-8'>Unique </p>
                                </a>
                            </div>

                            <div class='col-sm-4 col-md-2 mb-3 category-item text-center hover-item'>
                                <a href='/store#category-15'>
                                    <div class='picture-box mb-3'
                                        style="background:url('/img/picture/category4.jpg')">
                                    </div>
                                    <p class='mb-1 opacity-8'>Premium </p>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class='col-12 wow fadeInUp' data-wow-duration="0.5s" data-wow-delay="0.3s">
                <div class='cms-section row'>
                    <div class='col-sm-12'>
                        <h3 class='mb-1'> Guess You Like </h3>
                        <small class='opacity-7'> Recommended product from the Cloudsite network </small>
                    </div>
                    <div class='col-sm-12'>
                        <div class='row product_a mt-4 hover-container'>

                            <div class='col-sm-4 product-item hover-item'>
                                <a href="/product/clothes22">
                                    <div class='product-item text-left'>
                                        <span class='new-label'> SALE</span>

                                        <div class='picture-box mb-3 position-relative'
                                            style="background:url('/img/picture/cloth1.jpg')">
                                        </div>
                                        <p class='mb-1'> <b> Minimalist Clothes </b> </p>
                                        <p class='opacity-8 product-price' data-total='1.00'> $ 1.00 </p>
                                    </div>
                                </a>

                            </div>

                            <div class='col-sm-4 product-item hover-item'>
                                <a href="/product/Shirt">
                                    <div class='product-item text-left'>
                                        <span class='new-label'> SALE</span>

                                        <div class='picture-box mb-3 position-relative'
                                            style="background:url('/img/picture/v2.jpg')">
                                        </div>
                                        <p class='mb-1'> <b> Cloud's Vitamin C</b> </p>
                                        <p class='opacity-8 product-price' data-total='0.01'> $ 0.01 </p>
                                    </div>
                                </a>

                            </div>
                            <div class='col-sm-4 product-item hover-item'>
                                <a href="/product/MakeupFoundation">
                                    <div class='product-item text-left'>

                                        <div class='picture-box mb-3 position-relative'
                                            style="background:url('/img/picture/cloth2.jpg')">
                                        </div>
                                        <p class='mb-1'> <b> Fashion Clothes </b> </p>
                                        <p class='price product-price' data-total='161.5'> <span
                                                class='discountedPrice'>$ 161.50 <span class='strikePrice'>$190.00</span> </span> </p>
                                    </div>
                                </a>

                            </div>

                            <div class='col-sm-4 product-item hover-item'>
                                <a href="/product/Skincareset11">
                                    <div class='product-item text-left'>

                                        <div class='picture-box mb-3 position-relative'
                                            style="background:url('/img/picture/v1.jpg')">
                                        </div>
                                        <p class='mb-1'> <b> Healthy essence </b> </p>
                                        <p class='opacity-8 product-price' data-total='120.00'> $120.00 </p>
                                    </div>
                                </a>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('script.ecommerce.cms')

@stop