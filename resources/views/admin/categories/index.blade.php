
@vite(['resources/css/app.css', 'resources/js/app.js'])
<x-admin-nav>
    <main id="main" class="main">
        <div class="container">
            <div class="row">
                <div class="col">
                    <a href="{{route('admin.categories.create')}}">
                        <i class="bi bi-plus" style="font-size: 40px;"></i>
                    </a>
                    <div class="card">
                        <div class="card-body table-responsive">
                            <h5 class="card-title">Categories</h5>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col" class="d-sm-table-cell">ID</th>
                                    <th scope="col" class="d-sm-table-cell">Name</th>
                                    <th scope="col" class="d-sm-table-cell">Number of products associated</th>
                                    <th scope="col" class="d-sm-table-cell">Created At</th>
                                    <th scope="col" class="text-center d-sm-table-cell">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <th scope="row" class="d-sm-table-cell">{{$category->id}}</th>
                                        <td class="d-sm-table-cell">{{$category->name}}</td>
                                        <td class="d-sm-table-cell">{{count($category->products)}}</td>
                                        <td class="d-sm-table-cell">{{$category->created_at}}</td>
                                        <td class="text-center d-sm-table-cell">
                                            <a href="{{route('admin.categories.show', ['category' => $category])}}">
                                                <i class="bi bi-eye-fill"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <div class="justify-content-center">
                                {{ $categories->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-admin-nav>
