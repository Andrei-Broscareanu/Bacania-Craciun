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
                                <input type="text" name="search" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>0758233155</h5>
                                <span>support 24/7 time</span>
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
                            <h4>Department</h4>
                            <ul>
                                @foreach($categories as $category)
                                    <li><a href="{{ route('shop', ['category' => $category->name]) }}">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <strong>Price:</strong>
                                        <a href="{{route('shop', ['category'=> request()->category, 'sort' => 'low_high'])}}">Low to High</a>
                                        <a href="{{route('shop', ['category'=> request()->category, 'sort' => 'high_low'])}}">High to Low</a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span>{{count($products)}}</span> Products found</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($products as $product)
                        <div class="col-lg-4 col-md-6 col-sm-6">
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
                    {{ $products->appends(request()->input())->links() }}
                </div>
            </div>
        </div>
    </section>
</x-app>
