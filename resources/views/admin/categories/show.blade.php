<x-admin-nav>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Category #{{$category->id}}</h1>
            {{ $category->created_at }}
        </div>


        <div class="card">
            <div class="card-body">
                @if(count($category->images) > 0)
                    <!-- Slides with controls -->
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($category->images as $index=>$image)
                                @if($index === 0)
                                    <div class="carousel-item active">
                                        <img src="{{asset('storage/' . $image->filename)}}" alt="...">
                                        <form action="{{route('admin.category-remove-images')}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="image_id" value="{{$image->id}}">
                                            <button type="submit" class="btn btn-danger">Remove Image</button>
                                        </form>
                                    </div>
                                @else
                                    <div class="carousel-item">
                                        <img src="{{asset('storage/' . $image->filename)}}" alt="...">
                                        <form action="{{route('admin.category-remove-images')}}" method="POST">
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
                        <form action="{{route('admin.categories.update',$category)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Category name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name"
                                           value="{{$category->name}}">
                                    <input type="hidden" value="{{$category->id}}" name="category_id">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="card-body">
                                    <input class="filepond" type="file" name="file[]" multiple>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>


                        <form action="{{route('admin.categories.destroy',$category)}}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger mt-5">Delete</button>
                        </form>
                    </div>
                </div>
            </div>


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
