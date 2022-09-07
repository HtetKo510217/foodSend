@props(['name','collection'])
<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      {{ucfirst($name)}}
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      @foreach ($collection as $item)
      <a class="dropdown-item" href="/?category={{$item->name}}">{{$item->name}}</a>
      @endforeach
    </div>
  </div>