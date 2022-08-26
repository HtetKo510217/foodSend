<x-layout>
    <x-wrapper>
        <form class="form p-5" action="{{route('owner_store')}}" method="POST">
            @csrf
            <x-form-input name="name"/>
            <x-form-input name="email" type="email"/>
            <x-form-input name="password" type="password"/>
            <x-form-textarea name="address"/>
            <x-form-input name="phone" type="tel"/>
        
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block">Create</button>
            <a href="{{route('owner')}}" class="btn btn-info">Back</a>
          </form>
    </x-wrapper>
 </x-layout>