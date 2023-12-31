<x-app-layout>
    <div class="h-screen flex justify-center items-center backlogin p-8">
        <div class="bg-form">
            <form
                action="{{ route('login') }}"
                method="POST" 
                class="max-w-[400px] mx-auto p-6 md:p-12"
            >
                @csrf
        
                <div class="title mb-8 ">
                    <h3>{{ __('Login to your account')}}</h3>
                </div>
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')"/>
        
                <div class="mb-4">
                    <x-input type="email" name="email" placeholder="{{ __('Your email address')}}" :value="old('email')" class="w-full account"/>
                </div>
                <div class="mb-4">
                    <x-input type="password" name="password" placeholder="{{ __('Your password')}}" :value="old('password')"  class="w-full account"/>
                </div>
                <div class="flex justify-between items-center mb-5">
                    <div class="flex items-center">
                        <input
                            id="loginRememberMe"
                            type="checkbox"
                            class="mr-3 rounded border-gray-300 focus:ring-transparent formselect"
                        />
                        <label for="loginRememberMe" class="small">{{ __('Remember me')}}</label>
                    </div>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="small a-secondary">
                        {{ __('Forgot password?')}}'
                        </a>
                    @endif
                </div>
                <div class="grid grid-cols-5 gap-3 mb-3 items-center">
                    <div class="col-span-3">
                        <button
                            class="btn-primary w-full"
                        >
                        {{ __('Login')}}
                        </button>
                    </div>
                    <div class="col-span-2">
                        <a
                                href="{{ route('register') }}"
                                class="btn-secondary w-full block"
                            >
                            {{ __('Sign in')}}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>