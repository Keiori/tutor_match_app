<x-admin-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('トップページ(講師)') }}
        </h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="table auto">
                    <tr>
                        <th>氏名</th>
                        <td>{{ Auth::user()->family_name }} {{ Auth::user()->first_name }}</td>
                    </tr>
                    <tr>
                        <th>性別</th>
                        <td>{{ $sex_options[Auth::user()->sex]}}</td>
                    </tr>
                    <tr>
                        <th>年齢</th>
                        <td>{{ Auth::user()->age }} 歳</td>
                    </tr>
                    <tr>
                        <th>所属</th>
                        <td>{{ $institution_options[Auth::user()->institution] }}</td>
                    </tr>
                    <tr>
                        <th>学年</th>
                        <td>{{ $grade_options[Auth::user()->grade] }}</td>
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
                            @if(Auth::user()->teach_experience === null)
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
    </div>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-lg text-gray-800 leading-loose">今後の予定一覧</h2>
                        @foreach ($future_events as $future_event)
                            <div class="future_events_edit">
                                <a href="/admin/dashboard/edit_schedule/{{ $future_event->id }}">
                                    {{ $future_event->date->format('Y年n月j日') }}
                                    {{ \Carbon\Carbon::parse($future_event->start_time)->format('H:i') }}
                                        〜 {{ \Carbon\Carbon::parse($future_event->end_time)->format('H:i') }}
                                    
                                    @if($future_event->type == 0)
                                        授業
                                    @else
                                        面談
                                    @endif
                                    
                                    {{ $future_event->user->family_name }} {{ $future_event->user->first_name }}
                                </a>
                            </div>
                        @endforeach
                    <div>
                        <a href='/admin/dashboard/add_schedule'>新規予定登録</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-lg text-gray-800 leading-loose">過去の予定一覧</h2>
                        @foreach ($past_events as $past_event)
                            <div class="past_events_edit">
                                <a href="/admin/dashboard/edit_schedule/{{ $past_event->id }}">
                                    {{ $past_event->date->format('Y年n月j日') }}
                                    {{ \Carbon\Carbon::parse($past_event->start_time)->format('H:i') }}
                                        〜 {{ \Carbon\Carbon::parse($past_event->end_time)->format('H:i') }}
                                    @if($past_event->type == 0)
                                        授業
                                    @else
                                        面談
                                    @endif
                                    
                                    {{ $past_event->user->family_name }} {{ $past_event->user->first_name }}
                            </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
