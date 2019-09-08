@if(\Illuminate\Support\Facades\Session::has("success"))
    <div class="col-md-12 alert alert-success">
        <p>
            <strong>{{ \Illuminate\Support\Facades\Session::get("success") }}</strong>
        </p>
    </div>
@endif