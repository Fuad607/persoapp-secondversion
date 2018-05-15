@extends('layouts.app')

@section('reslinks')
    <link rel="stylesheet" type="text/css" href="./css/welcome.css">
    <link rel="stylesheet" type="text/css" href="./css/boarding.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/bootstrap-slider.min.js"
            integrity="sha256-ssw743RfM8cbNhwou26tmmPhiNhq3buUbRG/RevtfG4=" crossorigin="anonymous"></script>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css"
          integrity="sha256-WfuSLYdzGvlsFU6ImYYSE277WsjfyU30QeGuNIjeJEI=" crossorigin="anonymous"/>
@endsection
@section('content')

    <div class="welcome-wrapper">
        <div class="welcomeContent text-center">
            <h1>predictive hiring.</h1>
            <h2>The most advanced job-matching plattform for businesses and candidates.</h2>
            <input type="email" name="emailPre" class="emailPre" placeholder="E-Mail Adresse eingeben">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary openRegister" data-toggle="modal" data-target="#registerModal">
                Jetzt
                kostenlos testen
            </button>
        </div>
    </div>

    <!-- ModalB0 -->
    <div class="modal fade" id="boardingModal0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                {{--<div class="modal-header">--}}
                {{--<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>--}}
                {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                {{--<span aria-hidden="true">&times;</span>--}}
                {{--</button>--}}
                {{--</div>--}}
                <div class="modal-body text-center">

                    <div class="lolaLogo">
                        <img src="{{asset('imgs/logo-nur-icon.png')}}" alt="lolaLogo">
                    </div>


                    <div class="speech-bubble text-center">
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt
                        ut labore et dolore magna aliquyam erat,
                        sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd
                        gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                    </div>




                    <button type="button" class="btn btn-primary letsGo" data-dismiss="modal" data-toggle="modal"
                            @if(Auth::user()->hasRole('applicant'))
                            data-target="#applicantModal1"
                            @endif
                            @if(Auth::user()->hasRole('business'))
                            data-target="#businessModal1"
                            @endif

                    >Super, los geht's!
                    </button>
                </div>

            </div>
        </div>
    </div>


    @if(Auth::user()->hasRole('applicant'))


        <form action="/initializeApplicant" method="post">
        @csrf
        <!-- ModalB1 -->
            <div class="modal fade" id="applicantModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <div class="modal-body text-center">
                            <div class="modalText">
                                <h3>Profil erstellen</h3>
                                Erstellen Sie ihr persönliches Profil.
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 float-left">
                                    <input type="text" class="form-control" placeholder="Jobtitel" name="jobtitel"
                                           id="jobtitel"
                                    >
                                </div>
                                <div class="form-group col-md-6 float-right">
                                    <input type="text" class="form-control" placeholder="Erfahrung" name="experience"
                                           id="experience"
                                    >
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" placeholder="Aktueller Stand" id="situation"
                                           name="situation">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" placeholder="Gewünschter Ort" id="location"
                                           name="location">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="date" class="form-control" placeholder="Geburtstag" name="birthdate"
                                           id="birthdate"
                                    >
                                </div>
                                <div class="form-group col-md-6">
                                    <select id="workload" name="workload" class="form-control">
                                        <option selected value="0">Vollzeit</option>
                                        <option value="1">Teilzeit</option>
                                        <option value="2">Voll-/Teilzeit</option>
                                    </select>
                                </div>
                            </div>
                            <div class="float-right"><span class="orange">+ Ausbildung</span> <br> <span
                                        class="orange float-right">+Skills</span></div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="Button" data-dismiss="modal"
                                    data-toggle="modal"
                                    data-target="#applicantModal2">Weiter
                            </button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- ModalB2 -->
            <div class="modal fade" id="applicantModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <div class="modal-body text-center">

                            <div class="modalText">
                                <h3>Benefits auswählen</h3>
                                Wählen Sie die Benefits aus, die Sie motivieren würde bei einem Unternehmen zu arbeiten.
                            </div>

                            <div class="row">
                                <div class="col-md-3 benefitContainer car">
                                    <div class="form-check">
                                        <input hidden class="form-check-input" type="checkbox" value=""
                                               id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Wagen

                                        </label>
                                    </div>

                                </div>
                                <div class="col-md-3 benefitContainer travel">
                                    <div class="form-check">
                                        <input hidden class="form-check-input" type="checkbox" value=""
                                               id="defaultCheck2">
                                        <label class="form-check-label" for="defaultCheck2">
                                            Reisen
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 benefitContainer event">
                                    <div class="form-check">
                                        <input hidden class="form-check-input" type="checkbox" value=""
                                               id="defaultCheck3">
                                        <label class="form-check-label" for="defaultCheck3">
                                            Event
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" data-dismiss="modal" data-toggle="modal"
                                    data-target="#applicantModal3">Weiter
                            </button>


                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="applicantModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <div class="modal-body text-center">
                            <div class="modalText">
                                <h3>Bewerbungsvideo</h3>
                                Erstellen Sie ein Bewerbungsvideo und stellen Sie sich kurz vor. Dassteigert Ihre Chance
                                auf ein gutes Match um 40%
                            </div>
                            <div class="videoContainer">

                            </div>

                            <button class="btn btn-primary ">Videoanleitung ansehen</button>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Abschließen</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    @endif


    @if(Auth::user()->hasRole('business'))

        <form action="/initializeBusiness" method="post">
            @csrf


            <div class="modal fade" id="businessModal1" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <div class="modal-body text-center">
                            <div class="modalText">
                                <h3>Unternehmensinformationen</h3>
                                Geben Sie Ihre Unternehmensdaten ein und präsentieren Sie Ihr Unternehmen von der
                                besten
                                Seite.
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" placeholder="Firmenname"
                                           name="businessName">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="number" class="form-control" placeholder="Anzahl der Mitarbeiter"
                                           name="size">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" placeholder="Vorname"
                                           name="firstname">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" placeholder="Nachname"
                                           name="lastname">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="file" class="form-control" placeholder="Logo" name="logo">
                                </div>

                                <div class="form-group col-md-6">
                                    <input type="file" class="form-control" placeholder="Bilder" name="images">
                                </div>
                            </div>

                            <div class="float-right orange socialMediaBB">+Weitere Profile</div>
                            <div class="clearfix"></div>


                            <div class="socialMediaB">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" placeholder="Website"
                                               name="website">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" placeholder="facebook.com/..."
                                               name="facebook">
                                    </div>
                                </div>
                            </div>

                            <div class="float-right orange benefitsBB">+Benefits</div>
                            <div class="clearfix"></div>
                            <div class="benefitsB">
                                <div class="row">
                                    <div class="form-check col-md-6">
                                        <input class="form-check-input" type="checkbox" value="" id="bCar">
                                        <label class="form-check-label" for="carB">
                                            Firmenwagen
                                        </label>
                                    </div>
                                    <div class="form-check col-md-6">
                                        <input class="form-check-input" type="checkbox" value="" id="bTravel">
                                        <label class="form-check-label" for="travelB">
                                            Reisen
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-check col-md-6">
                                        <input class="form-check-input" type="checkbox" value="" id="bEvent">
                                        <label class="form-check-label" for="eventB">
                                            Events
                                        </label>
                                    </div>
                                    <div class="form-check col-md-6">
                                        <input class="form-check-input" type="checkbox" value="" id="bFitness">
                                        <label class="form-check-label" for="fitnessB">
                                            Fitnessstudio
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-check col-md-6">
                                        <input class="form-check-input" type="checkbox" value="" id="bFlat">
                                        <label class="form-check-label" for="flatB">
                                            Wohnung
                                        </label>
                                    </div>
                                    <div class="form-check col-md-6">
                                        <input class="form-check-input" type="checkbox" value="" id="bKids">
                                        <label class="form-check-label" for="kindergardenB">
                                            Kindergarten
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row extraInfoB text-left">
                                <div class="form-group col-md-12">
                                    Warum sollte jemand bei Ihnen arbeiten?
                                    <textarea class="descriptionB"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal"
                                    data-target="#businessModal2">Weiter
                            </button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="businessModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <div class="modal-body text-center">
                            <div class="modalText">
                                <h3>Offene Stelle erstellen</h3>
                                Erstellen Sie ihre zu besetzende Stelle.
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" placeholder="Jobtitel" name="jobtitelO"
                                           id="jobtitelO">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="date" class="form-control" placeholder="Datum" name="dateO" id="dateO">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" placeholder="Arbeitsort" name="locationO"
                                           id="locationO">
                                </div>

                                <div class="form-group col-md-6">
                                    <select id="workloadO" name="workloadO" class="form-control">
                                        <option selected value="0">Vollzeit</option>
                                        <option value="1">Teilzeit</option>
                                        <option value="2">Voll-/Teilzeit</option>
                                    </select>
                                </div>
                            </div>

                            <input id="ex1" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="20" data-slider-step="1" data-slider-value="14"/>

                            <div class="float-right orange educationBB">+Ausbildung</div>
                            <div class="clearfix"></div>

                            <div class="educationB">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" placeholder="Branche" name="brancheO"
                                               id="brancheO">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" placeholder="Erfahrung"
                                               name="experienceO" id="experienceO">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" placeholder="Ausbildung"
                                               name="educationO" id="educationO">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" placeholder="Abschluss" name="degreeO"
                                               id="degreeO">
                                    </div>
                                </div>
                            </div>

                            <div class="float-right orange skillsBB">+Skills</div>
                            <div class="clearfix"></div>

                            <div class="skillsB">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <input type="text" class="form-control"
                                               placeholder="Softskills (Beispiel: Javascript)" name="softskillsO"
                                               id="softskillsO">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <input type="text" class="form-control"
                                               placeholder="Soziale Fähigkeiten (Beispiel: Teamfähigkeit)"
                                               name="socialskillsO" id="socialskillsO">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <textarea type="text" class="form-control" placeholder="" name="desriptionO"
                                                  id="descriptionO"></textarea>
                                    </div>
                                </div>

                            </div>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal"
                                        data-target="#businessModal3">Weiter
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="businessModal3" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <div class="modal-body text-center">
                            <div class="modalText">
                                <h3>Interviewfragen</h3>
                                Tragen Sie hier drei Fragen ein, die der Bewerber in einem kurzen Video beantworten
                                soll.
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <input type="text" class="form-control"
                                           placeholder="Können Sie sich kurz vorstellen?"
                                           name="">
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <input type="text" class="form-control"
                                           placeholder="Was zeichnet Sie besonders aus?"
                                           name="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <input type="text" class="form-control"
                                           placeholder="Welchen Mehrwert können Sie unserem Unternehmen bieten?"
                                           name="">
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Jetzt matchen</button>
                        </div>
                    </div>
                </div>

            </div>


        </form>
    @endif

    <script>

        $(document).ready(function () {

            $('#boardingModal0').modal('show');


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

            var slider = new Slider('#ex1', {
                formatter: function (value) {
                    return value;
                }
            });


        });


    </script>
@endsection
