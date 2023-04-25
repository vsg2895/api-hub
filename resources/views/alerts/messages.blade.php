@if ($message = Session::get('success'))
    <div class="alert w-50 custom-alert alert-success alert-dismissible fade show" role="alert">
        <span class="alert-icon"></span>
        <span class="alert-text">{{$message}}</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="message_close" aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="alert w-50 custom-alert alert-danger alert-dismissible fade show" role="alert">
        <span class="alert-text">{{$message}}</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="message_close" aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if ($errors->any())
    <div class="alert w-50 custom-alert alert-danger alert-dismissible fade show mt-3 mr-2" role="alert">
        @if(count($errors) > 1)
            @foreach($errors->all() as $error)
                <span class="message_close" class="alert-text">{{$error}}</span>
                <hr>
            @endforeach
        @else
            <span class="alert-text">{{$errors->all()[0]}}</span>
        @endif
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="message_close" aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
