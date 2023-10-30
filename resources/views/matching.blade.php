<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('マッチング(生徒)') }}
        </h1>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form method="get" action="{{ route('matching') }}" class="p-6 text-gray-900">
                    @csrf
                    <h2 class="font-semibold text-xl text-gray-800 leading-loose">検索</h2>
                    <div>
                        <h3 class="text-lg text-gray-800 leading-loose">指導教科</h3>
                            <div class="flex flex-wrap">
                                @foreach($subjects as $subject)
                                    <div class="w-96 my-1">
                                        <input type="checkbox" value="{{ $subject->id }}" name="subjects_array[]" 
                                            class="mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                                @if (!empty($selected)) {{ in_array($subject->id, $selected) ? 'checked' : '' }}@endif>
                                            {{ $subject->name }}
                                    </div>
                                @endforeach
                            </div>
                    </div>
                    <button type="submit">検索</button>
                    
                    <h3 class="font-semibold text-lg text-gray-800 leading-loose">検索結果</h3>
                        @if (!empty($search_results))
                            @foreach($search_results as $search_result)
                                <div>
                                    <a class="text-black hover:text-blue-700 hover:underline hover:underline-offset-2" href="/matching/show_profile/{{ $search_result->id }}">
                                        {{ $search_result->family_name }} {{ $search_result->first_name }}
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <p>検索結果はありません</p>
                        @endif
                </form>
            </div>
        </div>
    </div>
                    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg text-gray-800 leading-loose">マッチング承認済</h3>
                    @foreach($matchers as $matcher)
                        <div>
                            <a class="text-black hover:text-blue-700 hover:underline hover:underline-offset-2" href="/matching/show_profile/{{ $matcher->admin->id }}">
                                {{ $matcher->admin->family_name }} {{ $matcher->admin->first_name }}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>             
    
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h3 class="font-semibold text-lg text-gray-800 leading-loose">マッチング申請中</h3>
                @foreach($appliers as $applier)
                    <div>
                        <a class="text-black hover:text-blue-700 hover:underline hover:underline-offset-2" href="/matching/show_profile/{{ $applier->admin->id }}">
                            {{ $applier->admin->family_name }} {{ $applier->admin->first_name }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg text-gray-800 leading-loose">講師一覧</h3>
                
                    @foreach($admins as $admin)
                        <form action="/matching/{{ $admin->id }}" method="POST">
                            @csrf
                            <div>
                                <a class="text-black hover:text-blue-700 hover:underline hover:underline-offset-2" href="/matching/show_profile/{{ $admin->id }}">
                                    {{ $admin->family_name }} {{ $admin->first_name }}
                                </a>
                            </div>
                            <div>
                                @if ($admin->subjects->isEmpty())
                                    　指導教科　--未設定--
                                @else
                                    　指導教科 : 
                                    @foreach ($admin->subjects as $subject)
                                        {{ $subject->name }}
                                    @endforeach
                                @endif
                            </div>
                            <div>
                                @if ($matching_admins[$admin->id] === 0)
                                    <a href="{{ route('cancel', ['admin'=>$admin->id]) }}" class="btn btn-success btn-sm">
                                        申請取消
                                    </a>
                                @elseif ($matching_admins[$admin->id] === 1)
                                    マッチング成立
                                @else
                                    <a href="{{ route('apply', ['admin'=>$admin->id]) }}" class="btn btn-secondary btn-sm">
                                        申請
                                    </a>
                                @endif
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>