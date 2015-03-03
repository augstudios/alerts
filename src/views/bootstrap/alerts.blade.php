@if(!Alerts::all()->isEmpty())
    <div class="row">
        <div class="col-md-12">
            @foreach(Alerts::all() as $alert)
                @include('alerts::bootstrap.alert', ['alert' => $alert])
            @endforeach
        </div>
    </div>
@endif
