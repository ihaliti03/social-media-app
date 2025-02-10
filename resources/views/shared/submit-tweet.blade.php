@auth()
<h1> Share your tweets </h1>
<div class="row">
    <form action="{{route('tweets.store')}}" method="post">
        @csrf
        @method('post')
        <div class="mb-3">
            <textarea name="content" class="form-control" id="tweet" rows="3"></textarea>
            @error('content')
            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
            @enderror
        </div>
        <div class="">
            <button type="submit"  class="btn btn-dark"> Share </button>
        </div>
    </form>
</div>
@endauth
@guest()
<div class="alert alert-info">
    <a href="/login">Login</a> to share your tweets
</div>
@endguest
