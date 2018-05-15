@extends('layouts.app')

@section('reslinks')
    <link rel="stylesheet" type="text/css" href="./css/welcome.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@endsection
@section('content')

    <div class="welcome-wrapper">
        <div class="welcomeContent text-center">
            <h1>predictive hiring.</h1>
            <h2>The most advanced job-matching plattform for businesses and candidates.</h2>
            <input type="email" name="emailPre" class="emailPre" placeholder="E-Mail Adresse eingeben">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary openRegister" data-toggle="modal" data-target="#registerModal">Jetzt
                kostenlos testen
            </button>
        </div>
    </div>



    <!-- Modal Login -->


    <div class="modal fade modal-dialog-centered" id="loginModal" tabindex="-1" role="dialog" data-show="true" aria-labelledby="loginModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">


                </div>
                <div class="modal-body">
                    <div class="tab-content">
                        <div id="business" class="tab-pane fade active show">
                            <div class="inputRegister">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input id="email" type="email" placeholder="{{ __('E-Mail Address') }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif

                                    </div>

                                    <div class="form-group">
                                        <input id="password" type="password" placeholder="{{ __('Password') }}" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif

                                    </div>

                                    <div class="form-group">

                                        <div class="checkbox text-right">
                                            <label>
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                            </label>
                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <button type="submit" class="btn btn-primary registerB">
                                            {{ __('Login') }}
                                        </button>

                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>

                                    </div>
                                </form>
                            </div>
                            Indem Sie sich anmelden, stimmen Sie den Nutzungsbedingungen und Datenschutzrichtlinien von
                            x zu.
                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    Sie haben noch keinen Account? <a href="{{ route('register') }}"><span class="orangeLink">Hier kostenlos anmelden.</span></a>

                </div>
            </div>
        </div>


    </div>

    <script type="text/javascript">
        $(window).on('load',function(){
            $('#loginModal').modal('show');
        });
    </script>

@endsection
