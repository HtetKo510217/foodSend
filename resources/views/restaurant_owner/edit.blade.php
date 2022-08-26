<x-layout>
    <x-wrapper>
        <form class="form p-5" action="{{route('owner')}}/update/{{$owner->id}}" method="POST">
            @csrf
            <x-form-input name="name" :value="$owner"/>
            <x-form-input name="email" type="email" :value="$owner"/>
            <x-form-input name="password" type="password" />
            <x-form-textarea name="address" :value="$owner"/>
            <x-form-input name="phone" type="tel" :value="$owner"/>
        
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block">update</button>
            <a href="{{route('owner')}}" class="btn btn-info">Back</a>
          </form>
    </x-wrapper>
 </x-layout>