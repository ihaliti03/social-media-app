<h1> Share your tweets </h1>
<div class="row">
    <form action="{{route('tweet.create')}}" method="post">
        @csrf
        <div class="mb-3">
            <textarea name="tweet" class="form-control" id="tweet" rows="3"></textarea>
        </div>
        <div class="">
            <button type="submit"  class="btn btn-dark"> Share </button>
        </div>
    </form>
</div>
