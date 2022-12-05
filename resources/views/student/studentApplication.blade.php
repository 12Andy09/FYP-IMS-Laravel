@section('title', 'Admin Dashboard')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My applications') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                        <li class="mr-2" role="presentation">
                            <button class="inline-block p-4 rounded-t-lg border-b-2" id="waiting-tab" data-tabs-target="#waiting" type="button" role="tab" aria-controls="waiting" aria-selected="false">Waiting for approval</button>
                        </li>
                        <li role="presentation">
                            <button class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="approved-tab" data-tabs-target="#approved" type="button" role="tab" aria-controls="approved" aria-selected="false">Approved</button>
                        </li>
                        <li role="presentation">
                            <button class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="rejected-tab" data-tabs-target="#rejected" type="button" role="tab" aria-controls="rejected" aria-selected="false">Rejected</button>
                        </li>
                    </ul>
                </div>
                <div id="myTabContent">
                    <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="waiting" role="tabpanel" aria-labelledby="waiting-tab">
                        
                        <table class="table-fixed w-full">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-2">Intership Name</th>
                                    <th class="px-4 py-2">Internship Company</th>
                                    <th class="px-4 py-2">Internship Job</th>
                                    <th class="px-4 py-2">Application Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($applications_student as $application)
                                <tr>
                                    <td class="border px-4 py-2"><a class="underline text-blue-600" href="/view/internship/{{ $application->internship_id }}" target="_blank">{{ $application->internship->job_description }}</a></td>
                                    <td class="border px-4 py-2"><a class="underline text-blue-600" href="{{ route('company_profile.show', $application->internship->user_id) }}" target="_blank">{{ $application->internship->user->name }}</a></td>
                                    <td class="border px-4 py-10">{{ $application->internship->job_position }}</td>  
                                    <td class="border px-4 py-10">{{ $application->application_status }}</td>  
                                </tr>     
                            @endforeach    
                            </tbody>  
                        </table>      
                        <span>
                            {{ $applications_student->links('pagination::tailwind') }}
                        </span>
                        
                    </div>
                    <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="approved" role="tabpanel" aria-labelledby="approved-tab">
                        <table class="table-fixed w-full">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-2">Intership Name</th>
                                    <th class="px-4 py-2">Internship Company</th>
                                    <th class="px-4 py-2">Internship Job</th>
                                    <th class="px-4 py-2">Application Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($applications_completed as $application)
                                <tr>
                                    <td class="border px-4 py-2"><a class="underline text-blue-600" href="/view/internship/{{ $application->internship_id }}" target="_blank">{{ $application->internship->job_description }}</a></td>
                                    <td class="border px-4 py-2"><a class="underline text-blue-600" href="{{ route('company_profile.show', $application->internship->user_id) }}" target="_blank">{{ $application->internship->user->name }}</a></td>
                                    <td class="border px-4 py-10">{{ $application->internship->job_position }}</td>  
                                    <td class="border px-4 py-10">{{ $application->application_status }}</td>  
                                </tr>  
                            @endforeach   
                            </tbody>  
                        </table>
                        <span>
                            {{$applications_completed->links('pagination::tailwind') }}
                        </span>
                    </div> 
                    <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="rejected" role="tabpanel" aria-labelledby="rejected-tab">
                        <table class="table-fixed w-full">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-2">Intership Name</th>
                                    <th class="px-4 py-2">Internship Company</th>
                                    <th class="px-4 py-2">Internship Job</th>
                                    <th class="px-4 py-2">Application Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($applications_rejected as $application)
                            @if ($application->application_status=="rejected")
                                <tr>
                                    <td class="border px-4 py-2"><a class="underline text-blue-600" href="/view/internship/{{ $application->internship_id }}" target="_blank">{{ $application->internship->job_description }}</a></td>
                                    <td class="border px-4 py-2"><a class="underline text-blue-600" href="{{ route('company_profile.show', $application->internship->user_id) }}" target="_blank">{{ $application->internship->user->name }}</a></td>
                                    <td class="border px-4 py-10">{{ $application->internship->job_position }}</td>  
                                    <td class="border px-4 py-10">{{ $application->application_status }}</td>  
                                </tr>
                            @endif    
                            @endforeach   
                            </tbody>  
                        </table>
                        <span>
                            {{ $applications_rejected->links('pagination::tailwind') }}
                        </span>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>