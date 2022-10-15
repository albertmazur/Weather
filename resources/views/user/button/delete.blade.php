<form action="{{ route("user.remove")}}" method="post">
    @csrf
    @method("delete")
    <input type="hidden" name="cityId" value="{{$city->id}}">
    <button type="submit" class="btn btn-danger">Usuń z mojej listy</button>
</form>
