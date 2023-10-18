<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('予定詳細 (生徒)') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table auto">
                        <tr>
                            <th>日付</th>
                            <td>{{ $event->date->format('Y年n月j日') }}</td>
                        </tr>
                        <tr>
                            <th>時間</th>
                            <td>{{ \Carbon\Carbon::parse($event->start_time)->format('H:i') }}
                                    〜 {{ \Carbon\Carbon::parse($event->end_time)->format('H:i') }}
                            </td>
                        </tr>
                        <tr>
                            <th>授業/面談</th>
                            <td>
                                @if($event->type == 0)
                                    授業
                                @else
                                    面談
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>詳細内容</th>
                            <td>{{ $event->content }}</td>
                        </tr>
                    </table>
                    <div>
                        <a href="/dashboard">戻る</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>