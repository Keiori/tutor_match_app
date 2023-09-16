<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Family Name -->
        <div>
            <x-input-label for="family_name" :value="__('姓')" />
            <x-text-input id="family_name" class="block mt-1 w-full" type="text" name="family_name" :value="old('family_name')" required autofocus autocomplete="family_name" />
            <x-input-error :messages="$errors->get('family_name')" class="mt-2" />
        </div>
        
        <!-- First Name -->
        <div>
            <x-input-label for="first_name" :value="__('名')" />
            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="first_name" />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>
        
        <!-- Sex -->
        <div>
            <x-input-label for="sex" :value="__('性別')" />
            <x-text-input id="sex" class="block mt-1 w-full" type="number" name="sex" :value="old('sex')" required autofocus autocomplete="sex" />
            <x-input-error :messages="$errors->get('sex')" class="mt-2" />
        </div>
        
        <!-- Grade -->
        <div>
            <x-input-label for="grade" :value="__('学年')" />
            <x-text-input id="grade" class="block mt-1 w-full" type="number" name="grade" :value="old('grade')" required autofocus autocomplete="grade" />
            <x-input-error :messages="$errors->get('grade')" class="mt-2" />
        </div>
        
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('メールアドレス')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('パスワード')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('パスワード確認')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('登録') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
