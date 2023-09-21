<x-admin-nav>
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
                                    <th scope="col" class="d-sm-table-cell">Identifier Code</th>
                                    <th scope="col" class="d-sm-table-cell">Created At</th>
                                    <th scope="col" class="text-center d-sm-table-cell">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <th scope="row" class="d-sm-table-cell">{{$order->id}}</th>
                                        <td class="d-sm-table-cell">{{$order->billing_email}}</td>
                                        <td class="d-sm-table-cell">{{$order->billing_total}} RON</td>
                                        <td class="d-sm-table-cell">{{$order->status}}</td>
                                        <td class="d-sm-table-cell">{{$order->identifier_code}}</td>
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

                            <div class="justify-content-center">
                                {{ $orders->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-admin-nav>
