<x-guest-layout dir="rtl">
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>


            <div class="block mt-4">
                <label for="language" class="inline-flex items-center" style="color:white">Language
                </label>

                <select name="language" id="language"class="rounded border-gray-150 text-indigo-400 shadow-sm focus:border-indigo-150 focus:ring focus:ring-indigo-150 focus:ring-opacity-50" style="width: 100%;
                height: 38px;
                color: black;
            ">
                    <option value="1"  {{ Session::get('locale')=='en'? 'selected' : '' }}>English</option>
                    <option value="2" {{ Session::get('locale')=='ar'? 'selected' : '' }}>Arabic</option>

                </select>

            </div>
            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>


            </div>



            <div class="flex  mt-4"style="justify-content: space-between">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>

                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>

            </div>

        </form>
        <div class="flex items-center justify-end mt-4">
            {{-- <label for=""class="text-sm text-gray-600 hover:text-gray-900">{{ trans('Not have account')  }}   </label> --}}
            {{-- <a class="text-l text-gray-800 hover:text-gray-800" href={{ route('register') }}>{{ trans('register') }} --}}

        </div>
        <div id="msg">
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
$('#language').on('change',function(){

$roleID= document.getElementById("language").value;
//ajax call
$.ajax({
     url: "{{ url('/setsession') }}",
     data: { role: $roleID },
     success:function(data) {
                //   $("#msg").html(data.msg);
                   window.location = "/login";
               }

});
});

    </script>

    </x-auth-card>
</x-guest-layout>


