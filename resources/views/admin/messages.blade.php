@if(session('messages_create_ok'))
<br>
<div class="alert alert-success col-md-10 aling" role="alert">
    <strong>Aviso :</strong> {{ Session::get('messages_create_ok') }}
    <button type="button" class="close" data-dismiss="alert" alert-label="close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session('messages_delete'))
<br>
<div class="alert alert-danger col-md-10" role="alert">
    <strong>Aviso :</strong> {{ Session::get('messages_delete') }}<button type="button" class="close"
        data-dismiss="alert" alert-label="close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if (session('messages_search'))
<br>
<div class="alert alert-danger col-md-10" role="alert">
    <strong>Aviso :</strong> {{ Session::get('messages_delete') }}<button type="button" class="close"
        data-dismiss="alert" alert-label="close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif