<x-admin-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('生徒プロフィール詳細') }}
        </h1>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table auto">
                        <tr>
                            <th>氏名</th>
                            <td>{{ $user->family_name }} {{ $user->first_name }}</td>
                        </tr>
                        <tr>
                            <th>性別</th>
                            <td>{{ $sex_options[$user->sex] }}</td>
                        </tr>
                        <tr>
                            <th>学年</th>
                            <td>{{ $grade_options[$user->grade] }}</td>
                        </tr>
                        <tr>
                            <th>希望コマ数</th>
                            <td>
                                @if($user->lesson_times == null)
                                    未設定
                                @else
                                    {{ $user->lesson_times }}コマ
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>希望教科</th>
                            <td>
                                @if ($user->subjects->isEmpty())
                                    未設定
                                @else
                                    @foreach($user->subjects as $subject)
                                        {{ $subject->name }}
                                    @endforeach
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>目標</th>
                            <td>
                                @if ($user->goal === null)
                                    未設定
                                @else
                                    {{ $goal_options[$user->goal] }}
                                @endif
                            </td>
                        </tr>
                    </table>
                    <div>
                        <a class="font-medium text-gray-700 hover:text-blue-700 underline" href="/admin/matching">戻る</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>