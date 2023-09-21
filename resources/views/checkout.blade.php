<x-app>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="checkout spad">
        <div class="container">
            <div class="row">
            </div>
            <div class="checkout__form">
                <h4>Detalii de facturare</h4>
                <form action="#">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Nume<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Prenume<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Adresa<span>*</span></p>
                                <input type="text" placeholder="Numele strazii..." class="checkout__input__add">
                                <input type="text" placeholder="Apartament (optional)">
                            </div>
                            <div class="checkout__input">
                                <p>Oras<span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="checkout__input">
                                <p>Judet<span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="checkout__input">
                                <p>Cos postal<span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Numar de telefon<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Detalii in plus despre comanda<span>*</span></p>
                                <input type="text"
                                       placeholder="Daca aveti posibile cerinte despre comanda...">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Comanda Dvs.</h4>
                                <div class="checkout__order__products">Product <span>Total</span></div>
                                <ul>
                                    @foreach($products as $product)
                                    <li>{{$product->name}}<span>{{$product->price * $cartItems[$product->id]['quantity']}} RON</span></li>
                                    @endforeach
                                </ul>
                                <div class="checkout__order__total">Total <span>{{$total}} RON</span></div>
                                <p>Comanda va fi achitata cash sau prin intermediul platii cu cardul in locatia noastra fizica de la Str. Tamasi, nr. 22, Buftea.</p>
                                <button type="submit" class="site-btn">Plaseaza comanda</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-app>