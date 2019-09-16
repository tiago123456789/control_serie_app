@extends("layout")

@section("title")
    Series
@endsection

@section("content")
    <div class="row">
        @include("elements.messageNotification")
        @include("elements.messageError")
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
                        <td id="item_{{$serie["id"]}}">
                            <p class="col-md-12" style="display: block;">{{$serie["name"]}}</p>
                            <div class="input-group mb-3" style="display: none">
                                <input type="text" class="form-control" value="{{$serie["name"]}}">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Ok</button>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="row offset-4">

                                <button class="btn btn-warning btn_edit_serie" data-id="{{$serie["id"]}}">
                                    Edit
                                </button>&nbsp;&nbsp;&nbsp;
                                <a href="{{ route("season", $serie["id"]) }}"
                                   class="btn btn-primary">
                                    Seasons
                                </a>
                                <form method="post" class="col-md-2"
                                      onsubmit="return confirm('Wish remove register?')"
                                      action="{{route("serie.delete", [ "id" => $serie["id"] ])}}">
                                    {{ csrf_field() }}
                                    @method("delete")
                                    <button class="btn btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    <script>
        function saveChange(id, name) {
            const csrfToken = '{{ csrf_token() }}';
            const url = `${location.origin}/series/${id}/edit`;
            const formData = new FormData();
            formData.append("name", name);
            formData.append("_token", csrfToken);
            fetch(url, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": csrfToken
                },
                body: formData
            }).then(() => disabledInputEdit(id, name));
        }

        function disabledInputEdit(id, name) {
            const selector = `#item_${id}`;
            const element = document.querySelector(selector);
            element.firstElementChild.style.display = "block";
            element.firstElementChild.innerText = name;
            const inputEdit = element.firstElementChild.nextElementSibling;
            inputEdit.style.display = "none";
            inputEdit.querySelector("button[type='submit']").addEventListener("click", saveChange);
        }

        function enableInputEdit(id) {
            const selector = `#item_${id}`;
            const element = document.querySelector(selector);
            element.firstElementChild.style.display = "none";
            const inputEdit = element.firstElementChild.nextElementSibling;
            inputEdit.style.display = "flex";
            inputEdit.querySelector("button[type='submit']").addEventListener("click", function() {
                const name = inputEdit.firstElementChild.value;
                saveChange(id, name);
            });
        }

        document.querySelectorAll(".btn_edit_serie").forEach(function(element) {
            element.addEventListener("click", function(event) {
                event.preventDefault();
                const id = event.target.getAttribute("data-id");
                enableInputEdit(id);
            });
        })
    </script>
@endsection
