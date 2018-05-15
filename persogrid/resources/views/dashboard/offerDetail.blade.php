@extends('layouts.dashboardLayout')

@section('reslinks')
    <link rel="stylesheet" type="text/css" href="./css/offerDetail.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

@endsection

@section('content')

    <div class="bpcontainer businessImage" style="background-image: url({{ asset('imgupload/header'.$bID)}})">

        {{--<img src="{{ asset('imgupload/bLogo_'.$bps[0]->id) }}">--}}
        {{--<div class="panel panel-primary">--}}
            {{--<div class="panel-heading"><h2></h2></div>--}}
            {{--<div class="panel-body">--}}
                {{--@if ($message = Session::get('success'))--}}
                    {{--<div class="alert alert-success alert-block">--}}
                        {{--<button type="button" class="close" data-dismiss="alert">×</button>--}}
                        {{--<strong>{{ $message }}</strong>--}}
                    {{--</div>--}}
                    {{--<img src="imgupload/{{ Session::get('image') }}">--}}
                {{--@endif--}}
                {{--@if (count($errors) > 0)--}}
                    {{--<div class="alert alert-danger">--}}
                        {{--<strong>Whoops!</strong> There were some problems with your input.--}}
                        {{--<ul>--}}
                            {{--@foreach ($errors->all() as $error)--}}
                                {{--<li>{{ $error }}</li>--}}
                            {{--@endforeach--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--@endif--}}

            {{--</div>--}}

        {{--</div>--}}
        <div class="businessLogo" style="background-image: url({{ asset('imgupload/logo'.$bID)}})">
            {{--@if(Auth::user()->hasRole('business') && Auth::id() == $offer->creatorID)--}}
            {{--<div id="editLogo"><i class="fas fa-edit editLogo" data-toggle="modal" data-target="#imageUpload"></i></div>--}}
                {{--@endif--}}
        </div>
        {{--@if(Auth::user()->hasRole('business') && Auth::id() == $offer->creatorID)--}}
        {{--<div id="editHeader"><i class="fas fa-edit editHeader" data-toggle="modal" data-target="#imageUpload"></i></div>--}}
            {{--@endif--}}
    </div>

    <!-- Modal -->
    <div class="modal fade" id="imageUpload" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(array('route' => 'image.upload.post','files'=>true)) !!}
                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::file('image', array('class' => 'form-control')) !!}
                        </div>
                        <input type="hidden" value="header" id="type" name="type">
                        {{--<input type="hidden" value="{{$bps[0]->id}}" name="businessID">--}}
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success">Upload</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    @if(Auth::user()->hasRole('business') && Auth::id() == $offer->creatorID)
    Informationen
    <form action="/editOffer" method="post">
        @csrf
        <div class="bpcontainer information">


            <div class="row">
                <div class="form-group col-md-6">
                    Jobtitel:
                    <input type="text" class="form-control" placeholder="Jobtitel" name="jobtitel"
                           value="{{$offer->jobtitel or ""}}"
                           id="jobtitel">
                </div>
                <div class="form-group col-md-6">
                    Datum:
                    <input type="date" class="form-control" placeholder="Datum" name="date" id="date"
                    value="{{$offer->date or ""}}">
                </div>
                <div class="form-group col-md-6">
                    Arbeitsort:
                    <input type="text" class="form-control" placeholder="Arbeitsort" name="location"
                           value="{{$offer->location or ""}}"
                           id="location">
                </div>

                <div class="form-group col-md-6">
                    Arbeitspensum:
                    <select id="workload" name="workload" class="form-control" value="{{$offer->workload or ""}}">
                        <option selected value="0">Vollzeit</option>
                        <option value="1">Teilzeit</option>
                        <option value="2">Voll-/Teilzeit</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    Branche:
                    <input type="text" class="form-control" placeholder="Branche" name="branche"
                           value="{{$offer->branche or ""}}"
                           id="branche">
                </div>
                <div class="form-group col-md-6">
                    Erfahrung:
                    <input type="text" class="form-control" placeholder="Erfahrung" value="{{$offer->experience or ""}}"
                           name="experience" id="experience">
                </div>
                <div class="form-group col-md-6">
                    Ausbildung:
                    <input type="text" class="form-control" placeholder="Ausbildung" value="{{$offer->education or ""}}"
                           name="education" id="education">
                </div>

                <div class="form-group col-md-6">
                    Abschluss:
                    <input type="text" class="form-control" placeholder="Abschluss" name="degree"
                           value="{{$offer->degree or ""}}"
                           id="degree">
                </div>

                <div class="form-group col-md-6">
                    Gehalt:
                    <input type="text" class="form-control" placeholder="Gehalt" name="salary"
                           value="{{$offer->salary or ""}}"
                           id="salary">
                </div>


            </div>

        </div>

        Skills
        <div class="bpcontainer skills">
            <div class="form-group col-md-6">
                Softskills: <input class="form-control" type="text" name="softskills" value="{{$offer->softskills or ""}}">
            </div>
            <div class="form-group col-md-6">
                Soziale Fähigkeiten: <input class="form-control" type="text" value="{{$offer->socialskills or ""}}"
                                            name="socialskills">
            </div>
        </div>
        <input type="hidden" name="id" value="{{$offer->id}}">
        <button type="submit" class="btn btn-primary saveButton">Speichern</button>
    </form>
    <form action="/deleteOffer" method="post" onsubmit="return confirm('Soll die Stelle wirklich gelöscht werden?');">
        @csrf
        <input type="hidden" name="id" value="{{$offer->id}}">
        <button type="submit" class="btn btn-danger">Stelle löschen</button>
    </form>
    @endif
    @if(Auth::user()->hasRole('applicant'))

        <div class="bpcontainer information">
            <div class="row">
                <div class="form-group col-md-6">
                    Jobtitel: {{$offer->jobtitel or ""}}

                </div>
                <div class="form-group col-md-6">
                    Datum: {{$offer->date or ""}}
                </div>
                <div class="form-group col-md-6">
                    Arbeitsort: {{$offer->location or ""}}
                </div>

                <div class="form-group col-md-6">
                    {{--Arbeitspensum--}}
                    {{--@if{{$offer->workload}} == 0--}}
                        {{--Vollzeit--}}
                        {{--@endif--}}
                    {{--@if{{$offer->workload}} == 1--}}
                    {{--Teilzeit--}}
                    {{--@endif--}}
                    {{--@if{{$offer->workload}} == 2--}}
                    {{--Voll-/Teilzeit--}}
                    {{--@endif--}}
                </div>
                <div class="form-group col-md-6">
                    Branche: {{$offer->branche or ""}}
                </div>
                <div class="form-group col-md-6">
                    Erfahrung: {{$offer->experience or ""}}
                </div>
                <div class="form-group col-md-6">
                    Ausbildung: {{$offer->education or ""}}
                </div>

                <div class="form-group col-md-6">
                    Abschluss: {{$offer->degree or ""}}
                </div>

                <div class="form-group col-md-6">
                    Gehalt: {{$offer->salary or ""}}
                </div>
            </div>
        </div>

        {{--Skills--}}
        {{--<div class="bpcontainer skills">--}}
            {{--<div class="form-group col-md-6">--}}
                {{--Softskills: <input class="form-control" type="text" name="softskills" value="{{$offer->softskills or ""}}">--}}
            {{--</div>--}}
            {{--<div class="form-group col-md-6">--}}
                {{--Soziale Fähigkeiten: <input class="form-control" type="text" value="{{$offer->socialskills or ""}}"--}}
                                            {{--name="socialskills">--}}
            {{--</div>--}}
        {{--</div>--}}

        @endif
    <script>

        $(document).ready(function () {
            console.log({{$bID}});
        });
    </script>
@endsection