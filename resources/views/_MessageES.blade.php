@if (!empty(session('success')))
    <div style="color: green; font-size:17px; font-weight:bold; " class="alert alert-success my-1" role="alert">
        {{ session('success') }}
    </div>
@endif

@if (!empty(session('error')))
    <div style="color: red; font-size:17px; font-weight:bold;" class="alert alert-danger my-1" role="alert">
        {{ session('error') }}
    </div>
@endif