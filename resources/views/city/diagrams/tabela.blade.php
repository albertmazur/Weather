<div class="m-5">
    <table class="table table-striped">
        <thead>
            @section("headerTable")
            <tr>
                <th>{{__("content.list.lp")}}</th>
                <th>{{__("content.temperature")}}</th>
                <th>{{__("content.humidity")}}</th>
                <th>{{__("content.list.when")}}</th>
            </tr>
            @endsection
            @yield("headerTable")
                <tbody>
                    @foreach ($weathers as $weather)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $weather->temperature}} K</td>
                            <td>{{ $weather->humidity}} %</td>
                            <td>{{ $weather->created_at}}</td>
                        </tr>
                    @endforeach
                </tbody>
            <tfoot>
                @yield("headerTable")
            </tfoot>
        </thead>
    </table>
</div>
