<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('トップページ (生徒)') }}
        </h2>
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
                        <td>{{ $sex_options[Auth::user()->sex] }}</td>
                    </tr>
                    <tr>
                        <th>学年</th>
                        <td>{{ $grade_options[Auth::user()->grade] }}</td>
                    </tr>
                    <tr>
                        <th>希望コマ数</th>
                        <td>
                            @if(Auth::user()->lesson_times == null)
                                未設定
                            @else
                                {{ Auth::user()->lesson_times }}コマ
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>希望教科</th>
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
                        <th>目標</th>
                        <td>
                            @if (Auth::user()->goal === null)
                                未設定
                            @else
                                {{ $goal_options[Auth::user()->goal] }}
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
                            <div class="future_events_show">
                                <a href="/dashboard/show_schedule/{{ $future_event->id }}">
                                    {{ $future_event->date->format('Y年n月j日') }}
                                    {{ \Carbon\Carbon::parse($future_event->start_time)->format('H:i') }}
                                        〜 {{ \Carbon\Carbon::parse($future_event->end_time)->format('H:i') }}
                                    @if($future_event->type == 0)
                                        授業
                                    @else
                                        面談
                                    @endif
                                </a>
                            </div>
                        @endforeach
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
                            <div class="past_events_show">
                                <a href="/dashboard/show_schedule/{{ $past_event->id }}">
                                    {{ $past_event->date->format('Y年n月j日') }}
                                    {{ \Carbon\Carbon::parse($past_event->start_time)->format('H:i') }}
                                        〜 {{ \Carbon\Carbon::parse($past_event->end_time)->format('H:i') }}
                                    @if($past_event->type == 0)
                                        授業
                                    @else
                                        面談
                                    @endif
                            </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
