<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('講師プロフィール詳細') }}
        </h1>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table auto">
                    <tr>
                        <th>氏名</th>
                        <td>{{ $admin->family_name }} {{ $admin->first_name }}</td>
                    </tr>
                    <tr>
                        <th>性別</th>
                        <td>{{ $sex_options[$admin->sex]}}</td>
                    </tr>
                    <tr>
                        <th>年齢</th>
                        <td>{{ $admin->age }} 歳</td>
                    </tr>
                    <tr>
                        <th>所属</th>
                        <td>{{ $institution_options[$admin->institution] }}</td>
                    </tr>
                    <tr>
                        <th>学年</th>
                        <td>{{ $grade_options[$admin->grade] }}</td>
                    </tr>
                    <tr>
                        <th>指導可能教科</th>
                        <td>
                            @if ($admin->subjects->isEmpty())
                                未設定
                            @else
                                @foreach($admin->subjects as $subject)
                                    {{ $subject->name }}
                                @endforeach
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>指導歴</th>
                        <td>
                            @if($admin->teach_experience === null)
                                未設定
                            @else
                                {{ $teach_experience_options[$admin->teach_experience] }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>実績</th>
                        <td>
                            @if($admin->record == null)
                                未設定
                            @else
                                {{ $admin->record }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>自己紹介コメント</th>
                        <td>
                            @if($admin->comment == null)
                                未設定
                            @else
                                {{ $admin->comment }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>プロフィール写真</th>
                        <td>
                            @if($admin->portrait_url == null)
                                未設定
                            @else
                                {{ $admin->portrait_url }}
                            @endif
                        </td>
                    </tr>
                    </table>
                    <div>
                        <a class="font-medium text-gray-700 hover:text-blue-700 underline" href="javascript:history.back();">戻る</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>