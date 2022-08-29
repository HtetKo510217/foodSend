
@props(['name','id','collection','value'])

<div class="form-outline mb-4">
    <label class="form-label" for="{{$name}}">{{ucwords($name)}}</label>
    <select name="{{$id}}" id="{{$name}}" class="form-control">
        @foreach ($collection as $item)
        @if (isset($value))
        <option {{$item->id == $value->id ? 'selected' : ''}} value="{{$item->id}}">{{$item->name}}</option>
        @else
        <option {{$item->id == old($id)? 'selected' : ''}} value="{{$item->id}}">{{$item->name}}</option>
        @endif
        @endforeach
    </select>
    <x-error name="{{$name}}" />
</div>