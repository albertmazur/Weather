<form action="{{ route("user.remove")}}" method="post">
    @csrf
    @method("delete")
    <input type="hidden" name="cityId" value="{{$city->id}}">
    <button type="submit" class="btn btn-danger">{{__('content.button.remove')}}</button>
</form>
