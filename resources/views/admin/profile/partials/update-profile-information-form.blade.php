<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('プロフィール情報') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("プロフィール情報を更新してください。") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('admin.verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('admin.profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="family_name" :value="__('姓')" />
            <x-text-input id="family_name" name="family_name" type="text" class="mt-1 block w-full" :value="old('family_name', $user->family_name)" required/>
            <x-input-error class="mt-2" :messages="$errors->get('family_name')" />
        </div>
        
        <div>
            <x-input-label for="first_name" :value="__('名')" />
            <x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full" :value="old('first_name', $user->first_name)" required/>
            <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
        </div>
        
        <div>
            <x-input-label for="sex" :value="__('性別')" />
            <select id="sex" name="sex" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                <option hidden value="">--性別を選択してください--</option>
                <option value="0" {{ old('sex', $user->sex) === 0 ? 'selected' : '' }}>男</option>
                <option value="1" {{ old('sex', $user->sex) === 1 ? 'selected' : '' }}>女</option>
                <option value="2" {{ old('sex', $user->sex) === 2 ? 'selected' : '' }}>その他</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('sex')" />
        </div>
        
        <div>
            <x-input-label for="age" :value="__('年齢')" />
            <x-text-input id="age" name="age" type="number" class="mt-1 block w-full" :value="old('age', $user->age)" required/>
            <x-input-error class="mt-2" :messages="$errors->get('age')" />
        </div>
        
        <div>
            <x-input-label for="institution" :value="__('所属')" />
            <select id="institution" name="institution" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                <option hidden value="">--所属を選択してください--</option>
                <option value="0" {{ old('institution', $user->institution) === 0 ? 'selected' : '' }}>大学</option>
                <option value="1" {{ old('institution', $user->institution) === 1 ? 'selected' : '' }}>大学院</option>
                <option value="2" {{ old('institution', $user->institution) === 2 ? 'selected' : '' }}>社会人</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('institution')" />
        </div>
        
        <div>
            <x-input-label for="grade" :value="__('学年')" />
            <select id="grade" name="grade" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                <option hidden value="">--学年を選択してください--</option>
                <option value="0" {{ old('grade', $user->grade) === 0 ? 'selected' : '' }}>大学1年生</option>
                <option value="1" {{ old('grade', $user->grade) === 1 ? 'selected' : '' }}>大学2年生</option>
                <option value="2" {{ old('grade', $user->grade) === 2 ? 'selected' : '' }}>大学3年生</option>
                <option value="3" {{ old('grade', $user->grade) === 3 ? 'selected' : '' }}>大学4年生</option>
                <option value="4" {{ old('grade', $user->grade) === 4 ? 'selected' : '' }}>修士1年生</option>
                <option value="5" {{ old('grade', $user->grade) === 5 ? 'selected' : '' }}>修士2年生</option>
                <option value="6" {{ old('grade', $user->grade) === 6 ? 'selected' : '' }}>社会人</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('grade')" />
        </div>
        
        <div>
            <x-input-label for="subject" :value="__('指導可能教科')" />
            <label>
                @foreach($subjects as $subject)
                    <input type="checkbox" value="{{ $subject->id }}" name="subjects_array[]" 
                        class="mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        @if ($user->admin_subject($user->id, $subject->id) == 1)
                            checked="checked"
                        @endif>
                            {{ $subject->name }}
                @endforeach
            </label>
        </div>
        
        <div>
            <x-input-label for="teach_experience" :value="__('指導歴')" />
            <select id="teach_experience" name="teach_experience" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option hidden value="">--指導歴を選択してください--</option>
                <option value="0" {{ old('grade', $user->teach_experience) === 0 ? 'selected' : '' }}>1年未満</option>
                <option value="1" {{ old('grade', $user->teach_experience) === 1 ? 'selected' : '' }}>1年以上2年未満</option>
                <option value="2" {{ old('grade', $user->teach_experience) === 2 ? 'selected' : '' }}>2年以上3年未満</option>
                <option value="3" {{ old('grade', $user->teach_experience) === 3 ? 'selected' : '' }}>3年以上4年未満</option>
                <option value="4" {{ old('grade', $user->teach_experience) === 4 ? 'selected' : '' }}>4年以上5年未満</option>
                <option value="5" {{ old('grade', $user->teach_experience) === 5 ? 'selected' : '' }}>5年以上</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('teach_experience')" />
        </div>
        
        <div>
            <x-input-label for="record" :value="__('実績')" />
            <x-text-input id="record" name="record" type="text" class="mt-1 block w-full" :value="old('record', $user->record)"/>
            <x-input-error class="mt-2" :messages="$errors->get('record')" />
        </div>
        
        <div>
            <x-input-label for="comment" :value="__('自己紹介コメント')" />
            <x-text-input id="comment" name="comment" type="text" class="mt-1 block w-full" :value="old('comment', $user->comment)"/>
            <x-input-error class="mt-2" :messages="$errors->get('comment')" />
        </div>
        
        <div>
            <x-input-label for="portrait_url" :value="__('プロフィール写真')" />
            <input id="portrait_url" name="portrait_url" type="file" accept="image/*" style="display:none"/>
            <button id="fileSelect" type="button" class="bg-gray-400 hover:bg-gray-600 text-white rounded px-2 py-1">画像を選択</button>
            @if (!is_null($user->portrait_url))
                画像が選択されています
            @else
                画像が未登録です
            @endif
            <x-input-error class="mt-2" :messages="$errors->get('portrait_url')" />
        </div>
        
        <div>
            <x-input-label for="zoom_link" :value="__('ZOOMリンク')" />
            <x-text-input id="zoom_link" name="zoom_link" type="text" class="mt-1 block w-full" :value="old('zoom_link', $user->zoom_link)"/>
            <x-input-error class="mt-2" :messages="$errors->get('zoom_link')" />
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
    <script>
        const fileSelect = document.getElementById("fileSelect");
        const fileElem = document.getElementById("portrait_url");
        
        fileSelect.addEventListener("click", (e) => {
            if (portrait_url) {
                portrait_url.click();
            }
        }, false);
    </script>
</section>
