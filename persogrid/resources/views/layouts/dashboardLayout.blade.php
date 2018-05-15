<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('APP_NAME', 'Lola') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js"
            integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+"
            crossorigin="anonymous"></script>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/global.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./css/dashboard.css">

    <!-- dynamic linked css/js-page/s-->
@yield('reslinks')
<!-- /dynamic linked css/js-page/s-->

</head>
<body onload="initDashboard()">
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">

        <div class="col-md-2 collapseButton">
            <a class="navbar-brand" href="/">
                <img class="brandLogo" src="{{ url("../imgs/logo-ohne-claim.png")}}">
            </a>

            <a class="float-right collapseBurger" href="#" data-target="#sidebar" data-toggle="collapse"><i class="fas fa-bars"></i></a>

        </div>
        <div class="container col-md-10">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <input class="searchBar" type="text" placeholder="Bewerber und Jobsuche">
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    <li><a class="nav-link navRight" href=""><i class="far fa-bell"></i></a></li>
                    <li><a class="nav-link navRight" href=""><i class="far fa-comment-alt"></i></a></li>
                    @guest

                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle circleBase type1" href="#"
                               role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ title_case(str_limit(Auth::user()->email , $limit=1, $end="")) }} <span
                                        class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- Modal -->
    <div class="modal fade" id="createOffer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body text-center">
                    <form action="/createOffer" method="post">
                        @csrf
                        <div class="modalText">
                            <h3>Offene Stelle erstellen</h3>
                            Erstellen Sie ihre zu besetzende Stelle.
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="Jobtitel" name="jobtitelB"
                                       id="jobtitel">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="date" class="form-control" placeholder="Datum" name="dateB" id="date">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="Arbeitsort" name="locationB"
                                       id="locationB">
                            </div>

                            <div class="form-group col-md-6">
                                <select id="workload" name="workloadB" class="form-control">
                                    <option selected value="0">Vollzeit</option>
                                    <option value="1">Teilzeit</option>
                                    <option value="2">Voll-/Teilzeit</option>
                                </select>
                            </div>
                        </div>

                        {{--<input id="ex1" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="20" data-slider-step="1" data-slider-value="14"/>--}}

                        <div class="float-right orange educationBB">+Ausbildung</div>
                        <div class="clearfix"></div>

                        <div class="educationB">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" placeholder="Branche" name="brancheB"
                                           id="branche">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" placeholder="Erfahrung"
                                           name="experienceB" id="experience">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" placeholder="Ausbildung"
                                           name="educationB" id="educationB">
                                </div>

                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" placeholder="Abschluss" name="degreeB"
                                           id="degreeB">
                                </div>
                            </div>
                        </div>

                        <div class="float-right orange skillsBB">+Skills</div>
                        <div class="clearfix"></div>

                        <div class="skillsB">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <input type="text" class="form-control"
                                           placeholder="Softskills (Beispiel: Javascript)" name="softskillsB"
                                           id="softskillsB">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <input type="text" class="form-control"
                                           placeholder="Soziale Fähigkeiten (Beispiel: Teamfähigkeit)"
                                           name="socialskillsB" id="socialskillsB">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                        <textarea type="text" class="form-control" placeholder="" name="extraB"
                                                  id="extraB"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Neue Stelle
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row d-flex d-md-block flex-nowrap wrapper">
        <div class="col-md-2 float-left col-1 pl-0 pr-0 collapse width show" id="sidebar">
            <div class="list-group border-0 card text-center text-md-left">

                <div class="listContainer">
                    @if(Auth::user()->hasRole('business'))
                        <a href="" data-toggle="modal" data-target="#createOffer"
                           class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><span
                                    class="d-none d-md-inline">Offene Stelle erstellen</span></a>

                    @endif
                    @if(Auth::user()->hasRole('applicant'))
                        <a href="#" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><span
                                    class="d-none d-md-inline">Neue Stelle finden</span></a>
                    @endif
                </div>
                <div class="listContainer">
                    @if(Auth::user()->hasRole('business'))
                        <a href="/offer" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><span
                                    id="offersClicked" class="d-none d-md-inline">Stellen</span></a>
                        <a href="/matchesBusiness" class="list-group-item d-inline-block collapsed"
                           data-parent="#sidebar"><span id='matchesClicked' class="d-none d-md-inline">Matches</span></a>

                    @endif
                    @if(Auth::user()->hasRole('applicant'))
                        <a href="/myProfile" class="list-group-item d-inline-block collapsed"
                           data-parent="#sidebar"><span id='userprofileClicked' class="d-none d-md-inline">Profil</span></a>
                        <a href="/myMatches" class="list-group-item d-inline-block collapsed"
                           data-parent="#sidebar"><span id='matchesClicked' class="d-none d-md-inline">Matches</span></a>
                    @endif

                    <a href="/messages" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><span
                                id='messagesClicked' class="d-none d-md-inline">Nachrichten</span></a>
                    <a href="/calendar" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><span
                                id='calendarClicked' class="d-none d-md-inline">Kalender</span></a>
                </div>
                <div class="listContainer">
                    <a href="/stats" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><span
                                id='statsClicked' class="d-none d-md-inline">Statistiken</span></a>
                    <a href="/ratings" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><span
                                id='ratingClicked' class="d-none d-md-inline">Bewertungen</span></a>
                    <a href="/apps" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><span
                                id='appsClicked' class="d-none d-md-inline">Apps</span></a>
                </div>
                @if(Auth::user()->hasRole('business'))
                    <a href="/businessprofile" class="list-group-item d-inline-block collapsed"
                       data-parent="#sidebar"><span id='businessClicked' class="d-none d-md-inline">Unternehmensprofil</span></a>
                    <a href="/benefits" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><span
                                id='benefitsClicked' class="d-none d-md-inline">Benefits</span></a>
                @endif
                <a href="/settings" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><span
                            id='settingsClicked' class="d-none d-md-inline">Einstellungen</span></a>
                <a href="/support" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><span
                            id='supportClicked' class="d-none d-md-inline">Support</span></a>
                <a href="{{ route('logout') }}" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><span
                            class="d-none d-md-inline">Abmelden</span></a>
            </div>
        </div>
    </div>

    <div class="col-md-2 float-right col-1 pl-0 pr-0 collapse width show" id="sidebar">
        <div id="clock" class="clock text-center">UHRZEIT</div>
        <div class="date">
            <div class="text-center" id="dateMonth"></div>
            <div class="text-center" id="dateDay"></div>
        </div>
        <div class="progressMatches text-center">MATCHES</div>
        <div class="question">
            <div class="questionBox text-center">
                <div class="questionText">
                    {{\App\Http\Controllers\Dashboard\DashboardController::initDashboard()}}
                </div>

                <button type="button" class="btn btn-secondary">Ja</button>
                <button type="button" class="btn btn-secondary">Nein</button>

            </div>

        </div>
    </div>

    <script type="text/javascript" src="{{ URL::asset('js/dashboard.js') }}"></script>


    <main class="col-md-8 float-left col px-5 pl-md-2 pt-2 main">
        @yield('content')
    </main>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

    $(document).ready(function () {
        $('.educationBB').click(function () {
            $('.educationB').toggle();
        });

        $('.skillsBB').click(function () {
            $('.skillsB').toggle();
        });

        $('.socialMediaBB').click(function () {
            $('.socialMediaB').toggle();
        });

        $('.benefitsBB').click(function () {
            $('.benefitsB').toggle();
        });
    });


</script>
</body>
</html>
