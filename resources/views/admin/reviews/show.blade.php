<x-admin-nav>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Review #{{$review->id}}</h1>
            {{ $review->created_at }}
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Details</h5>
                        <x-admin.data key="User Name">{{$review->user->name}}</x-admin.data>
                        <x-admin.data key="Content">{{$review->description}}</x-admin.data>
                        <x-admin.data key="Rating">{{$review->rating}} / 5</x-admin.data>


                        <form action="{{route('admin.reviews.update',$review)}}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Review Status</label>
                                <select name="status" class="form-select" aria-label="Default select example">
                                    <option>{{$review->approval_status}}</option>
                                    @foreach(\App\Enums\ReviewStatus::cases() as $approval_status)
                                        <option name="{{$approval_status}}" value="{{$approval_status}}"
                                                @if($review->approval_status === $approval_status) style="display:none;" @endif>{{$approval_status}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" value="{{$review->id}}" name="review_id">

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>



    </main>

</x-admin-nav>
