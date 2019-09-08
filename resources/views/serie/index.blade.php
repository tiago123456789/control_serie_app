@extends("layout")

@section("title")
    Series
@endsection

@section("content")
    <div class="row">
        @include("elements.messageNotification")
        <a href="{{route("serie.new")}}" class="btn btn-primary mb-2">
            New serie
        </a>
        <table class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @if (count($series) == 0)
                <tr>
                    <td colspan="3" class="text-left">
                        <strong>Não foi encontrado nenhum registro.</strong>
                    </td>
                </tr>
            @else
                @foreach($series as $key => $serie)
                    <tr>
                        <td>{{$serie["id"]}}</td>
                        <td>{{$serie["name"]}}</td>
                        <td>
                            <form method="post"
                                  onsubmit="return confirm('Wish remove register?')"
                                  action="{{route("serie.delete", [ "id" => $serie["id"] ])}}">
                                {{ csrf_field() }}
                                @method("delete")
                                <button class="btn btn-danger">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection
