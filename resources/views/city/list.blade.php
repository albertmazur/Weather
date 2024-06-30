@extends("layouts.app")

@section("content")
<div>
    <h1>{{__('content.city_list')}}</h1>
    <form action="{{route("city.index")}}" class="border p-2" method="get">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="nameSearch" placeholder="{{__('content.list.name')}}" value="{{ $nameSearch ?? '' }}">
            <label for="nameSearch">{{__('content.list.name')}}</label>
        </div>
        <button class="btn btn-info" type="submit">{{__('content.list.search')}}</button>
    </form>
    <table class="table table-striped">
        <thead>
            @section("headerTable")
            <tr>
                <th>{{__('content.list.lp')}}</th>
                <th>{{__('content.list.name')}}</th>
                <th>{{__('content.list.status')}}</th>
                <th>{{__('content.list.coordinate')}} X</th>
                <th>{{__('content.list.coordinate')}} Y</th>
                <th>{{__('content.list.country')}}</th>
                <th></th>
                <th></th>
            </tr>
            @endsection
            @yield("headerTable")
                <tbody>
                    @foreach ($cities as $city)
                        <tr>
                            <td>{{ $loop->iteration+(($cities->currentPage()-1)*$loop->count) }}</td>
                            <td>{{ $city->name}}</td>
                            <td>{{ $city->state}}</td>
                            <td>{{ $city->coordLon}}</td>
                            <td>{{ $city->coordLat}}</td>
                            <td>{{ $city->country}}</td>
                            <td><a class="btn btn-secondary" role="button" href="{{ route("city.show", ["cityId" =>$city->id])}}">{{__('content.list.details')}}</a></td>

                            @php
                                $jest = false;
                                foreach ($myCities as $c){
                                    if($c->id===$city->id){
                                        $jest= true;
                                        break;
                                    }
                                }
                            @endphp
                            <td>
                            @includeWhen($jest, "user.button.delete")
                            @includeUnless($jest, "user.button.add")
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            <tfoot>
                @yield("headerTable")
            </tfoot>
        </thead>
    </table>
    <div>{{$cities->links()}}</div>

</div>
@endsection
