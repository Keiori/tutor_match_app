<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('トップページ (生徒)') }}
        </h1>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <div class="w-full h-screen grid grid-rows-3 grid-cols-4 gap-4">
                <div class="row-start-1 row-end-4 col-start-1 col-end-3 bg-white border-4 border-cyan-700 p-6 m-3">
                    <h2 class="font-semibold text-xl text-gray-800 leading-loose">プロフィール</h2>
                        <div class="h-3/4 grid grid-rows-7">
                            <div class="row-start-1 row-end-2"></div>
                            <div class="ml-4 row-start-2 row-end-3 underline underline-offset-4">氏名 : {{ Auth::user()->family_name }} {{ Auth::user()->first_name }}</div>
                            <div class="ml-4 row-start-3 row-end-4 underline underline-offset-4">性別 : {{ $sex_options[Auth::user()->sex] }}</div>
                            <div class="ml-4 row-start-4 row-end-5 underline underline-offset-4">学年 : {{ $grade_options[Auth::user()->grade] }}</div>
                            <div class="ml-4 row-start-5 row-end-6 underline underline-offset-4">
                                希望コマ数 : 
                                    @if(Auth::user()->lesson_times == null)
                                        未設定
                                    @else
                                        {{ Auth::user()->lesson_times }}コマ
                                    @endif
                            </div>
                            <div class="ml-4 row-start-6 row-end-7 underline underline-offset-4">
                                希望教科 : 
                                    @if (Auth::user()->subjects->isEmpty())
                                        未設定
                                    @else
                                        @foreach(Auth::user()->subjects as $subject)
                                            {{ $subject->name }}
                                        @endforeach
                                    @endif
                            </div>
                            <div class="ml-4 row-start-7 row-end-8 underline underline-offset-4">
                                目標 : 
                                    @if (Auth::user()->goal === null)
                                        未設定
                                    @else
                                        {{ $goal_options[Auth::user()->goal] }}
                                    @endif
                            </div>
                        </div>
                </div>

    
                <div class="row-start-1 row-end-3 col-start-3 col-end-5 bg-white border-4 border-cyan-800 p-6 m-3">
                    <div class="row-start-1 row-end-2 col-start-1 col-end-2">
                        <h2 class="font-semibold text-xl text-gray-800 leading-loose">今後の予定一覧</h2>
                            @foreach ($future_events as $future_event)
                                <div class="ml-4">
                                    <a class="font-medium text-gray-700 hover:text-blue-700 underline underline-offset-2" href="/dashboard/show_schedule/{{ $future_event->id }}">
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

    
                <div class="row-start-3 row-end-4 col-start-3 col-end-5 bg-white border-4 border-cyan-800 p-6 m-3">
                    <h2 class="font-semibold text-xl text-gray-800 leading-loose">過去の予定一覧</h2>
                        @foreach ($past_events as $past_event)
                            <div class="ml-4">
                                <a class="font-medium text-gray-700 hover:text-blue-700 underline underline-offset-2" href="/dashboard/show_schedule/{{ $past_event->id }}">
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
