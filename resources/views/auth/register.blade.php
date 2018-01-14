@extends('layouts.login')

@section('content')
    <div class="page-header-image" style="background:url({{ asset('img/vintage-concrete.png') }})"></div>
    <div class="container">
        <div class="col-md-4 content-center">
            <div class="card card-login card-plain">
                <form class="form" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <div class="header header-primary text-center">
                        <div class="logo-container" style="width: 100px">
                            <img src="{{ asset('img/logo.svg') }}" alt="">
                        </div>
                    </div>
                    <div class="content">
                        <div class="input-group form-group-no-border input-lg">
                            <input type="text" class="form-control" placeholder="Name" name="name"
                                   value="{{ old('name') }}"
                                   required autofocus>
                        </div>

                        <div class="input-group form-group-no-border input-lg">
                            <input type="text" class="form-control" placeholder="Gewicht" name="weight"
                                   value="{{ old('weight') }}"
                                   required>
                        </div>

                        <div class="input-group form-group-no-border input-lg">
                            <input type="text" class="form-control" placeholder="E-Mail" name="email"
                                   value="{{ old('email') }}"
                                   required>
                        </div>

                        <div class="input-group form-group-no-border input-lg">
                            <input type="password" class="form-control" placeholder="Passwort" name="password" required>
                        </div>

                        <div class="input-group form-group-no-border input-lg">
                            <input type="password" class="form-control" placeholder="Passwort bestätigen"
                                   name="password_confirmation" required>
                        </div>

                    </div>
                    <div class="footer text-center">
                        <button type="submit" class="btn btn-primary btn-round btn-lg btn-block">
                            Registrieren
                        </button>
                    </div>
                    <div class="text-center">
                        <h6>
                            <a href="{{ url('login') }}" class="link">Anmelden</a>
                        </h6>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

{{--
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

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
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
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
