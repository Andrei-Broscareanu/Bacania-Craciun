<x-app>
    <!-- Breadcrumb Section Begin -->

    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>{{$product->name}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                 src="{{asset('storage/' . $product->images[0]->filename)}}" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            @foreach($product->images as $image)
                            <img data-imgbigurl="{{asset('storage/' . $image->filename)}}"
                                 src="{{asset('storage/' . $image->filename)}}" alt="">
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{$product->name}}</h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>
                        <div class="product__details__price">{{$product->price}} RON</div>
                        <p>{{$product->details}}</p>
                        @livewire('AddToCart',['productSlug' => $product->slug])
                        <ul>
                            <li><b>Disponibilitate</b> <span>(aici sa facem functia )</span></li>
                            <li><b>Ridicare Colet</b> <span>Din magazinul nostru <samp>Zilnic intre orele 10:00-20:00</samp></span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                   aria-selected="true">Descriere</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                   aria-selected="false">Reviews <span>(1)</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Descrierea produsului</h6>
                                    <p>{{$product->description}}</p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Reviews</h6>
                                    <p>mhnkymklkjhmi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($relatedProducts as $product)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        @if(count($product->images) > 0)
                            <a href="{{route('view-product',$product->slug)}}">
                                <div class="product__item__pic set-bg" data-setbg="{{asset('storage/' . $product->images[0]->filename)}}">
                                </div>
                            </a>
                        @endif
                        <div class="product__item__text">
                            <h6><a href="#">{{$product->name}}</a></h6>
                            <h5>{{$product->price}} RON</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

{{--    @livewireScripts--}}
{{--    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>--}}
{{--    <script>--}}
{{--        window.livewire.on('itemAddedToCart', (message) => {--}}
{{--            // Trigger Toastr notification or your notification logic here--}}
{{--            toastr.success(message);--}}
{{--        });--}}
{{--    </script>--}}

</x-app>

