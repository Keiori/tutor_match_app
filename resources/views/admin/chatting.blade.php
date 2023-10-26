<x-admin-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('プライベートチャット(講師)') }}
        </h1>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-lg text-gray-800 leading-loose">生徒選択</h2>
                        @foreach ($matched_lists as $matched_list)
                            <div class="ml-4">
                                <a class="text-black hover:text-blue-700 hover:underline hover:underline-offset-2" href="/admin/chatting/private/{{ $matched_list->id }}">
                                    {{ $matched_list->family_name }} {{ $matched_list->first_name }}
                                </a>
                            </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>