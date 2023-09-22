<x-admin-nav>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Create new category</h1>
        </div>

        <div class="row">

            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Details</h5>
                        <form action="{{route('admin.categories.store')}}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Category name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="card-body">
                                    <input class="filepond" type="file" name="file[]" multiple>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Create</button>
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
