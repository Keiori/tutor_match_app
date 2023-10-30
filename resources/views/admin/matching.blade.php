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
                            <div class="ml-4">
                                <a class="text-black hover:text-blue-700 hover:underline hover:underline-offset-2" href="/admin/matching/show_profile/{{ $matched_list->id }}">
                                    {{ $matched_list->family_name }} {{ $matched_list->first_name }}
                                </a>
                            </div>
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
                <div class="ml-4">
                    @foreach ($applicants as $applicant)
                        <div>
                            <a class="text-black hover:text-blue-700 hover:underline hover:underline-offset-2" href="/admin/matching/show_profile/{{ $applicant->id }}">
                                {{ $applicant->family_name }} {{ $applicant->first_name }}
                            </a>
                        </div>
                        <div class="ml-8">
                            <div class="flex justify-start space-x-1">
                                <div class="">
                                    <form method="POST" action="{{ route('admin.matching.accept', ['matching'=>$matchings->where('user_id', $applicant->id)->first()]) }}" id="form_{{ $applicant->id }}_accept">
                                        @csrf
                                        <button class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-1.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800" 
                                            type="button" onclick="acceptMatching({{ $applicant->id }})">承認</button>
                                    </form>
                                </div>
                                <div class="">
                                    <form method='POST' action="{{ route('admin.matching.reject',  ['matching'=>$matchings->where('user_id', $applicant->id)->first()]) }}" id="form_{{ $applicant->id }}_reject">
                                        @csrf
                                        <button class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-1.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900" 
                                            type="button" onclick="rejectMatching({{ $applicant->id }})">却下</button>
                                    </form>
                                </div>
                            </div>
                        </div>
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