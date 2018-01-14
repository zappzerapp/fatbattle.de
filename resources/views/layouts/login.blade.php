<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport'/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"/>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="login-page sidebar-collapse">
<div class="page-header">
    <div class="page-header-image" style="background:url({{ asset('img/vintage-concrete.png') }})"></div>
    <div class="container">
        <div class="col-md-4 content-center">
            <div class="card card-login card-plain">
                <form class="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="header header-primary text-center">
                        <div class="logo-container" style="width: 100px">
                            <img src="{{ asset('img/logo.svg') }}" alt="">
                        </div>
                    </div>
                    <div class="content">
                        <div class="input-group form-group-no-border input-lg">
                            <input type="text" class="form-control" placeholder="E-Mail" value="{{ old('email') }}"
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
</div>
</body>
</html>