<x-layout>
    <x-wrapper>
        <form class="form p-5" action="{{route('foods_store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <x-form-input name="name"/>
            <x-form-input name="image" type="file"/>
            <x-form-input name="price" type="number"/>
            <x-form-input name="discount" type="number"/>
            <x-form-select name="categories" id="category_id" :collection="$categories"  />
            <x-form-select name="restaurants" id="restaurant_id" :collection="$restaurants" />
            <x-form-select name="townships" id="township_id" :collection="$townships" />
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block">Create</button>
            <a href="{{route('foods')}}" class="btn btn-info">Back</a>
          </form>
    </x-wrapper>
 </x-layout>