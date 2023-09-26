<x-admin-nav>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>User #{{$user->id}}</h1>
            {{ $user->created_at }}
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Details</h5>
                        <x-admin.data key="Name">{{$user->name}}</x-admin.data>
                        <x-admin.data key="Email">{{$user->email}}</x-admin.data>
                        <x-admin.data key="Phone">{{$user->phone}}</x-admin.data>
                        <x-admin.data key="Created At">{{$user->created_at}}</x-admin.data>
                    </div>
                </div>
            </div>

        </div>


    </main>
    <main id="main" class="main">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <h5 class="card-title">Orders</h5>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col" class="d-sm-table-cell">ID</th>
                                    <th scope="col" class="d-sm-table-cell">User</th>
                                    <th scope="col" class="d-sm-table-cell">Total</th>
                                    <th scope="col" class="d-sm-table-cell">Status</th>
                                    <th scope="col" class="d-sm-table-cell">Created At</th>
                                    <th scope="col" class="text-center d-sm-table-cell">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <th scope="row" class="d-sm-table-cell">{{$order->id}}</th>
                                        <td class="d-sm-table-cell">{{$order->billing_email}}</td>
                                        <td class="d-sm-table-cell">{{$order->billing_total}}</td>
                                        <td class="d-sm-table-cell">{{$order->status}}</td>
                                        <td class="d-sm-table-cell">{{$order->created_at}}</td>
                                        <td class="text-center d-sm-table-cell">
                                            <a href="{{route('admin.orders.show', ['order' => $order])}}">
                                                <i class="bi bi-eye-fill"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <main id="main" class="main">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <h5 class="card-title">Cart</h5>
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
                                @if($user->products)
                                    @foreach($user->products as $product)
                                        <tr>
                                            <th scope="row" class="d-sm-table-cell">
                                                <img width="75" height="75" src="{{asset('storage/products/' . $product->image)}}" alt="">
                                            </th>
                                            <th scope="row" class="d-sm-table-cell">{{$product->name}}</th>
                                            <th scope="row" class="d-sm-table-cell">{{$product->price}} RON</th>
                                            <th scope="row" class="d-sm-table-cell">{{$product->pivot->quantity}}</th>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <form action="{{route('admin.users.destroy',$user)}}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger mt-5">Delete User</button>
        </form>
    </main>

</x-admin-nav>

