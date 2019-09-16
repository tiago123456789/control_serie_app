@extends("layout")

@section("title")
    Episodes
@endsection

@section("content")
    <div class="row">
        @include("elements.messageNotification")
        @include("elements.messageError")
        <a href="{{route("serie")}}" class="btn btn-primary mb-2">
            Back series
        </a>

        <form method="post" action="{{ route("season.episodes.watched", [ "seasonId" => $seasonId]) }}"
              class="col-md-12">
            @csrf
            @foreach($episodes as $key => $episode)

                <div class="col-md-12 " style="background-color: #e0e0e0;
                padding: 5px 7px; border: 1px solid rgba(0, 0, 0, .1)">Season {{$episode["number"]}}
                    <input type="checkbox" class="float-right" name="watched[]" value="{{$episode["id"]}}"
                           style="cursor: pointer" {{ $episode["watched"] == true ? 'checked' : '' }}/>
                </div>
            @endforeach
            <div class="form-group mt-1" >
                <input type="submit" class="btn btn-primary" value="Save"/>
            </div>
        </form>
        {{--<table class="table table-bordered table-striped">--}}
        {{--<form action="" method="post">--}}
        {{--<tbody>--}}

        {{--@if (count($episodes) == 0)--}}
        {{--<tr>--}}
        {{--<td colspan="3" class="text-left">--}}
        {{--<strong>Não foi encontrado nenhum registro.</strong>--}}
        {{--</td>--}}
        {{--</tr>--}}
        {{--@else--}}
        {{--@foreach($episodes as $key => $episode)--}}
        {{--<tr>--}}
        {{--<td >--}}
        {{--Episode {{$episode["number"]}}--}}
        {{--<input class="float-right" type="checkbox" name="watched[]" />--}}
        {{--</td>--}}
        {{--</tr>--}}
        {{--@endforeach--}}
        {{--@endif--}}
        {{--</tbody>--}}

        {{--<div class="form-group">--}}
        {{--<input type="submit" class="btn btn-primary" value="Save"/>--}}
        {{--</div>--}}
        {{--</form>--}}
        {{--</table>--}}
    </div>
@endsection
