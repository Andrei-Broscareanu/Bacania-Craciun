<x-admin-nav>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Order #{{$order->id}}</h1>
            {{ $order->created_at }}
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Details</h5>
                        <x-admin.data key="Name">{{$order->billing_name}}</x-admin.data>
                        <x-admin.data key="Email">{{$order->billing_email}}</x-admin.data>
                        <x-admin.data key="Phone">{{$order->billing_phone}}</x-admin.data>
                        <x-admin.data key="Total">{{$order->billing_total}} RON</x-admin.data>
                        @if($order->denumire_societate && $order->numar_inregistrare_registrul_comertului && $order->cod_inregistrare_fiscala)
                            <x-admin.data key="Billing Method"> Persoana Juridica</x-admin.data>
                        @else
                            <x-admin.data key="Metoda Facturare">Persoana Fizica</x-admin.data>
                        @endif


                        <form action="{{route('admin.orders.update',$order)}}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Order Status</label>
                                <select name="status" class="form-select" aria-label="Default select example">
                                    <option>{{$order->status}}</option>
                                    @foreach(\App\Enums\OrderStatus::cases() as $status)
                                        <option name="{{$status}}" value="{{$status}}"
                                                @if($order->status === $status) style="display:none;" @endif>{{$status}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" value="{{$order->id}}" name="order_id">

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Address</h5>
                        <x-admin.data key="Province">{{$order->billing_province}}</x-admin.data>
                        <x-admin.data key="City">{{$order->billing_city}}</x-admin.data>
                        <x-admin.data key="Postal Code">{{$order->billing_postalcode}}</x-admin.data>
                        <x-admin.data key="Address">{{$order->billing_address}}</x-admin.data>
                        <x-admin.data key="Order specifications">{{$order->observations}}</x-admin.data>
                    </div>
                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-body table-responsive">
                <h5 class="card-title">Products Ordered</h5>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col" class="d-sm-table-cell"></th>
                        <th scope="col" class="d-sm-table-cell">Product</th>
                        <th scope="col" class="d-sm-table-cell">Price</th>
                        <th scope="col" class="d-sm-table-cell">Quantity</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->products as $product)
                        <tr>
                            <th scope="row" class="d-sm-table-cell">
                                <img width="75" height="75" src="{{asset('storage/' . $product->images[0]->filename)}}"
                                     alt="">
                            </th>
                            <th scope="row" class="d-sm-table-cell">{{$product->name}}</th>
                            <th scope="row" class="d-sm-table-cell">{{$product->price}} RON</th>
                            <th scope="row" class="d-sm-table-cell">{{$product->pivot->quantity}}</th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </main>

</x-admin-nav>
