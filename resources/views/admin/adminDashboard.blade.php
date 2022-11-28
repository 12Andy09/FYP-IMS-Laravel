@section('title', 'Admin Dashboard')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                        <li class="mr-2" role="presentation">
                            <button class="inline-block p-4 rounded-t-lg border-b-2" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Waiting for Company Approval</button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="true">Waiting for Admin Approval</button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Ongoing</button>
                        </li>
                        <li role="presentation">
                            <button class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="contacts-tab" data-tabs-target="#contacts" type="button" role="tab" aria-controls="contacts" aria-selected="false">Completed</button>
                        </li>
                        <li role="presentation">
                            <button class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="rejected-tab" data-tabs-target="#rejected" type="button" role="tab" aria-controls="rejected" aria-selected="false">Rejected</button>
                        </li>
                    </ul>
                </div>
                <div id="myTabContent">
                    <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        
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
                                    <td class="border px-4 py-2">{{ \Illuminate\Support\Str::limit($application->application_details, 100, $end='...') }} </td>
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
                    <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
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
                            @foreach ($applications_admin as $application)
                            @if ($application->application_status=="waiting_admin")
                                <tr>
                                    <td class="border px-4 py-2"><a class="underline text-blue-600" href="{{ route('student_profile.show', $application->user_id) }}" target="_blank">{{ $application->user_id }}-{{ $application->user->name }}</a></td>
                                    <td class="border px-4 py-2"><a class="underline text-blue-600" href="{{ route('internships.show', $application->internship_id) }}" target="_blank">{{ $application->internship_id }}-{{ $application->internship->job_position }}-{{ $application->internship->user->name }}</a></td>
                                    <td class="border px-4 py-2">{{ \Illuminate\Support\Str::limit($application->application_details, 100, $end='...') }} </td>
                                    <td class="border px-4 py-2">
                                        <form action="{{ route('applications.update', $application->id) }}" method="POST"
                                            class="d-inline" onclick="return confirm('Are you sure to approve this?')">
                                            @csrf
                                            @method('PUT')
                       
                                            <input type="hidden" name="application_status" value="doing">

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
                            {{$applications_admin->links('pagination::tailwind') }}
                        </span>
                    </div>
                    <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="settings" role="tabpanel" aria-labelledby="settings-tab">
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
                            @foreach ($applications_doing as $application)
                            @if ($application->application_status=="doing")
                                <tr>
                                    <td class="border px-4 py-2"><a class="underline text-blue-600" href="{{ route('student_profile.show', $application->user_id) }}" target="_blank">{{ $application->user_id }}-{{ $application->user->name }}</a></td>
                                    <td class="border px-4 py-2"><a class="underline text-blue-600" href="{{ route('internships.show', $application->internship_id) }}" target="_blank">{{ $application->internship_id }}-{{ $application->internship->job_position }}-{{ $application->internship->user->name }}</a></td>
                                    <td class="border px-4 py-2">{{ \Illuminate\Support\Str::limit($application->application_details, 100, $end='...') }} </td>                                    <td class="border px-4 py-8">
                                        <form action="{{ route('applications.update', $application->id) }}" method="POST"
                                            class="d-inline" onclick="return confirm('Are you sure to complete this application?')">
                                            @csrf
                                            @method('PUT')
                       
                                            <input type="hidden" name="application_status" value="completed">

                                            <x-primary-button type="submit" class="my-3">
                                                Complete
                                            </x-primary-button>
                                        </form>
                                        <form action="{{ route('applications.update', $application->id) }}" method="POST"
                                            class="d-inline" >
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
                            {{$applications_doing->links('pagination::tailwind') }}
                        </span>
                    </div>  
                    <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
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
                            @foreach ($applications_completed as $application)
                            @if ($application->application_status=="completed")
                                <tr>
                                    <td class="border px-4 py-2"><a class="underline text-blue-600" href="{{ route('student_profile.show', $application->user_id) }}" target="_blank">{{ $application->user_id }}-{{ $application->user->name }}</a></td>
                                    <td class="border px-4 py-2"><a class="underline text-blue-600" href="{{ route('internships.show', $application->internship_id) }}" target="_blank">{{ $application->internship_id }}-{{ $application->internship->job_position }}-{{ $application->internship->user->name }}</a></td>
                                    <td class="border px-4 py-8">{{ \Illuminate\Support\Str::limit($application->application_details, 100, $end='...') }} </td>                                </tr>
                                    <form action="{{ route('applications.destroy', $application->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <td>
                                            <button type="submit" onclick="return confirm('Are you sure to delete this?')" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                                Delete
                                            </button>
                                        </td>
                                    </form>
                                </tr>
                            @endif    
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
                                    <th class="px-4 py-2">User ID</th>
                                    <th class="px-4 py-2">Internship ID</th>
                                    <th class="px-4 py-2">Application Details</th>
                                    <th class="px-4 py-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($applications_rejected as $application)
                            @if ($application->application_status=="rejected")
                                <tr>
                                    <td class="border px-4 py-2"><a class="underline text-blue-600" href="{{ route('student_profile.show', $application->user_id) }}" target="_blank">{{ $application->user_id }}-{{ $application->user->name }}</a></td>
                                    <td class="border px-4 py-2"><a class="underline text-blue-600" href="{{ route('internships.show', $application->internship_id) }}" target="_blank">{{ $application->internship_id }}-{{ $application->internship->job_position }}-{{ $application->internship->user->name }}</a></td>
                                    <td class="border px-4 py-10">{{ \Illuminate\Support\Str::limit($application->application_details, 100, $end='...') }} </td>
                                    <form action="{{ route('applications.destroy', $application->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <td>
                                            <button type="submit" onclick="return confirm('Are you sure to delete this?')" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                                Delete
                                            </button>
                                        </td>
                                    </form>
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