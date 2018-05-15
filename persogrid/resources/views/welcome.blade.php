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



    <!-- Modal Register -->
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <ul class="nav nav-tabs">
                        <li class="nav-tabs-left text-center">
                            <div class="toggler active show togglerLeft" data-toggle="tab" href="#business">Für Unternehmen</div>
                        </li>
                        <li class="nav-tabs-right text-center">
                            <div class="toggler togglerRight" data-toggle="tab" href="business">Für Bewerber</div>
                        </li>
                    </ul>


                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                        {{--<span aria-hidden="true">&times;</span>--}}
                    {{--</button>--}}
                </div>
                <div class="modal-body">
                    <div class="tab-content">
                        <div id="business" class="tab-pane fade active show">
                            <div class="inputRegister">
                                <form method="POST" class="text-center" action="{{ route('register') }}">
                                    @csrf

                                    <div class="form-group">

                                            <input id="firstname" type="text"
                                                   class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}"
                                                   name="firstname" placeholder="{{ __('Vorname') }}" value="{{ old('firstname') }}" required autofocus>

                                            @if ($errors->has('firstname'))
                                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                            @endif

                                    </div>

                                    <div class="form-group">


                                        <input id="lastname" type="text"
                                               class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}"
                                               name="lastname" placeholder="{{ __('Nachname') }}" value="{{ old('lastname') }}" required autofocus>

                                        @if ($errors->has('lastname'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                        @endif

                                    </div>

                                    <div class="form-group">


                                            <input id="email" type="email"
                                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                   name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required>

                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                            @endif

                                    </div>

                                    <div class="form-group">


                                            <input id="password" type="password"
                                                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                   name="password" placeholder="{{ __('Password') }}" required>

                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                            @endif

                                    </div>

                                    <div class="form-group">


                                            <input id="password-confirm" type="password" class="form-control"
                                                   placeholder="{{ __('Confirm Password') }}" name="password_confirmation" required>

                                    </div>

                                    <div class="form-group">
                                            <input id="role" type="hidden" name="role" value="0">
                                            <button type="submit" class="btn btn-primary registerB">
                                                {{ __('Register') }}
                                            </button>

                                    </div>
                                </form>
                            </div>
                            Indem Sie sich anmelden, stimmen Sie den Nutzungsbedingungen und Datenschutzrichtlinien von
                            x zu.
                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    Sie sind bereits registirert?  <a href="{{ route('login') }}"><span class="orangeLink">Hier einloggen.</span></a>

                </div>
            </div>
        </div>


    </div>


    <!-- Modal Login -->


    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
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
                                            <input id="emailL" type="email" placeholder="{{ __('E-Mail Address') }}" class="form-control{{ $errors->has('emailL') ? ' is-invalid' : '' }}" name="email" value="{{ old('emailL') }}" required autofocus>

                                            @if ($errors->has('emailL'))
                                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('emailL') }}</strong>
                                    </span>
                                            @endif

                                    </div>

                                    <div class="form-group">
                                            <input id="passwordL" type="password" placeholder="{{ __('Password') }}" class="form-control{{ $errors->has('passwordL') ? ' is-invalid' : '' }}" name="password" required>

                                            @if ($errors->has('passwordL'))
                                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('passwordL') }}</strong>
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
                    Sie haben noch keinen Account? <span class="orangeLink" data-toggle="modal" data-target="#registerModal" data-dismiss="modal">Hier kostenlos anmelden.</span>

                </div>
            </div>
        </div>


    </div>

    <script>



        $(document).ready( function(){
            $(".togglerLeft").click(function(){
                $("#role").val('0');
            });
            $(".togglerRight").click(function(){
                $("#role").val('1');
            });

            $(".openRegister").click(function(){
               $("#email").val($(".emailPre").val());
            });


        })
    </script>
@endsection
