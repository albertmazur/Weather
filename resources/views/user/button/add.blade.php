<form action="{{ route("user.add")}}" method="post">
    @csrf
    <input type="hidden" name="cityId" value="{{$city->id}}">
    <button type="submit" class="btn btn-primary">{{__('content.button.add')}}</button>
</form>
