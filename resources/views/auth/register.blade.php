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

                        <div class="form-group-no-border input-group py-2 small rounded-pill"
                             style="background: rgba(255, 255, 255, 0.1);">
                            <div class="col">
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="battleType" value="loose">
                                        <span class="form-check-sign"></span>
                                        Abnehmen
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="battleType" value="gain">
                                        <span class="form-check-sign"></span>
                                        Zunehmen
                                    </label>
                                </div>
                            </div>
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