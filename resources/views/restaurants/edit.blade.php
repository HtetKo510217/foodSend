<x-layout>
    <x-wrapper>
        <form class="form p-5" action="{{route('restaurants')}}/update/{{$restaurant->id}}}}" method="POST">
            @csrf
            @method('patch')
            <x-form-input name="name" :value="$restaurant"/>
            <x-form-input name="email" type="email" :value="$restaurant" />
            <x-form-input name="phone" type="tel" :value="$restaurant"/>
            <x-form-textarea name="address" :value="$restaurant"/>
            <x-form-input name="opening_duration" :value="$restaurant"/>
            <x-form-select name="townships" id="township_id" :collection="$townships" :value="$restaurant"/>
            <x-form-select name="restaurants Owner" id="restaurant_owner_id" :collection="$restaurants_owner" :value="$restaurant" />
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block">Update</button>
            <a href="{{route('restaurants')}}" class="btn btn-info">Back</a>
          </form>
    </x-wrapper>
 </x-layout>