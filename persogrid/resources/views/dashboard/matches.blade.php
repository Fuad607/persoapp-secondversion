@extends('layouts.dashboardLayout')

@section('reslinks')
    <link rel="stylesheet" type="text/css" href="./css/matches.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@endsection

@section('content')
    @if(Auth::user()->hasRole('business'))
    <div class="matches-wrapper">
        <div class="row">
            @if($matches->isNotEmpty())
            @foreach($matches as $match)

                <div class="col-md-2 cardContainer matchUnique">

                    {{--<div class="matcheImage"--}}
                         {{--style="background-image: url({{ asset('imgupload/logo'.$bInfo->id) }})">--}}

                    {{--</div>--}}
                    <div class="matchInfo">
                        <span class="name">{{$match->firstname}} {{$match->lastname}}</span> <br/>
                        <span class="jobtitel">{{$match->jobtitel}}</span> <br/>
                        {{$match->location}} <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <form action="/showUser" method="post" class="matchForm">
                        @csrf
                        <input type="hidden" name="userID" value="{{$match->id}}">
                    </form>
                </div>

            @endforeach
            @else

                <div class="col-md-8">Noch keine Matches</div>

            @endif
        </div>

    </div>



    @endif
    @if(Auth::user()->hasRole('applicant'))
        <div class="matches-wrapper">
            <div class="row">
                @if($matches->isNotEmpty())

                @foreach($matches as $match)

                    <div class="col-md-2 cardContainer matchUnique">

                        {{--<div class="matcheImage"--}}
                        {{--style="background-image: url({{ asset('imgupload/logo'.$bInfo->id) }})">--}}

                        {{--</div>--}}
                        <div class="matchInfo">
                            <span class="jobtitel">{{$match->jobtitel}}</span><br/>
                            {{$match->location}} <i class="fas fa-map-marker-alt"></i> <br/>
                            100% Match
                            {{$match->date}}

                        </div>
                        <form action="/detailOffer" method="post" class="matchForm">
                            @csrf
                            <input type="hidden" name="offerID" value="{{$match->id}}">
                        </form>
                    </div>

                @endforeach
                @else
                    Noch keine Matches
                @endif

            </div>

        </div>
    @endif


    <script>
        $(document).ready(function () {
            $(".matchUnique").click(function () {
                $(this).find(".matchForm").submit();
            });
        });
    </script>
@endsection