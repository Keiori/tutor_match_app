<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('マッチング(生徒)') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form method="get" action="{{ route('matching') }}" class="p-6 text-gray-900">
                    @csrf
                    <h3 class="font-semibold text-xl text-gray-800 leading-loose">検索</h3>
                    <div>
                        <h4 class="text-lg text-gray-800 leading-loose">指導教科</h4>
                            @foreach($subjects as $subject)
                                <input type="checkbox" value="{{ $subject->id }}" name="subjects_array[]" 
                                    class="mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    {{ $subject->name }}
                            @endforeach
                    </div>
                    <input type="submit" value="検索">
                    
                    <h3 class="font-semibold text-lg text-gray-800 leading-loose">検索結果</h3>
                        @if (!empty($search_results))
                            @foreach($search_results as $search_result)
                                <div>
                                    {{ $search_result->family_name }} {{ $search_result->first_name }}
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
                    <h3 class="font-semibold text-lg text-gray-800 leading-loose">マッチング申請中</h3>
                    @foreach($admins as $admin)
                        <div>
                            @if ($matchings[$admin->id] === 0)
                                {{ $admin->family_name }} {{ $admin->first_name }}
                            @endif
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
                    <h3 class="font-semibold text-lg text-gray-800 leading-loose">マッチング承認済</h3>
                    @foreach($admins as $admin)
                        <div>
                            @if ($matchings[$admin->id] === 1)
                                {{ $admin->family_name }} {{ $admin->first_name }}
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    
    
    
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h3 class="font-semibold text-lg text-gray-800 leading-loose">講師一覧</h3>
                
                @foreach($admins as $admin)
                    <form action="/matching/{{ $admin->id }}" method="POST">
                        @csrf
                        <div>{{ $admin->family_name }} {{ $admin->first_name }}</div>
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
                            @if ($matchings[$admin->id] === 0)
                                <a href="{{ route('cancel', ['admin'=>$admin->id]) }}" class="btn btn-success btn-sm">
                                    申請取消
                                </a>
                            @elseif ($matchings[$admin->id] === 1)
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
</x-app-layout>