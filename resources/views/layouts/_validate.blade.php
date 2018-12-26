@if(count($errors)>0)
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert"
                aria-hidden="true">
            &times;
        </button>
        <div class="message">
            @foreach($errors->all() as $error)
                {{$error}} <br>
            @endforeach
        </div>
    </div>
@endif
