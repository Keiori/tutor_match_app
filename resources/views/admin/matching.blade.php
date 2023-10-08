<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('マッチング(講師)') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg text-gray-800 leading-loose">マッチング申請 生徒一覧</h3>
                    <div>
                        @foreach ($applicants as $applicant)
                            {{ $applicant->family_name }} {{ $applicant->first_name }}
                            
                            <form method="POST" action="{{ route('admin.matching.accept', ['matching'=>$matchings->where('user_id', $applicant->id)->first()]) }}">
                                @csrf
                                <button type="submit" class="brn btn-success">承認</button>
                            </form>
                            
                            <form method='POST' action="{{ route('admin.matching.reject',  ['matching'=>$matchings->where('user_id', $applicant->id)->first()]) }}">
                                @csrf
                                <button type="submit" class="btn btn-danger">却下</button>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h3 class="font-semibold text-lg text-gray-800 leading-loose">マッチング済 生徒一覧</h3>
                <div>
                    @foreach ($matched_lists as $matched_list)
                        <p>{{ $matched_list->family_name }} {{ $matched_list->first_name }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>