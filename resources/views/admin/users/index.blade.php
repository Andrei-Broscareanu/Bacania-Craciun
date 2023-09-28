
@vite(['resources/css/app.css', 'resources/js/app.js'])
<x-admin-nav>
    <main id="main" class="main">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <h5 class="card-title">Users</h5>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col" class="d-sm-table-cell">ID</th>
                                    <th scope="col" class="d-sm-table-cell">Name</th>
                                    <th scope="col" class="d-sm-table-cell">Email</th>
                                    <th scope="col" class="d-sm-table-cell">Phone</th>
                                    <th scope="col" class="d-sm-table-cell">Email Verified At</th>
                                    <th scope="col" class="d-sm-table-cell">Status</th>
                                    <th scope="col" class="d-sm-table-cell">Created At</th>
                                    <th scope="col" class="text-center d-sm-table-cell">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <th scope="row" class="d-sm-table-cell">{{$user->id}}</th>
                                        <td class="d-sm-table-cell">{{$user->name}}</td>
                                        <td class="d-sm-table-cell">{{$user->email}}</td>
                                        <td class="d-sm-table-cell">{{$user->phone}}</td>
                                        <td class="d-sm-table-cell">{{$user->email_verified_at}}</td>
                                        <td class="d-sm-table-cell">{{$user->is_admin}}</td>
                                        <td class="d-sm-table-cell">{{$user->created_at}}</td>
                                        <td class="text-center d-sm-table-cell">
                                            <a href="{{route('admin.users.show', ['user' => $user])}}">
                                                <i class="bi bi-eye-fill"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <div class="justify-content-center">
                                {{ $users->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-admin-nav>
