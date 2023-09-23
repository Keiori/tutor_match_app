<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('プロフィール情報') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("プロフィール情報を更新してください。") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="family_name" :value="__('姓')" />
            <x-text-input id="family_name" name="family_name" type="text" class="mt-1 block w-full" :value="old('family_name', $user->family_name)" required autofocus autocomplete="family_name" />
            <x-input-error class="mt-2" :messages="$errors->get('family_name')" />
        </div>
        
        <div>
            <x-input-label for="first_name" :value="__('名')" />
            <x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full" :value="old('first_name', $user->first_name)" required autofocus autocomplete="first_name" />
            <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
        </div>
        
        <div>
            <x-input-label for="sex" :value="__('性別')" />
            <x-text-input id="sex" name="sex" type="number" class="mt-1 block w-full" :value="old('sex', $user->sex)" required autofocus autocomplete="sex" />
            <x-input-error class="mt-2" :messages="$errors->get('sex')" />
        </div>
        
        <div>
            <x-input-label for="grade" :value="__('学年')" />
            <x-text-input id="grade" name="grade" type="number" class="mt-1 block w-full" :value="old('grade', $user->grade)" required autofocus autocomplete="grade" />
            <x-input-error class="mt-2" :messages="$errors->get('grade')" />
        </div>
        
        <div>
            <x-input-label for="lesson_times" :value="__('希望コマ数')" />
            <x-text-input id="lesson_times" name="lesson_times" type="number" class="mt-1 block w-full" :value="old('lesson_times', $user->lesson_times)" required autofocus autocomplete="lesson_times" />
            <x-input-error class="mt-2" :messages="$errors->get('lesson_times')" />
        </div>
        
        <div>
            <x-input-label for="goal" :value="__('目標')" />
            <x-text-input id="goal" name="goal" type="number" class="mt-1 block w-full" :value="old('goal', $user->goal)" required autofocus autocomplete="goal" />
            <x-input-error class="mt-2" :messages="$errors->get('goal')" />
        </div>
        
        <div>
            <x-input-label for="email" :value="__('メールアドレス')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('メールアドレスが未確認です。') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('こちらをクリックして認証メールを再送信してください。') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('あなたのメールアドレスに新しい認証リンクが送信されました。') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('保存') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('保存しました') }}</p>
            @endif
        </div>
    </form>
</section>
