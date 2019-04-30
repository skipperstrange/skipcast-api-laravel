@extends('layouts.auth')

@section('content')
<section id="content" class="m-t-lg wrapper-md animated fadeInUp" style="margin-top:0px;">
    <div class="container aside-xl scrollable">
      <a class="navbar-brand block" href="index.html"><span class="h1 font-bold">{{ config('app.name') }}</a>
      <section class="m-b-lg scrollable">
        <header class="wrapper text-center">
            @include('includes/msgs')
        </header>
         <form method="POST" action="{{ route('login') }}">
                        @csrf
          <div class="form-group">
            <input type="email" placeholder="Email" class="form-control rounded input-lg text-center no-border form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
          </div>
          <div class="form-group">
             <input type="password" placeholder="Password" class="form-control rounded input-lg text-center no-border form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" required>
          </div>
          <div class="checkbox i-checks m-b">
            <label class="m-l">
                <input type="checkbox" checked="" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}><i></i>  {{ __('Remember Me') }}
            </label>
          </div>

          <button type="submit" class="btn btn-lg btn-warning lt b-white b-2x btn-block btn-rounded"><i class="icon-arrow-right pull-right"></i><span class="m-r-n-lg">Sign in</span></button>
          <a href="{{ route('register') }}" class="btn btn-lg btn-info btn-block rounded">Create an account</a>

          <div class="text-center m-t m-b">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
          </div>
        </form>
      </section>
    </div>
</section>
@endsection
