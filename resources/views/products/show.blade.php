<x-app>
    <!-- Breadcrumb Section Begin -->
    <div class="modal fade" id="exampleModal" tabindex="-1"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Feedback Form</h5>
                    <button type="button" class="close"
                            data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"
                     style="background-color: #FFFFFF">
                    <form action="{{ route('review.create') }}" method="POST" class="review-form">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Cum vi se pare acest produs?</label>
                            <label for="exampleFormControlTextarea1">Va rog sa luati in considerare ca acest review va trebui sa fie aprobat.</label>
                            <div class="rating-input-wrapper d-flex justify-content-between mt-2">
                                <label>
                                    <input type="radio" name="rating" class="selector"/>
                                    <span class="border rounded px-3 py-2">1</span>
                                </label>
                                <label>
                                    <input type="radio" name="rating"  class="selector"/>
                                    <span class="border rounded px-3 py-2">2</span>
                                </label>
                                <label>
                                    <input type="radio" name="rating" class="selector"/>
                                    <span class="border rounded px-3 py-2">3</span>
                                </label>
                                <label>
                                    <input type="radio" name="rating" class="selector"/>
                                    <span class="border rounded px-3 py-2">4</span>
                                </label>
                                <label>
                                    <input type="radio" name="rating" class="selector"/>
                                    <span class="border rounded px-3 py-2">5</span>
                                </label>
                            </div>
                            <div class="rating-labels d-flex justify-content-between mt-1">
                                <label>Nu as recomanda</label>
                                <label>As recomanda</label>
                            </div>

                            <input type="hidden" value="5" name="rating"
                                   class="review-hidden">

                            <input type="hidden" value="{{$product->slug}}" name="product"
                                   class="review-hidden">
                            <div class="form-group">
                                <label>Titlu</label>
                                <input type="text" class="form-control"
                                       name="title">
                            </div>
                            <div class="form-group">
                                <label for="input-two">Va rog detaliati-va opinia.</label>
                                <textarea class="form-control" name="review"
                                          rows="3"></textarea>
                            </div>
                        </div>
                        <!-- The rest of your form fields here -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="button-30"
                            data-dismiss="modal">Close
                    </button>
                    @Auth
                        <button type="submit"
                                onclick="document.querySelector('.review-form').submit();"
                                class="button-30">Submit
                        </button>
                    @else
                        <button class="btn btn-primary">
                            Submit
                        </button>
                    @endauth
                </div>
            </div>
        </div>
    </div>


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
                        @if(count($product->images) > 1)
                        <div class="product__details__pic__slider owl-carousel">
                            @foreach($product->images as $image)
                            <img data-imgbigurl="{{asset('storage/' . $image->filename)}}"
                                 src="{{asset('storage/' . $image->filename)}}" alt="">
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{$product->name}}</h3>
                        <div class="product__details__rating">
                            @if(count($reviews) > 0)
                                @for($i = 0;$i< (int)$averageRating;$i++)
                                    <i class="fa fa-star"></i>
                                @endfor
                                @for($i = 0;$i< 5 - $averageRating  ; $i++)
                                    <i class="fa fa-star-o"></i>
                                @endfor
                            @endif
                        </div>
                        <div class="product__details__price" style="color:#235b14; ">{{$product->price}} RON</div>
                        <p>{{$product->details}}</p>
                        @if($stockLevel !== 'Nu este disponibil')
                        @livewire('AddToCart',['productSlug' => $product->slug])
                        @endif
                        <ul>

                            @if($stockLevel === 'Nu este disponibil')
                                <li><b>Disponibilitate</b> <span class="text-danger">{{$stockLevel}}</span></li>
                            @endif
                            @if($stockLevel === 'In Stoc')
                                    <li><b>Disponibilitate</b> <span class="text-success">{{$stockLevel}}</span></li>
                            @endif

                            @if($stockLevel === 'Stoc redus')
                                    <li><b>Disponibilitate</b> <span class="text-warning">{{$stockLevel}}</span></li>
                            @endif

                            <li><b>Ridicare</b> <span>Din magazinul nostru <span>Zilnic intre orele 10:00-20:00</span></span></li>
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
                                   aria-selected="false">Reviews <span>({{count($reviews)}})</span></a>
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
                                    @Auth
                                    <button data-toggle="modal"
                                            data-target="#exampleModal" class="primary-btn">
                                        Va asteptam opinia..
                                    </button>
                                        @else

                                        <button class="primary-btn">
                                            <a style="color:white;"
                                               href="{{route('login',['product_slug'=>$product->slug])}}"> Trebuie sa va inregistrati pentru a posta un review..</a>
                                        </button>
                                    @endauth

                                </div>
                                @if(count($reviews) > 0)
                                <section class="pt-5 pb-5">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12">
                                                <h2 class="mb-2 text-center">Acestea sunt opiniile clientilor nostrii..</h2>
                                            </div>
                                            <div class="col-12">
                                                <div class="card-columns">
                                                    @foreach($reviews as $review)
                                                    <div class="card mb-4">
                                                        <div class="card-body">

                                                                <i class="fa fa-quote-right fa-2x text-muted pull-right mt-3 mb-3" aria-hidden="true"></i>
                                                                <p class=" m-0 text-muted ">
                                                                   {{$review->description}}
                                                                </p>
                                                                <footer class="blockquote-footer small p-1">
                                                                    <br>
                                <span class="small">{{$review->user->name}}
                        </span>
                                                                </footer>

                                                        </div>
                                                    </div>
                                                    @endforeach

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                    @endif
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
                        <h2>Produse asemanatoare</h2>
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
                            <h5 style="color:#235b14;">{{$product->price}} RON</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

            <script src="/js/sweetalert/sweetalert.min.js"></script>
    <script>
        document.querySelector('.add-to-cart').addEventListener('click',function(){
            swal({
                icon: 'success',
                title: 'Produsul a fost adaugat in cos',
                showConfirmButton: false,
                timer: 3500
            })
        });

    </script>



    <script>
        let inputs = document.querySelectorAll('.selector');
        for (let i = 0; i < inputs.length; i++) {
            inputs[i].addEventListener('click', function () {
                document.querySelector('.review-hidden').value = inputs[i].nextElementSibling.innerText;
            });
        }
    </script>


</x-app>

