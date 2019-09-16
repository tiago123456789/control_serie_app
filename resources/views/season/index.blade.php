@extends("layout")

@section("title")
    Seasons
@endsection

@section("content")
    <div class="row">
        @include("elements.messageNotification")
        @include("elements.messageError")
        <a href="{{route("serie")}}" class="btn btn-primary mb-2">
            Back series
        </a>
        <table class="table table-bordered table-striped">
            <tbody>
            @if (count($seasons) == 0)
                <tr>
                    <td colspan="3" class="text-left">
                        <strong>Não foi encontrado nenhum registro.</strong>
                    </td>
                </tr>
            @else
                @foreach($seasons as $key => $season)
                    <tr>
                        <td>Season {{$season["number"]}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection
