<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Category
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      @foreach ($categories as $item)
      <a class="dropdown-item" href="/?category={{$item->name}}{{request('search')? '&search='.request('search'): ''}}{{request('township') ? '&township='.request('township') : ''}}">{{$item->name}}</a>
      @endforeach
    </div>
  </div>