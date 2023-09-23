<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('トップページ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("ログイン中") }}
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <table class="table auto">
        <tr>
            <th>氏名</th>
            <td>{{ Auth::user()->family_name }} {{ Auth::user()->first_name }}</td>
        </tr>
        <tr>
            <th>性別</th>
            <td>
                {{ $sex_options[Auth::user()->sex]}}
            </td>
        </tr>
        <tr>
            <th>年齢</th>
            <td>{{ Auth::user()->age }} 歳</td>
        </tr>
        <tr>
            <th>所属</th>
            <td>
                {{ $institution_options[Auth::user()->institution] }}
            </td>
        </tr>
        <tr>
            <th>学年</th>
            <td>
                {{ $grade_options[Auth::user()->grade] }}
                
            </td>
        </tr>
        <tr>
            <th>指導可能教科</th>
            <td>
                @if (Auth::user()->subjects->isEmpty())
                    未設定
                @else
                    @foreach(Auth::user()->subjects as $subject)
                        {{ $subject->name }}
                    @endforeach
                @endif
            </td>
        </tr>
        <tr>
            <th>指導歴</th>
            <td>
                @if(Auth::user()->teach_experience == null)
                    未設定
                @else
                    {{ $teach_experience_options[Auth::user()->teach_experience] }}
                @endif
            </td>
        </tr>
        <tr>
            <th>実績</th>
            <td>
                @if(Auth::user()->record == null)
                    未設定
                @else
                    {{ Auth::user()->record }}
                @endif
            </td>
        </tr>
        <tr>
            <th>自己紹介コメント</th>
            <td>
                @if(Auth::user()->comment == null)
                    未設定
                @else
                    {{ Auth::user()->comment }}
                @endif
            </td>
        </tr>
        <tr>
            <th>プロフィール写真</th>
            <td>
                @if(Auth::user()->portrait_url == null)
                    未設定
                @else
                    {{ Auth::user()->portrait_url }}
                @endif
            </td>
        </tr>
        <tr>
            <th>ZOOMリンク</th>
            <td>
                @if(Auth::user()->zoom_link == null)
                    未設定
                @else
                    {{ Auth::user()->zoom_link }}
                @endif
            </td>
        </tr>
    </table>
    </div>
    </div>
</x-admin-layout>
