@section('title', __("Sign in to your account"))

<div>
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <a href="{{ route('home') }}">
            <img src="{{ asset('images/simple_scb_logo.jpeg') }}" class="w-auto h-16 rounded-full mx-auto" />
        </a>

        <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900 leading-9">
            @lang("Sign in to your account")
        </h2>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
            <form wire:submit.prevent="authenticate">
                <div>
                    <x-forms.label for="email" message="Email address"/>
                    <x-inputs.email name="email" />
                    <x-messages.error for="email" />
                </div>

                <div class="mt-6">
                    <x-forms.label for="password" message="Password" />
                    <x-inputs.password name="password" />
                    <x-messages.error for="password" />
                </div>

                <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center">
                        <input wire:model.lazy="remember" id="remember" type="checkbox" class="form-checkbox w-4 h-4 text-yellow-600 transition duration-150 ease-in-out" />
                        <label for="remember" class="block ml-2 text-sm text-gray-900 leading-5">
                            @lang("Remember")
                        </label>
                    </div>

                    <div class="text-sm leading-5">
                        <a href="{{ route('password.request') }}" class="font-medium text-yellow-600 hover:text-yellow-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                            @lang("Forgot your password?")
                        </a>
                    </div>
                </div>

                <div class="mt-6">
                    <x-forms.button type="submit" text="Sign in" />
                </div>
            </form>
        </div>
    </div>
</div>
