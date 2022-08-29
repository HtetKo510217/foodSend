<x-layout>
    <x-wrapper>
        <form class="form p-5" action="{{route('restaurants_store')}}" method="POST">
            @csrf
            <x-form-input name="name"/>
            <x-form-input name="email" type="email"/>
            <x-form-input name="phone" type="tel"/>
            <x-form-textarea name="address"/>
            <x-form-input name="opening_duration"/>
            <x-form-select name="townships" id="township_id" :collection="$townships" />
            <x-form-select name="restaurants Owner" id="restaurant_owner_id" :collection="$restaurants" />
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block">Create</button>
            <a href="{{route('restaurants')}}" class="btn btn-info">Back</a>
          </form>
    </x-wrapper>
 </x-layout>