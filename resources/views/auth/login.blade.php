@extends('layouts.login')

@section('content')
    <div class="page-header-image" style="background-image:url({{ asset('img/brgr.jpg') }})"></div>
    <div class="container">
        <div class="col-md-4 content-center">
            <div class="card card-login card-plain">
                <form class="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="remember" value="1">
                    <div class="header header-primary text-center">
                        <div class="logo-container" style="width: 100px">
                            <img src="{{ asset('img/logo.svg') }}" alt="">
                        </div>
                    </div>
                    <div class="content">
                        <div class="input-group form-group-no-border input-lg">
                            <input type="text" class="form-control" placeholder="E-Mail" name="email"
                                   value="{{ old('email') }}"
                                   required autofocus>
                        </div>
                        <div class="input-group form-group-no-border input-lg">
                            <input type="password" class="form-control" placeholder="Passwort" name="password" required>
                        </div>
                    </div>
                    <div class="footer text-center">
                        <button type="submit" class="btn btn-primary btn-round btn-lg btn-block">
                            Anmelden
                        </button>
                    </div>
                    <div class="text-center">
                        <h6>
                            <a href="{{ url('register') }}" class="link">Registrieren</a>
                        </h6>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

{{--
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
--}}
