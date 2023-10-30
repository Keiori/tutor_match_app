<x-admin-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("プライベートチャット To " . $user->family_name . " " . $user->first_name)}}
        </h1>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-lg text-gray-800 leading-loose">メッセージ</h2>
                    <div>
                        @if ($chattings != null)
                            @foreach($chattings as $chatting)
                                <p>{{ $chatting->created_at->format('Y/n/j H:i') }}</p>
                                <p>
                                    @if ($chatting->is_admin == 1)
                                        講師 >> {{ $chatting->chatting }}
                                    @else
                                        生徒 >> {{ $chatting->chatting }}
                                    @endif
                                </p>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <body>
                        <form action="/admin/chatting/private/{{$user->id}}" method="post">
                            @csrf
                                <textarea name="chatting" placeholder="メッセージを入力" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required></textarea>
                                <button type="submit">送信</button>
                        </form>
                        <div>
                            <a class="font-medium text-gray-700 hover:text-blue-700 underline" href="/admin/chatting">生徒選択画面に戻る</a>
                        </div>
                    </body>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>