@extends('layouts.dashboardLayout')

@section('reslinks')
    <link rel="stylesheet" type="text/css" href="./css/offer.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

@endsection

@section('content')
    <div class="offer-wrapper">

        <div class="row">
            @if(Auth::user()->hasRole('business'))
            <div class="col-md-2 cardContainer">
                <i class="fas fa-plus-circle addOffer" data-toggle="modal" data-target="#createOffer"></i>
                <div class="addText text-center">Offene Stelle erstellen</div>
            </div>
            @endif
            @foreach($offers as $offer)

                <div class="col-md-2 cardContainer offerUnique">

                        <div class="offerLogo"
                             style="background-image: url({{ asset('imgupload/logo'.$bInfo->id) }})"></div>
                        <div class="offerInfo">
                            <span class="jobtitel">{{$offer->jobtitel}}</span> <br/>
                            {{$offer->location}} <i class="fas fa-map-marker-alt"></i>
                            <div class="dateBot">{{date('d.m.Y', strtotime($offer->date))}}</div>
                            <br/>

                        </div>
                    <form action="/detailOffer" method="post" class="offerForm">
                        @csrf
                        <input type="hidden" name="offerID" value="{{$offer->id}}">
                    </form>
                </div>

            @endforeach
        </div>
    </div>



    <script>
        $(document).ready(function () {
            $(".offerUnique").click(function () {
                $(this).find(".offerForm").submit();
            });
        });
    </script>
@endsection