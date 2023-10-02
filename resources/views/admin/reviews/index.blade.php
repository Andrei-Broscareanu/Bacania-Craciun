@vite(['resources/css/app.css'])
<x-admin-nav>
    <main id="main" class="main">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <h5 class="card-title">Reviews</h5>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col" class="d-sm-table-cell">ID</th>
                                    <th scope="col" class="d-sm-table-cell">User</th>
                                    <th scope="col" class="d-sm-table-cell">Rating</th>
                                    <th scope="col" class="d-sm-table-cell">Created At</th>
                                    <th scope="col" class="text-center d-sm-table-cell">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($reviews as $review)
                                    <tr>
                                        <th scope="row" class="d-sm-table-cell">{{$review->id}}</th>
                                        <td class="d-sm-table-cell">{{$review->user->name}}</td>
                                        <td class="d-sm-table-cell">{{$review->rating}} / 5</td>
                                        <td class="d-sm-table-cell">{{$review->created_at}}</td>
                                        <td class="text-center d-sm-table-cell">
                                            <a href="{{route('admin.reviews.show', ['review' => $review])}}">
                                                <i class="bi bi-eye-fill"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <div class="justify-content-center">
                                {{ $reviews->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-admin-nav>
