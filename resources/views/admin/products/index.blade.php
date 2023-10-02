
@vite(['resources/css/app.css'])
<x-admin-nav>
    <main id="main" class="main">
        <div class="container">
            <div class="row">
                <div class="col">
                    <a href="{{route('admin.products.create')}}">
                        <i class="bi bi-plus" style="font-size: 40px;"></i>
                    </a>
                    <div class="card">
                        <div class="card-body table-responsive">
                            <h5 class="card-title">Products</h5>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col" class="d-sm-table-cell">ID</th>
                                    <th scope="col" class="d-sm-table-cell">Name</th>
                                    <th scope="col" class="d-sm-table-cell">Published Status</th>
                                    <th scope="col" class="d-sm-table-cell">Quantity</th>
                                    <th scope="col" class="d-sm-table-cell">Created At</th>
                                    <th scope="col" class="text-center d-sm-table-cell">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <th scope="row" class="d-sm-table-cell">{{$product->id}}</th>
                                        <td class="d-sm-table-cell">{{$product->name}}</td>
                                        <td class="d-sm-table-cell">{{$product->published}}</td>
                                        <td class="d-sm-table-cell">{{$product->quantity}}</td>
                                        <td class="d-sm-table-cell">{{$product->created_at}}</td>
                                        <td class="text-center d-sm-table-cell">
                                            <a href="{{route('admin.products.show', ['product' => $product])}}">
                                                <i class="bi bi-eye-fill"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            {{ $products->appends(request()->input())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-admin-nav>



