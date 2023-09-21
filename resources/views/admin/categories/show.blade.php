<x-admin-nav>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Category #{{$category->id}}</h1>
            {{ $category->created_at }}
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
