@extends("layouts.app")

@section("content")
<div>
    <div>
        <h3>{{$city->name}}</h3>
        <p>{{__("content.list.status")}}:
            @if ($city->state!=null) {{$city->state}}
            @else {{__("content.none")}}
            @endif
        </p>
        <p>{{__("content.list.country")}}: {{$city->country}}</p>
        <p>{{__("content.list.coordinates")}}: {{$city->coordLon}}, {{$city->coordLat}}</p>
    </div>
    @if ($userHasCity)
        @include("user.button.delete")
    @else
        @include("user.button.add")
    @endif
    <a class="btn btn-secondary mb-2" role="button" href="{{route("city.index")}}">{{__("content.city_list")}}</a>
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

