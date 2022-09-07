<x-layout>
    <x-wrapper>
        <form class="form p-5" action="{{route('foods')}}/update/{{$food->id}}}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <x-form-input name="name" :value="$food"/>
            <div>
                <img src='{{ asset("storage/$food->image") }}' class="w-25">
            </div>
            <x-form-input name="image" type="file" :value="$food"/>
            <x-form-input name="price" type="number" :value="$food"/>
            <x-form-input name="discount" type="number" :value="$food"/>
            <x-form-select name="categories" id="category_id" :collection="$categories" :value="$food" />
            <x-form-select name="restaurants" id="restaurant_id" :collection="$restaurants" :value="$food"/>
            <x-form-select name="townships" id="township_id" :collection="$townships" :value="$food"/>
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block">Update</button>
            <a href="{{route('foods')}}" class="btn btn-info">Back</a>
          </form>
    </x-wrapper>
 </x-layout>