<x-admin-nav>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
            <ul class="sidebar-nav" id="sidebar-nav">

                <li class="nav-item">
                    <a class="nav-link " href="{{route('admin.dashboard')}}">
                        <i class="bi bi-grid"></i>
                        <span>Dashboard</span>
                    </a>

                    <a class="nav-link collapsed " href="{{route('homepage')}}">
                        <i class="bi bi-circle"></i>
                        <span>Back to site</span>
                    </a>
                </li><!-- End Dashboard Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-menu-button-wide"></i><span>Data</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="{{route('admin.products.index')}}">
                                <i class="bi bi-circle"></i><span>Products</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.categories.index')}}">
                                <i class="bi bi-circle"></i><span>Categories</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.orders.index')}}">
                                <i class="bi bi-circle"></i><span>Orders</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.users.index')}}">
                                <i class="bi bi-circle"></i><span>Users</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('admin.reviews.index')}}">
                                <i class="bi bi-circle"></i><span>Reviews</span>
                            </a>
                        </li>
                    </ul>
                </li><!-- End
        Components Nav -->
            </ul>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-8">
                    <div class="row">

                        <!-- Sales Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Sales <span>| Today</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-cart"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{$ordersPast24H}}</h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Sales Card -->

                        <!-- Revenue Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Revenue <span>| Today</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-currency-dollar"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{$currentRevenue}} RON</h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Revenue Card -->

                        <!-- Customers Card -->
                        <div class="col-xxl-4 col-xl-12">

                            <div class="card info-card customers-card">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">New Accounts <span>| Today</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{$usersPast24h}}</h6>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div><!-- End Customers Card -->

                        <!-- Reports -->

                        <!-- Recent Sales -->
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Recent Sales <span>| This week</span></h5>

                                    <table class="table table-borderless datatable">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Customer</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($ordersFromPastWeek as $order)
                                        <tr>
                                            <th scope="row"><a href="#">{{$order->identifier_code}}</a></th>
                                            @if($order->user_id)
                                            <td>{{$order->user->name}}</td>
                                            @else
                                                <td>the user does not have an account</td>
                                            @endif
                                            <td>{{$order->billing_total}} RON</td>
                                            @if($order->status === \App\Enums\OrderStatus::Pending)
                                            <td><span class="badge bg-warning">{{$order->status}}</span></td>
                                                @endif

                                            @if($order->status === \App\Enums\OrderStatus::Paid)
                                                <td><span class="badge bg-success">{{$order->status}}</span></td>
                                            @endif

                                            @if($order->status === \App\Enums\OrderStatus::ReadyForPickUp)
                                                <td><span class="badge bg-success">{{$order->status}}</span></td>
                                            @endif

                                            @if($order->status === \App\Enums\OrderStatus::Cancelled)
                                                <td><span class="badge bg-danger">{{$order->status}}</span></td>
                                            @endif


                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>

                            </div>
                        </div><!-- End Recent Sales -->

                        <!-- Top Selling -->

                    </div>
                </div><!-- End Left side columns -->

                <!-- Right side columns -->
                <div class="col-lg-4">

                    <!-- Recent Activity -->
                    <div class="card">
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>

                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <div class="card top-selling overflow-auto">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                    </ul>
                                </div>

                                <div class="card-body pb-0">
                                    <h5 class="card-title">Top Selling <span>| Today</span></h5>

                                    <table class="table table-borderless">
                                        <thead>
                                        <tr>
                                            <th scope="col">Product</th>
                                            <th scope="col">Units Sold</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($mostSoldProductsWithNames as $product)
                                        <tr>
                                            <td><a href="#" class="text-primary fw-bold">{{$product->name}}</a></td>
                                            <td class="fw-bold">{{$product->total_sold}}</td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>

                            </div>
                    </div><!-- End Recent Activity -->


                        <div class="card-body">
                            <div class="card top-selling overflow-auto">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                    </ul>
                                </div>

                                <div class="card-body pb-0">
                                    <h5 class="card-title">Best Reviewed <span>| All time</span></h5>

                                    <table class="table table-borderless">
                                        <thead>
                                        <tr>
                                            <th scope="col">Product</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($topRatedProducts as $product)
                                            <tr>
                                                <td><a href="{{route('admin.products.show',$product)}}" class="text-primary fw-bold">{{$product->name}}</a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>

                            </div>
                        </div><!-- End Recent Activity -->
                    </div>
                </div>
                    <!-- Budget Report -->

                    <!-- Website Traffic -->

                    <!-- News & Updates Traffic -->

                </div><!-- End Right side columns -->
            </div>
        </section>

    </main><!-- End #main -->
</x-admin-nav>
