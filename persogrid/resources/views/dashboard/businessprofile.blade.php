@extends('layouts.dashboardLayout')

@section('reslinks')
    <link rel="stylesheet" type="text/css" href="./css/businessprofile.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

@endsection

@section('content')

    <div class="bpcontainer businessImage" style="background-image: url({{ asset('imgupload/header'.$bps[0]->id)}})">

        {{--<img src="{{ asset('imgupload/bLogo_'.$bps[0]->id) }}">--}}
        <div class="panel panel-primary">
            <div class="panel-heading"><h2></h2></div>
            <div class="panel-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    {{--<img src="imgupload/{{ Session::get('image') }}">--}}
                @endif
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </div>

        </div>
        <div class="businessLogo" style="background-image: url({{ asset('imgupload/logo'.$bps[0]->id) }}">
            <div id="editLogo"><i class="fas fa-edit editLogo" data-toggle="modal" data-target="#imageUpload"></i></div>
        </div>

        <div id="editHeader"><i class="fas fa-edit editHeader" data-toggle="modal" data-target="#imageUpload"></i></div>
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
                        <input type="hidden" value="{{$bps[0]->id or ""}}" name="businessID">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success">Upload</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <div class="bpcontainer information">


            <form action="/editBusinessprofile" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        Firma:
                        <input class="form-control" type="text" value="{{$bps[0]->businessName or ""}}" name="businessName">
                    </div>
                    <div class="col-md-6">
                        Name: <input class="form-control" type="text" value="{{$bps[0]->name or ""}}" name="name">
                    </div>
                    <div class="col-md-6">
                        Gründungsjahr:
                        <input class="form-control" type="date" value="{{$bps[0]->foundyear or ""}}" name="foundyear">
                    </div>
                    <div class="col-md-6">
                        Unternehmensgröße: <input class="form-control" type="text" value="{{$bps[0]->size or ""}}"
                                                  name="size">
                    </div>
                    <div class="col-md-6">
                        Ort: <input class="form-control" type="text" value="{{$bps[0]->location or ""}}" name="location">
                    </div>
                    <div class="col-md-6">
                        E-Mail: <input class="form-control" type="text" value="{{$bps[0]->email or ""}}" name="email">
                    </div>
                    <div class="col-md-6">
                        PLZ: <input class="form-control" type="text" value="{{$bps[0]->plz or ""}}" name="plz">
                    </div>
                    <div class="col-md-6">
                        Telefonnummer: <input class="form-control" type="text" value="{{$bps[0]->telnr or ""}}"
                                              name="telnr">
                    </div>
                    <div class="col-md-6">
                        Straße: <input class="form-control" type="text" value="{{$bps[0]->street or ""}}" name="street">
                    </div>
                    <div class="col-md-6">
                        Website: <input class="form-control" type="text" value="{{$bps[0]->website or ""}}" name="website">
                    </div>

                    <button type="submit" class="btn btn-primary saveButton">Speichern</button>
                </div>
            </form>


    </div>


    <script>

        $(document).ready(function () {
            $('#editHeader').click(function () {
                $(".modal-header h5").html('Header ändern');
                $("#type").val('header');

            });
            $("#editLogo").click(function () {
                $(".modal-header h5").html('Logo ändern');
                $("#type").val('logo');
            });
        });
    </script>
@endsection