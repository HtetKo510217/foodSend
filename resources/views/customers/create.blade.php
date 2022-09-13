<x-layout>
    <x-wrapper>
        <form class="form p-5" action="/register" method="POST">
            @csrf
            <x-form-input name="name"/>
            <x-form-input name="email" type="email"/>
            <x-form-input name="password" type="password"/>
            <x-form-input name="address" />
            <x-form-input name="phone" type="tel"/>
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block">Register</button>
            <a href="/login" class="btn btn-info">Login</a>
          </form>
    </x-wrapper>
 </x-layout>