<x-app>
    <div class="container mt-5 mb-5">

        <div class="row d-flex justify-content-center">

            <div class="col-md-8">

                <div class="card">


                    <div class="text-left logo p-2 px-5">

                        <img src="img/LOGOMIC.png" alt="">

                    </div>

                    <div class="invoice p-5">

                        <h5>Comanda confirmata</h5>

                        <span>Comanda a fost confirmata si va asteptam in locatia fizica pentru ridicare!</span>

                        <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">

                            <table class="table table-borderless">

                                <tbody>
                                <tr>
                                    <td>
                                        <div class="py-2">

                                            <span class="d-block text-muted">Order Date and Time</span>
                                            <span>{{$order->created_at}}</span>

                                        </div>
                                    </td>

                                    <td>
                                        <div class="py-2">

                                            <span class="d-block text-muted">Order No</span>
                                            <span>{{$order->identifier_code}}</span>

                                        </div>
                                    </td>


                                    <td>
                                        <div class="py-2">

                                            <span class="d-block text-muted">Shiping Address</span>
                                            <span>{{$order->billing_address}}</span>

                                        </div>
                                    </td>
                                </tr>
                                </tbody>

                            </table>


                        </div>


                        <div class="product border-bottom table-responsive">

                            <table class="table table-borderless">

                                <tbody>

                                @foreach($order->products as $product)
                                    <tr>
                                        <td width="20%">
                                            <img src="{{asset('storage/' . $product->images[0]->filename)}}" width="90" alt="">
                                        </td>
                                        <td width="60%">
                                            <span class="font-weight-bold">{{$product->name}}</span>
                                            <div class="product-qty">
                                                <span class="d-block">Quantity: {{$product->pivot->quantity}}</span>
                                            </div>
                                        </td>
                                        <td width="20%">
                                            <div class="text-right">
                                                <span class="font-weight-bold">{{$product->price * $product->pivot->quantity}} RON</span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>


                        <div class="row d-flex justify-content-end">

                            <div class="col-md-5">

                                <table class="table table-borderless">

                                    <tbody class="totals">

                                    <tr>
                                        <td>
                                            <div class="text-left">

                                                <span class="text-muted">Total</span>

                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-right">
                                                <span>{{$order->billing_total}} RON</span>
                                            </div>
                                        </td>
                                    </tr>

                                    </tbody>

                                </table>

                            </div>


                        </div>

                        <p class="font-weight-bold mb-0">Suntem recunoscători tuturor celor care au avut încredere în noi!
                            Vă așteptăm cu drag în băcănia noastră să ne cunoaștem!</p>
                    </div>
                </div>

            </div>

        </div>

    </div>

</x-app>

