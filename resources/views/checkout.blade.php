<style>
    .checkout__input__add { /* Change the color to your preference */
        padding: 8px; /* Add padding for better spacing */
        outline: none; /* Remove the default browser outline */
        transition: border-color 0.2s; /* Add a transition for smoother changes */
    }


</style>

<x-app>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Finalizare comanda</h2>
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

                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check mb-2" id="persoana-fizica-btn">
                                    <input class="form-check-input" type="radio" name="metodaFacturare" value="persoanaFizica" id="persoanaFizica" checked>
                                    <label class="form-check-label" for="persoanaFizica">Persoana Fizica</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check mb-2" id="persoana-juridica-btn">
                                    <input class="form-check-input" type="radio" name="metodaFacturare" value="persoanaJuridica" id="persoanaJuridica">
                                    <label class="form-check-label" for="persoanaJuridica">Persoana Juridica</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="checkout__input">
                        <input style="display:none;" name="qtyIssue" class="modifiedQty" value="@foreach($qtyIssueProductNames as $name) {{$name}} @endforeach">
                    </div>


                    <form action="{{route('create-order')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">

                            <div class="checkout__input">
                                <p>Nume Complet<span>*</span></p>
                                <input type="text" name="name" style="border: 1px solid #808080;" class="checkout__input__add" value="{{old('name')}}">
                                @error('name') <!-- Check if there are errors for the 'email' field -->
                                <div class="alert alert-danger email">{{ $message }}</div> <!-- Display the error message -->
                                @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Adresa<span>*</span></p>
                                <input type="text" name="address" value="{{old('address')}}" style="border: 1px solid #808080;" class="checkout__input__add">
                            </div>
                            <div class="checkout__input">
                                <p>Oras<span>*</span></p>
                                <input type="text" style="border: 1px solid #808080;" value="{{old('city')}}" name="city">
                            </div>
                            <div class="checkout__input">
                                <p>Judet<span>*</span></p>
                                <input type="text" style="border: 1px solid #808080;" value="{{old('province')}}" name="province">
                            </div>
                            <div class="checkout__input">
                                <p>Cos postal<span>*</span></p>
                                <input type="text" style="border: 1px solid #808080;" name="postal_code" value="{{old('postal_code')}}">
                            </div>
                            <div class="checkout__input persoana-juridica" style="display:none;">
                                <p>CIF<span>*</span></p>
                                <input type="text" style="border: 1px solid #808080;" name="CIF">
                            </div>
                            <div class="checkout__input persoana-juridica" style="display:none;">
                                <p>Nr. inregistrare Registrul Comertului<span>*</span></p>
                                <input  style="border: 1px solid #808080;"type="text" name="NIRC">
                            </div>
                            <div class="checkout__input persoana-juridica" style="display:none;">
                                <p>Denumire Societate<span>*</span></p>
                                <input  style="border: 1px solid #808080;"type="text" name="DS">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Numar de telefon<span>*</span></p>
                                        <input style="border: 1px solid #808080;" type="text" name="phone" value="{{old('phone')}}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input style="border: 1px solid #808080;" type="text" name="email" value="{{ old('email') }}">
                                    </div>
                                    @error('email') <!-- Check if there are errors for the 'email' field -->
                                    <div class="alert alert-danger email">{{ $message }}</div> <!-- Display the error message -->
                                    @enderror
                                </div>

                            </div>
                            <div class="checkout__input">
                                <p>Detalii in plus despre comanda<span>*</span></p>
                                <input type="text" style="border: 1px solid #808080;"
                                       placeholder="Daca aveti posibile cerinte despre comanda..." name="observations">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Comanda Dvs.</h4>
                                <ul>
                                    @foreach($products as $product)
                                    <li>{{$product->name}} ({{ $cartItems[$product->id]['quantity']}} unitati)<span>{{$product->price * $cartItems[$product->id]['quantity']}} RON</span></li>
                                    @endforeach
                                </ul>
{{--                                <div class="checkout__order__total">Total <span>{{$total}} RON</span></div>--}}
                                <p>Comanda va fi achitata cash sau prin intermediul platii cu cardul in locatia noastra fizica de la Str. Tamasi, nr. 22, Buftea.</p>
                                <button type="submit" class="site-btn">Plaseaza comanda</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </section>
</x-app>
<script src="/js/sweetalert/sweetalert.min.js"></script>
<script>

    window.onload = (event) => {
       if(document.querySelector('.modifiedQty').value.trim() !== '') {
           swal({
               icon: 'error',
               title: 'Produsele' + document.querySelector('.modifiedQty').value + 'nu sunt disponibile in cantitatea selectata . Asa ca le-am schimbat in cantitatea maxima disponibila.',
               showConfirmButton: false,
               timer: 4500
           }).then((result) => {
               document.querySelector('.modifiedQty').value = "";
               console.log(1);
           });

       }
    };
    var persoanaJuridicaInputs = document.querySelectorAll('.persoana-juridica');

    document.querySelector('#persoana-juridica-btn').addEventListener('click',function(){
        for( let i = 0 ; i < persoanaJuridicaInputs.length ; i ++){
            persoanaJuridicaInputs[i].style.display = 'block';
        }
    });


    document.querySelector('#persoana-fizica-btn').addEventListener('click',function(){
        for( let i = 0 ; i < persoanaJuridicaInputs.length ; i ++){
            persoanaJuridicaInputs[i].style.display = 'none';
        }
    });
</script>
