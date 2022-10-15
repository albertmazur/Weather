@extends("layouts.app")

@section("content")
<div>
    <h1>Moja lista miast</h1>
    <div class="row">
        @foreach ($cities as $city)
            @include("user.city.card")
        @endforeach
    </div>
</div>
@endsection
