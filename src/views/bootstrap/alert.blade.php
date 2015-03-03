<div class="alert alert-{{ $alert['type'] }}@if($alert['dismissible']){{ ' alert-dismissible' }}@endif" role="alert">
    @if($alert['dismissible'])
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    @endif
    {{ $alert['message'] }}
</div>
