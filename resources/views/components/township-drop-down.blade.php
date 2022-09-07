<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Township
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      @foreach ($townships as $item)
      <a class="dropdown-item" href="/?township={{$item->name}}{{request('search') ? '&search='.request('search') : ''}}{{request('category') ? '&category='.request('category') : ''}}">{{$item->name}}</a>
      @endforeach
    </div>
  </div>