<div class="card m-3" style="width: 18rem;">
    <div class="card-body">
        <h2 class="card-title mb-3">{{$city->name}}</h2>
            <p class="card-text">
                Temperatura: @isset($city->currentWeather()->temperature) {{$city->currentWeather()->temperature}} K @else Brak @endisset <br>
                Wilgotność: @isset($city->currentWeather()->humidity) {{$city->currentWeather()->humidity}} % @else Brak @endisset
            </p>
        <a href="{{route("city.show", $city->id)}}" role="button" class="btn btn-primary mb-3">Szczegóły</a>
      @include("user.button.delete")
    </div>
  </div>
