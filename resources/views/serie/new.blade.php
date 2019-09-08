@extends("layout")

@section("title")
    New Serie
@endsection

@section("content")
    <div class="row">
        <form action="{{ route("serie.new") }}" class="col-md-12" method="post">
            @include("elements.messageError")
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" />
            </div>

            <div class="form-group">
                <input type="submit" value="Save" class="btn btn-primary" />
            </div>
        </form>
    </div>
@endsection
