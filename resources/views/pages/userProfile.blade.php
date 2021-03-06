@extends('layouts.app')

@section('title', '| My Profile')

@section('content')
    {{--A view that shows individual profiles of people who are signed up to Viewfinder. This is linked from profile links on the main feed page. It shows that users posts only. --}}

    {{--My script: for donations/payment system --}}
    <script src="https://donorbox.org/install-popup-button.js" type="text/javascript" defer></script>

    <div class="col-md-8 col-md-offset-2">

        @foreach($feeds as $feed)

            <div class="thumbnail">
                @if ($feed->image)
                    {{--Show the posts made by the individual user account.--}}
                    <a href="{{ url ('feed/'.$feed->slug) }}"> <img class="image-style form-spacing-top" src="{{ asset('images/' .$feed->image) }}" height="auto" width="500"> </a>
                @endif
                <div class="caption">
                    {{--Shows all the information about the photo.--}}
                    <h3 class="title-style">{{ $feed -> title }}</h3>
                    <p>Photo ID: {{ $feed->id }}</p>
                    <p class="form-spacing-top">{{ strip_tags($feed -> body), 0, 100 }} {{ strlen($feed -> body) > 300 ? "..." : "" }}</p>
                    <p><a href="https://donorbox.org/viewfinder" class="btn btn-primary dbox-donation-button" role="button">Buy</a></p>
                </div>
            </div>

            <hr>
        @endforeach

        <div class="text-center">
            {!! $feeds->links(); !!}
        </div>

@endsection

