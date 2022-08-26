@props(['name','value'])
<div class="form-outline mb-4">
    <label class="form-label" for="{{$name}}">{{ucwords($name)}}</label>
    <textarea name="{{$name}}" id="{{$name}}" cols="30" class="form-control" rows="10">{{old($name, isset($value) ? $value->$name : '')}}</textarea>
    <x-error name="{{$name}}" />
</div>