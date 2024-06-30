<div class="card m-3" style="width: 18rem;">
    <div class="card-body">
        <h2 class="card-title mb-3">{{$city->name}}</h2>
            <p class="card-text">
                {{__('content.temperature')}}: @isset($city->currentWeather()->temperature) {{$city->currentWeather()->temperature}} K @else {{__('content.none')}} @endisset <br>
                {{__('content.humidity')}}: @isset($city->currentWeather()->humidity) {{$city->currentWeather()->humidity}} % @else {{__('content.none')}} @endisset
            </p>
        <a href="{{route("city.show", $city->id)}}" role="button" class="btn btn-primary mb-3">{{__('content.list.details')}}</a>
      @include("user.button.delete")
    </div>
  </div>
