@extends("layouts.app")

@section("content")
<div>
    <h1>Lista miast</h1>
    <form action="{{route("city.index")}}" class="border p-2" method="get">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="nameSearch" placeholder="Nazwa" value="{{ $nameSearch ?? '' }}">
            <label for="nameSearch">Nazwa</label>
        </div>
        <button class="btn btn-info" type="submit">Szukaj</button>
    </form>
    <table class="table table-striped">
        <thead>
            @section("headerTable")
            <tr>
                <th>Lp</th>
                <th>Nazwa</th>
                <th>Status</th>
                <th>Wspołrzedna X</th>
                <th>Wspołrzedna Y</th>
                <th>Kraj</th>
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
                            <td><a class="btn btn-secondary" role="button" href="{{ route("city.show", ["cityId" =>$city->id])}}">Szczegóły</a></td>

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
