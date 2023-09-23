<x-guest-layout>
    <form method="POST" action="{{ route('admin.register') }}">
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
            <select id="sex" name="sex" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                <option hidden value="">--性別を選択してください--</option>
                <option value="0">男</option>
                <option value="1">女</option>
                <option value="2">その他</option>
            </select>
            <x-input-error :messages="$errors->get('sex')" class="mt-2" />
        </div>

        <!-- Age -->
        <div>
            <x-input-label for="age" :value="__('年齢')" />
            <x-text-input id="age" class="block mt-1 w-full" type="number" name="age" :value="old('age')" required autofocus autocomplete="age" />
            <x-input-error :messages="$errors->get('age')" class="mt-2" />
        </div>
        
        <!-- Institution -->
        <div>
            <x-input-label for="institution" :value="__('所属')" />
            <select id="institution" name="institution" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                <option hidden value="">--所属を選択してください--</option>
                <option value="0">大学</option>
                <option value="1">大学院</option>
                <option value="2">社会人</option>
            <x-input-error :messages="$errors->get('institution')" class="mt-2" />
            </select>
        </div>
        
        <!-- Grade -->
        <div>
            <x-input-label for="grade" :value="__('学年')" />
            <select id="grade" name="grade" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                <option hidden value="">--学年を選択してください--</option>
                <option value="0">大学1年生</option>
                <option value="1">大学2年生</option>
                <option value="2">大学3年生</option>
                <option value="3">大学4年生</option>
                <option value="4">修士1年生</option>
                <option value="5">修士2年生</option>
                <option value="6">社会人</option>
            </select>
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
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('admin.login') }}">
                {{ __('既に登録済みの方はこちら') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('登録') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
