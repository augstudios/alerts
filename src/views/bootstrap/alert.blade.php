<div class="alert alert-{{ array_get($alert, 'type') }}@if(array_get($alert, 'dismissible')){{ ' alert-dismissible' }}@endif" role="alert">
    @if(array_get($alert, 'dismissible'))
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    @endif
    {{ array_get($alert, 'message') }}
</div>
