<style>
    @media (max-width: 768px) {
        .sidebar {
            display: none;
        }
    }
</style>

<x-app>
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Toate Categoriile</span>
                        </div>
                        <ul>
                            @foreach($categories as $category)
                            <li><a href="{{ route('shop', ['category' => $category->name]) }}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="{{route('shop')}}" method="get">
                                <input type="text" name="search" placeholder="De ce aveti nevoie astazi?">
                                <button type="submit" class="site-btn">CAUTA</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>0758233155</h5>
                                <span>Suport 24/7</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Categorii</h4>
                            <ul>
                                @foreach($categories as $category)
                                    <li><a href="{{ route('shop', ['category' => $category->name]) }}">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="sidebar__item" id="sidebar">
                            <div class="latest-product__text">
                                <h4>Top Produse</h4>
                                <div class="latest-product__slider owl-carousel">
                                    <div class="latest-prdouct__slider__item">
                                        @foreach($topProducts as $product)
                                        <a href="{{route('view-product',$product->slug)}}" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                @if(count($product->images) > 0)
                                                <img src="{{asset('storage/' . $product->images[0]->filename)}}" alt="">
                                                    @endif
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>{{$product->name}}</h6>
                                                <span>{{$product->price}} RON</span>
                                            </div>
                                        </a>
                                        @endforeach
                                    </div>

                                    <div class="latest-prdouct__slider__item">
                                        @foreach($topRatedProducts as $product)
                                            <a href="#" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    @if(count($product->images) > 0)
                                                    <img src="{{asset('storage/' . $product->images[0]->filename)}}" alt="">
                                                    @endif
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>{{$product->name}}</h6>
                                                    <span>{{$product->price}} RON</span>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <strong>Pret:</strong>
                                        <a href="{{route('shop', ['category'=> request()->category, 'sort' => 'low_high'])}}" style="text-align: center; font-size: 17px; text-decoration: none; color: #333;">Pret Crescator</a>
                                        <a href="{{route('shop', ['category'=> request()->category, 'sort' => 'high_low'])}}" style="text-align: center; font-size: 17px; text-decoration: none; color: #333;">Pret Descrescator</a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span>{{count($products)}}</span> Produse Gasite</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-lg-4 col-md-6 col-sm-6 mb-3">
                                <div class="product__discount__item">
                                    <a href="{{route('view-product',$product->slug)}}">
                                         @if(count($product->images) > 0)
                                    <div class="product__discount__item__pic set-bg"
                                         data-setbg="{{asset('storage/' . $product->images[0]->filename)}}">
                                        @if($product->sale)
                                        <div class="product__discount__percent">- {{ intval(($product->sale * 100 ) / ($product->price + $product->sale))}}%</div>
                                        @endif
                                    </div>
                                            @endif
                                    </a>
                                    <div class="product__discount__item__text">
                                        @if(count($product->getApprovedReviews()) > 0)
                                        <div class="product__details__rating">
                                                @for($i = 0;$i< (int)$product->getAvgRating();$i++)
                                                    <i style="color:#e6e600;" class="fa fa-star"></i>
                                                @endfor
                                                @for($i = 0;$i< 5 - $product->getAvgRating()  ; $i++)
                                                    <i style="color:#111111;" class="fa fa-star"></i>
                                                @endfor
                                        </div>
                                        @else
                                        <span>Nici o recenzie</span>
                                        @endif
                                        <h5><a href="#">{{$product->name}}</a></h5>
                                        @if($product->sale)
                                        <div class="product__item__price">{{$product->price}} RON<span>{{$product->price + $product->sale}} RON</span></div>
                                            @else
                                            <div class="product__item__price">{{$product->price}} RON</div>
                                            @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-5">
                    {{ $products->appends(request()->input())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app>
