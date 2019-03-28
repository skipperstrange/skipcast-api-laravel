<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">
                        &times;
                    </button>
            @if ($errors->has('email'))
                    <strong>{{ $errors->first('email') }}</strong>
            @endif

            @if ($errors->has('password'))
                   {{ $errors->first('password') }}
            @endif
</div>
