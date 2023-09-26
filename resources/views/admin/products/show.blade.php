<x-admin-nav>
    <main id="main" class="main">
        <div class="pagetitle">
        </div>

        <div class="card">
            <div class="card-body">
                @if(count($product->images) > 0)
                    <!-- Slides with controls -->
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($product->images as $index=>$image)
                                @if($index === 0)
                                    <div class="carousel-item active">
                                        <img src="{{asset('storage/' . $image->filename)}}" alt="...">
                                        <form action="{{route('admin.product-remove-images')}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="image_id" value="{{$image->id}}">
                                            <button type="submit" class="btn btn-danger">Remove Image</button>
                                        </form>
                                    </div>
                                @else
                                    <div class="carousel-item">
                                        <img src="{{asset('storage/' . $image->filename)}}" alt="...">
                                        <form action="{{route('admin.product-remove-images')}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="image_id" value="{{$image->id}}">
                                            <button type="submit" class="btn btn-danger">Remove Image</button>
                                        </form>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                                data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>

                    </div>
                @else
                    <h4 class="mt-5 mb-5">There are no images for this product</h4>
                @endif

            </div>
        </div>


        <div class="row">

            <div class="col">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Details</h5>
                        <form action="{{route('admin.products.update',$product)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Product name</label>
                                <div class="col-sm-10">
                                    <input value="{{$product->name}}" type="text" class="form-control" name="name">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Product price</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{$product->price}}" class="form-control" name="price">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Product quantity</label>
                                <div class="col-sm-10">
                                    <input type="number" value="{{$product->quantity}}" class="form-control"
                                           name="quantity">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Product importance</label>
                                <div class="col-sm-10">
                                    <input type="number" value="{{$product->featured}}" class="form-control" name="featured">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Visibility Status</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="status" id="published_status"
                                            aria-label="Default select example">
                                        @if($product->published === 1)
                                            <option value="published">Published</option>
                                            <option value="not_published">Not Published</option>
                                        @else
                                            <option value="not_published">Not Published</option>
                                            <option value="published">Published</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Product details</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control"
                                              name="details">{{$product->details}}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Product description</label>
                                <div class="col-sm-10">
                                    <textarea rows="10" type="text" class="form-control"
                                              name="description">{{$product->description}}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="card-body">
                                    <input class="filepond" type="file" name="file[]" multiple>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                        @if($product->categories)
                        <hr>
                        List of categories for this product
                        <hr>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th class="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($product->categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>
                                        <form action="{{route('admin.product-remove-categories')}}"
                                              class="remove-category-product-form" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                            <input type="hidden" name="category_id" value="{{$category->id}}">
                                            <button type="submit" class="btn btn-danger remove-category-btn">Remove
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @endif

                        <div class="row mb-3">
                            @if(count($categories) === $product->getCategoriesCount())
                                <h4>No categories to add</h4>

                            @else
                                <form action="{{route('admin.product-add-categories')}}" method="POST"
                                      class="add-category-to-product">
                                    @csrf
                                    <input name="product_id" type="hidden" value="{{$product->id}}">
                                    <select name="category_name"
                                            class="form-select select-product-identifier {{$product->slug}}">
                                        @if($product->getCategoriesCount() > 0)
                                            @foreach($product->unassociatedCategories() as $categoryAux)
                                                <option value="{{$categoryAux->name}}">{{$categoryAux->name}}</option>
                                            @endforeach
                                        @else
                                            @foreach($categories as $category)
                                                <option value="{{$category->name}}">{{$category->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <button type="submit" id="add-category-btn"
                                            class="btn btn-primary add-category mt-3">
                                        Add Category
                                    </button>
                                </form>
                            @endif
                        </div>

                    </div>


                </div>


            </div>

            <form action="{{route('admin.products.destroy',$product)}}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger mt-5">Delete Product</button>
            </form>


        </div>
    </main>
</x-admin-nav>

<script type="module">
    FilePond.setOptions({
        server: {
            url: '/filepond/api',
            process: '/process',
            revert: '/process',
            patch: "?patch=",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        }
    });

    const input = document.querySelector('input.filepond');
    const pond = FilePond.create(input);
</script>
