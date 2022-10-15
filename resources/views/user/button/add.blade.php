<form action="{{ route("user.add")}}" method="post">
    @csrf
    <input type="hidden" name="cityId" value="{{$city->id}}">
    <button type="submit" class="btn btn-primary">Dodaj do mojej listy</button>
</form>
