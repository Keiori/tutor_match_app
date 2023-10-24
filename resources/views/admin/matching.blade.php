<x-admin-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('マッチング(講師)') }}
        </h1>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-lg text-gray-800 leading-loose">マッチング済 生徒一覧</h2>
                    <div>
                        @foreach ($matched_lists as $matched_list)
                            <a href="/admin/matching/show_profile/{{ $matched_list->id }}">
                                <p>{{ $matched_list->family_name }} {{ $matched_list->first_name }}</p>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h2 class="font-semibold text-lg text-gray-800 leading-loose">マッチング申請 生徒一覧</h2>
                <div>
                    @foreach ($applicants as $applicant)
                        <a href="/admin/matching/show_profile/{{ $applicant->id }}">
                            {{ $applicant->family_name }} {{ $applicant->first_name }}
                        </a>
                            
                        <form method="POST" action="{{ route('admin.matching.accept', ['matching'=>$matchings->where('user_id', $applicant->id)->first()]) }}" id="form_{{ $applicant->id }}_accept">
                            @csrf
                            <button type="button" onclick="acceptMatching({{ $applicant->id }})">承認</button>
                        </form>
                        <form method='POST' action="{{ route('admin.matching.reject',  ['matching'=>$matchings->where('user_id', $applicant->id)->first()]) }}" id="form_{{ $applicant->id }}_reject">
                            @csrf
                            <button type="button" onclick="rejectMatching({{ $applicant->id }})">却下</button>
                        </form>
                    @endforeach
                    
                    <script>
                            function acceptMatching(id) {
                                'use strict'
                                if (confirm('一度承認するとマッチングが成立します。\nこの操作は取り消せません。\n本当に承認しても良いですか？')) {
                                    document.getElementById(`form_${id}_accept`).submit();
                                }
                            }
                            function rejectMatching(id) {
                                'use strict'
                                if (confirm('本当に却下しますか？')) {
                                    document.getElementById(`form_${id}_reject`).submit();
                                }
                            }
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>