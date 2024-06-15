<x-layout>

    <h2>
        Sign in to your account
    </h2>

    <x-card class="auth-login">
        <form action="{{route('auth.store')}}" method="POST">
            @csrf

            <div>
                <x-label for="email" :required="true">Email</x-label>
                <x-text-input name="email"/>
            </div>

            <div>
                <x-label for="password" :required="true">Password</x-label>
                <x-text-input name="password" type="password"/>
            </div>

            <div>
                <div>
                    <div>
                        <input type="checkbox" name="remember"/>
                        <label for="remember">Remember me</label>
                    </div>
                </div>

                <div>
                    <a href="#">Forget password?</a>
                </div>
            </div>

            <x-button class="login-button">Login</x-button>
        
        </form>
    </x-card>

</x-layout>