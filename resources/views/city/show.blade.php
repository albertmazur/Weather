@extends("layouts.app")

@section("content")
<div>
    <div>
        <h3>{{$city->name}}</h3>
        <p>Status:
            @if ($city->state!=null) {{ $city->state}}
            @else Brak
            @endif
        </p>
        <p>Kraj: {{$city->country}}</p>
        <p>Współrzedne: {{$city->coordLon}}, {{$city->coordLat}}</p>
    </div>
    @if ($userHasCity)
        {{-- <form action="{{ route("user.remove")}}" method="post">
            @csrf
            @method("delete")
            <input type="hidden" name="cityId" value="{{$city->id}}">
            <button type="submit" class="btn btn-danger">Usuń z mojej listy</button>
        </form> --}}
        @include("user.button.delete")
    @else
    {{-- <form action="{{ route("user.add")}}" method="post">
        @csrf
        <input type="hidden" name="cityId" value="{{$city->id}}">
        <button type="submit" class="btn btn-primary">Dodaj do mojej listy</button>
    </form> --}}
    @include("user.button.add")
    @endif
    <a class="btn btn-secondary mb-2" role="button" href="{{route("city.index")}}">Lista miast</a>
</div>

<div class="d-flex flex-column">
    @include("city.diagrams.temperature")
    @include("city.diagrams.humidity")
    @include("city.diagrams.tabela")
</div>
@endsection
@php
    $temperature = "[";
    $humidity ="[";
    $label = "[";

    $i = 1;
    $l = count($weathers);
    foreach ($weathers as  $w) {
        if($l!=$i){
            $temperature.= $w->temperature.", ";
            $humidity.= $w->humidity.", ";
            $label.= "'".$w->created_at."', ";
        }
        else{
            $temperature.= $w->temperature;
            $humidity.= $w->humidity;
            $label.= "'".$w->created_at."'";
        }
        $i++;
    }
@endphp
@vite("resources/js/mychart.js")
@section('javascript')
    const weathers = {
        "temperature": {{$temperature."],"}}
        "humidity": {{$humidity."],"}}
        "labels": @php echo htmlspecialchars_decode($label."]"); @endphp
    }
@endsection

