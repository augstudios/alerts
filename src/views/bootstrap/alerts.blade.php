@if(!Alerts::prior()->isEmpty())
    <div class="row">
        <div class="col-md-12">
            @foreach(Alerts::prior() as $alert)
                @include('alerts::bootstrap.alert', $alert)
            @endforeach
        </div>
    </div>
@endif
