@extends('layouts.dashboardLayout')

@section('reslinks')
    <link rel="stylesheet" type="text/css" href="./css/userprofile.css">

@endsection

@section('content')

    <div class="profileContainer general">

        <div class="row">
            <div class="col-md-4">
                <div class="profileImage">

                </div>
            </div>
            <div class="col-md-8">
                <div class="generalInfo">
                    {{$profile[0]->firstname}} {{$profile[0]->lastname}} <br/>
                    {{$profile[0]->jobtitel}} <br/>
                    {{$profile[0]->degree}} <br/>
                    {{$profile[0]->location}}
                </div>
            </div>
        </div>
    </div>

    <div class="profileContainer personal">
        <div class="row">
            <div class="col-md-6">
                Jobtitel: {{$profile[0]->jobtitel}}
            </div>
            <div class="col-md-6">
                Ausbildung: {{$profile[0]->education}}
            </div>
            <div class="col-md-6">
                Aktueller Stand: {{$profile[0]->state}}
            </div>
            <div class="col-md-6">
                Abschluss: {{$profile[0]->degree}}
            </div>
            <div class="col-md-6">
                Favorisierte Branche: {{$profile[0]->branche}}
            </div>
            <div class="col-md-6">
                Softskills:
            </div>
            <div class="col-md-6">
                Gehalt:
            </div>
            <div class="col-md-6">
                Soziale Fähigkeiten:
            </div>
        </div>

    </div>
    <div class="profileContainer media">


    </div>


@endsection