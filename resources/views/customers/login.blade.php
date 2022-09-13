<x-layout>
    <h1 class="text-center">Login</h1>
    <x-wrapper>
        <form class="form p-5" action="/login" method="POST">
            @csrf
            <x-form-input name="email" type="email"/>
            <x-form-input name="password" type="password"/>
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block">Login</button>
            <a href="/register" class="btn btn-info">Register</a>
          </form>
    </x-wrapper>
 </x-layout>