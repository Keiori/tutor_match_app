<x-admin-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('トップページ(講師)') }}
        </h1>
    </x-slot>

    <div class="py-12">
        <div class"max-w-7xl mx-auto">
            <div class="w-full h-screen grid grid-rows-3 grid-cols-4 gap-4">
                <div class="row-start-1 row-end-4 col-start-1 col-end-3 bg-white border-4 border-cyan-800 rounded-lg p-6 m-3">
                    <h2 class="font-semibold text-xl text-gray-800 leading-loose">プロフィール</h2>
                        <div class="h-1/2 grid grid-rows-5 grid-cols-4">
                            <div class="col-span-4"></div>
                            <div class="mx-4 row-span-3 col-span-2 mx-auto">
                                @if (Auth::user()->portrait_url)
                                    <img class="w-auto h-40" src="{{ Auth::user()->portrait_url }}">
                                @else
                                    <img src="/storage/app/public/icon_user.png" width="250" height="250">
                                @endif
                            </div>
                            <div class="mx-4 col-span-2 underline underline-offset-4 text-center">{{ Auth::user()->family_name }} {{ Auth::user()->first_name }}</div>
                            <div class="mx-4 underline underline-offset-4 text-center">{{ $sex_options[Auth::user()->sex]}}</div>
                            <div class="mx-4 underline underline-offset-4 text-center">{{ Auth::user()->age }} 歳</div>
                            <div class="mx-4 underline underline-offset-4 text-center">{{ $institution_options[Auth::user()->institution] }}</div>
                            <div class="mx-4 underline underline-offset-4 text-center">{{ $grade_options[Auth::user()->grade] }}</div>
                            <div class="col-span-4"></div>
                        </div>
                    
                    <div class="h-1/2 grid grid-rows-5">
                        <div class="mx-4 underline underline-offset-4">
                            指導可能教科 : 
                                @if (Auth::user()->subjects->isEmpty())
                                    未設定
                                @else
                                    @foreach(Auth::user()->subjects as $subject)
                                        {{ $subject->name }}
                                    @endforeach
                                @endif
                            </div>
                        <div class="mx-4 underline underline-offset-4">
                            指導歴 : 
                                @if(Auth::user()->teach_experience === null)
                                    未設定
                                @else
                                    {{ $teach_experience_options[Auth::user()->teach_experience] }}
                                @endif
                        </div>
                        <div class="mx-4 underline underline-offset-4">
                            実績 : 
                                @if(Auth::user()->record == null)
                                    未設定
                                @else
                                    {{ Auth::user()->record }}
                                @endif
                        </div>
                        <div class="mx-4 underline underline-offset-4">
                            ZOOMリンク : 
                                @if(Auth::user()->zoom_link == null)
                                    未設定
                                @else
                                    {{ Auth::user()->zoom_link }}
                                @endif
                        </div>
                        <div class="mx-4 underline underline-offset-4">
                            自己紹介コメント : 
                                @if(Auth::user()->comment == null)
                                    未設定
                                @else
                                    {{ Auth::user()->comment }}
                                @endif
                        </div>
                    </div>
                </div>
    
    
                <div class="row-start-1 row-end-3 col-start-3 col-end-5 border-4 bg-white border-cyan-800 rounded-lg p-6 m-3">
                    <div class="grid grid-rows-3 grid-cols-2">
                        <div class="row-start-1 row-end-2 col-start-1 col-end-2">
                            <h2 class="font-semibold text-xl text-gray-800 leading-loose">今後の予定一覧</h2>
                        </div>
                        <div class="row-start-1 row-end-2 col-start-2 col-end-3 text-right">
                            <a class="px-2 py-1 bg-blue-400 text-white font-semibold rounded hover:bg-indigo-500" href='/admin/dashboard/add_schedule'>新規予定登録</a>
                        </div>
                        <div class="row-start-2 row-end-4 col-start-1 col-end-3">
                            @foreach ($future_events as $future_event)
                                <div class="ml-4">
                                    <a class="font-medium text-gray-700 hover:text-blue-700 underline underline-offset-2" href="/admin/dashboard/edit_schedule/{{ $future_event->id }}">
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
                        </div>
                    </div>
                </div>
    
                <div class="row-start-3 row-end-4 col-start-3 col-end-5 bg-white border-4 border-cyan-800 rounded-lg p-6 m-3">
                    <h2 class="font-semibold text-xl text-gray-800 leading-loose">過去の予定一覧</h2>
                        @foreach ($past_events as $past_event)
                            <div class="ml-4">
                                <a class="font-medium text-gray-700 hover:text-blue-700 underline underline-offset-2" href="/admin/dashboard/edit_schedule/{{ $past_event->id }}">
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
