@extends("layouts.app")

@section("content")
<div>
    <div>
        <h3>{{$user->name}} {{$user->lastName}}</h3>
        <p>Email: {{$user->email}}</p>
        <p>Data utworzenia konta: {{$user->created_at}}</p>
    </div>
    <a href="{{route("home")}}">Główna strona</a>
</div>
@endsection
