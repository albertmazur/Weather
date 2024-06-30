@extends("layouts.app")

@section("content")
<div>
    <div>
        <h3>{{$user->name}} {{$user->lastName}}</h3>
        <p>{{__('content.email')}}: {{$user->email}}</p>
        <p>{{__('content.date_account')}}: {{$user->created_at}}</p>
    </div>
    <a href="{{route("home")}}">{{__('content.home')}}</a>
</div>
@endsection
