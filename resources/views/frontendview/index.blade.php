{{-- @dd($foods) --}}
<x-layout>
   <div class="container">
   <div class="row my-4">
    <div class="col-md-8">
        <form action="" >
            <div class="input-group rounded">
                @if (request('category'))
                <input type="hidden" name="category" value="{{request('category')}}">
                @endif
                @if (request('township'))
                <input type="hidden" name="township" value="{{request('township')}}">
                @endif
                <input type="search" name="search" class="form-control rounded" placeholder="Food ..." aria-label="Search" aria-describedby="search-addon" />
                <button type="submit" class="btn">
                    <span class="input-group-text border-0" id="search-addon">
                        <i class="fas fa-search"></i>
                    </span>
                </button>
              </div>
        </form>
    </div>
    <div class="col-md-2">
        <x-category-drop-down />
    </div>
    <div class="col-md-2">
        <x-township-drop-down />
    </div>
   </div>
    <div class="row">
        @foreach ($foods as $food)
        <div class="col-md-3">
            <div class="card" >
                <div class="card-title">
                    <h3 class="text-center pt-3">{{$food->name}}</h3>
                </div>
                <div class="card-body">
                    <img src='{{asset("storage/$food->image")}}' class="w-100 mb-3" style="height: 120px">
                    <p class="d-flex justify-content-around fs-5"><span class="text-primary">Price</span> <span>: {{$food->price}}$</span></p>
                    <p class="d-flex justify-content-around fs-5"><span class="text-primary">Discount</span> <span>: {{$food->discount}}$</span></p>
                    <span>{{$food->category->name}}</span>
                    <span>{{$food->township->name}}</span>
                    <a href="" class="btn btn-primary col-md-12">Add To Card</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
   </div>
 </x-layout>