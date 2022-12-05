@section('title', 'Admin Dashboard')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Applications
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                        <li class="mr-2" role="presentation">
                            <button class="inline-block p-4 rounded-t-lg border-b-2" id="company-tab" data-tabs-target="#company" type="button" role="tab" aria-controls="company" aria-selected="false">Waiting for Company Approval</button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="approved-tab" data-tabs-target="#approved" type="button" role="tab" aria-controls="approved" aria-selected="false">Approved</button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="rejected-tab" data-tabs-target="#rejected" type="button" role="tab" aria-controls="rejected" aria-selected="false">Rejected</button>
                        </li>
                    </ul>
                </div>
                <div id="myTabContent">
                    <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="company" role="tabpanel" aria-labelledby="company-tab">
                        
                        <table class="table-fixed w-full">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-2">User ID</th>
                                    <th class="px-4 py-2">Internship ID</th>
                                    <th class="px-4 py-2">Application Details</th>
                                    <th class="px-4 py-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($applications_company as $application)
                            @if ($application->application_status=="waiting_company")
                                <tr>
                                    <td class="border px-4 py-2"><a class="underline text-blue-600" href="{{ route('student_profile.show', $application->user_id) }}" target="_blank">{{ $application->user_id }}-{{ $application->user->name }}</a></td>
                                    <td class="border px-4 py-2"><a class="underline text-blue-600" href="{{ route('internships.show', $application->internship_id) }}" target="_blank">{{ $application->internship_id }}-{{ $application->internship->job_position }}-{{ $application->internship->user->name }}</a></td>
                                    <td class="border px-4 py-2">{{ $application->application_details }}</td>
                                    <td class="border px-4 py-2">
                                        <form action="{{ route('applications.update', $application->id) }}" method="POST"
                                            class="d-inline" onclick="return confirm('Are you sure to approve this?')">
                                            @csrf
                                            @method('PUT')
                       
                                            <input type="hidden" name="application_status" value="waiting_admin">

                                            <x-primary-button type="submit"  class="my-3">
                                                Approve
                                            </x-primary-button>
                                        </form>

                                        <form action="{{ route('applications.update', $application->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('PUT')
                       
                                            <input type="hidden" name="application_status" value="rejected">

                                            <button type="submit" onclick="return confirm('Are you sure to reject this?')" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                                Reject
                                            </button>
                                        </form>
                                    </td>  
                                </tr>
                                
                            @endif    
                            
                            @endforeach    
                            </tbody>  
                        </table>      
                        <span>
                            {{ $applications_company->links('pagination::tailwind') }}
                        </span>
                        
                    </div>
                    <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="approved" role="tabpanel" aria-labelledby="approved-tab">
                        <table class="table-fixed w-full">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-2">User ID</th>
                                    <th class="px-4 py-2">Internship ID</th>
                                    <th class="px-4 py-2">Application Details</th>
                                    <th class="px-4 py-2">Application Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($applications_approved as $application)
                                <tr>
                                    <td class="border px-4 py-2"><a class="underline text-blue-600" href="{{ route('student_profile.show', $application->user_id) }}" target="_blank">{{ $application->user_id }}-{{ $application->user->name }}</a></td>
                                    <td class="border px-4 py-2"><a class="underline text-blue-600" href="{{ route('internships.show', $application->internship_id) }}" target="_blank">{{ $application->internship_id }}-{{ $application->internship->job_position }}-{{ $application->internship->user->name }}</a></td>
                                    <td class="border px-4 py-8">{{ $application->application_details }}</td>
                                    <td class="border px-4 py-10">{{ $application->application_status }}</td>  
                                </tr>  
                            @endforeach   
                            </tbody>  
                        </table>
                        <span>
                            {{$applications_approved->links('pagination::tailwind') }}
                        </span>
                    </div> 
                    <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="rejected" role="tabpanel" aria-labelledby="rejected-tab">
                        <table class="table-fixed w-full">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-2">User ID</th>
                                    <th class="px-4 py-2">Internship ID</th>
                                    <th class="px-4 py-2">Application Details</th>
                                    <th class="px-4 py-2">Application Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($applications_rejected as $application)
                                <tr>
                                    <td class="border px-4 py-2"><a class="underline text-blue-600" href="{{ route('student_profile.show', $application->user_id) }}" target="_blank">{{ $application->user_id }}-{{ $application->user->name }}</a></td>
                                    <td class="border px-4 py-2"><a class="underline text-blue-600" href="{{ route('internships.show', $application->internship_id) }}" target="_blank">{{ $application->internship_id }}-{{ $application->internship->job_position }}-{{ $application->internship->user->name }}</a></td>
                                    <td class="border px-4 py-8">{{ $application->application_details }}</td>
                                    <td class="border px-4 py-10">{{ $application->application_status }}</td>  
                                </tr>
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