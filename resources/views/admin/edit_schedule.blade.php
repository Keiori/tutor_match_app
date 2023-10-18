<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('予定編集 (講師)') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <body>
                        <form action="/admin/dashboard/update_schedule/{{ $event->id }}" method="post">
                            @csrf
                            @method('put')
                            <div>
                                <x-input-label for="user_id" :value="__('生徒名')" />
                                <select id="user_id" name="event[user_id]" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                                    @foreach($matched_users as $matched_user)
                                        <option value="{{ $matched_user->id }}"
                                        @if($event->user_id == $matched_user->id) selected @endif>
                                            {{ $matched_user->family_name }} {{ $matched_user->first_name }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('user_id')" />
                            </div>
                            
                            <div>
                                <x-input-label for="date" :value="__('日付')" />
                                <x-text-input id="date" name="event[date]" type="date" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" :value="old('date', $event->date->format('Y-m-d'))" required/>
                                <x-input-error class="mt-2" :messages="$errors->get('date')" />
                            </div>
                            <div>
                                <x-input-label for="start_time" :value="__('開始時間')" />
                                <x-text-input id="start_time" name="event[start_time]" type="time" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" :value="old('start_time', $event->start_time)" required/>
                                <x-input-error class="mt-2" :messages="$errors->get('start_time')" />
                            </div>
                            <div>
                                <x-input-label for="end_time" :value="__('終了時間')" />
                                <x-text-input id="end_time" name="event[end_time]" type="time" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" :value="old('end_time', $event->end_time)" required/>
                                <x-input-error class="mt-2" :messages="$errors->get('end_time')" />
                            </div>
                            <div>
                                <x-input-label for="type" :value="__('予定の種類')" />
                                <select id="type" name="event[type]" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                                    <option hidden value="">--予定の種類を選択してください--</option>
                                    <option value="0" {{ old('type', $event->type) === 0 ? 'selected' : '' }}>授業</option>
                                    <option value="1" {{ old('type', $event->type) === 1 ? 'selected' : '' }}>面談</option>
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('type')" />
                            </div>
                            <div>
                                {{ $event->content }}
                                <x-input-label for="content" :value="__('詳細内容')" />
                                <textarea id="content" name="event[content]" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" :value="old('content', $event->content)"></textarea>
                                <x-input-error class="mt-2" :messages="$errors->get('content')" />
                            </div>
                            
                            <div>
                                <x-primary-button type='submit'>保存</x-primary-button>
                            </div>
                        </form>
                        <form action="/admin/dashboard/delete_schedule/{{ $event->id }}" id="form_{{ $event->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <x-danger-button type="button" onclick="deleteEvent({{ $event->id }})">削除</x-danger-button>
                        </form>
                        <script>
                            function deleteEvent(id) {
                                'use strict'
                                if (confirm('予定を削除すると復元できません。\n本当に削除しますか？')) {
                                    document.getElementById(`form_${id}`).submit();
                                }
                            }
                        </script>
                        <div>
                            <a href="/admin/dashboard">戻る</a>
                        </div>
                    </body>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>