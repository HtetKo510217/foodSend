@props(['name','type' => 'text','value'])
{{-- @dd($value->$name) --}}
<div class="form-outline mb-4">
    <label class="form-label" for="{{$name}}">{{ucwords($name)}}</label>
    <input type="{{$type}}" name="{{$name}}" id="{{$name}}" class="form-control"  value="{{old($name, isset($value) ? $value->$name : '')}}"/>
    <x-error name="{{$name}}" />
</div>