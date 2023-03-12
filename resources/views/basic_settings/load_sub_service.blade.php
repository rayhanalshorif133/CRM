@if ($sub_services != null)
    @foreach ($sub_services as $item)
        <option value="{{$item->id}}">{{$item->name}}</option>
    @endforeach
@endif