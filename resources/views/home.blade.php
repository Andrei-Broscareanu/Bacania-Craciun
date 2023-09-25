<x-app>
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Toate categoriile</span>
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
                    <div class="hero__item set-bg" data-setbg="img/Banner.jpg">
                        <div class="hero__text">
                            <span>FRUCTE FRESH</span>
                            <h2>Legume <br />100% Organice</h2>
                            <p>Ridicare gratuita din magazin</p>
                            <a href="/shop" class="primary-btn">CUMPARA ACUM</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    @foreach($categories as $category)
                    <div class="col-lg-10">
                        @if(count($category->images) > 0)
                            <a href="{{ route('shop', ['category' => $category->name]) }}">
                                <div class="categories__item set-bg" data-setbg="{{asset('storage/' . $category->images[0]->filename)}}">
                                </div>
                            </a>
                            <strong style="display: block; text-align: center; font-size: 20px;">{{$category->name}}</strong>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Top Oferte</h2>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                @foreach($featuredProducts as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
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
    <!-- Featured Section End -->

    <!-- Latest Product Section End -->

</x-app>
