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
                <label for="number_season">Number season:</label>
                <input type="number" value="1" name="number_season"
                       id="number_season" class="form-control" />
            </div>

            <div class="form-group">
                <label for="number_episode">Number episode:</label>
                <input type="number" value="1" name="number_episode"
                       id="number_episode" class="form-control" />
            </div>


            <div class="form-group">
                <input type="submit" value="Save" class="btn btn-primary" />
            </div>
        </form>
    </div>
@endsection
