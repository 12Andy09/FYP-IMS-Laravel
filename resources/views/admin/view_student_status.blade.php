<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student Status') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                        <li class="mr-2" role="presentation">
                            <button class="inline-block p-4 rounded-t-lg border-b-2" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Waiting Admin</button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Waiting Company</button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Doing</button>
                        </li>
                        <li role="presentation">
                            <button class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="contacts-tab" data-tabs-target="#contacts" type="button" role="tab" aria-controls="contacts" aria-selected="false">Completed</button>
                        </li>
                    </ul>
                </div>
                <div id="myTabContent">
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
                            
                        <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <p>different Profile</p>
                            {{-- @foreach ($applications as $application)
                            @if ($application->application_status=="waiting_company")
                            
                                    <tr>
                                        <td class="border px-4 py-2">{{ $application->user_id }}</td>
                                        <td class="border px-4 py-2">{{ $application->internship_id }}</td>
                                        <td class="border px-4 py-2">{{ $application->application_details }}</td>
                                        <td class="border px-4 py-2">
                                            <form action="{{ route('applications.update', $application->id) }}" method="POST"
                                                class="d-inline" onclick="return confirm('Are you sure to approve this?')">
                                                @csrf

                                                <x-primary-button type="submit" >
                                                    Approve
                                                </x-primary-button>
                                            </form>

                                            <form action="{{ route('applications.destroy', $application->id) }}" method="POST"
                                                class="d-inline" onclick="return confirm('Are you sure to delete this?')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                        {{-- {{ $application->links('pagination::tailwind') }}
                                    </tr>
                            @endif    
                            @endforeach             --}}
                        </div>
                        <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                            <p> different Dashboard</p>
                            {{-- @foreach ($applications as $application)
                            @if ($application->application_status=="waiting_admin")
                                    <tr>
                                        <td class="border px-4 py-2">{{ $application->user_id }}</td>
                                        <td class="border px-4 py-2">{{ $application->internship_id }}</td>
                                        <td class="border px-4 py-2">{{ $application->application_details }}</td>
                                        <td class="border px-4 py-2">
                                            <form action="{{ route('applications.update', $application->id) }}" method="POST"
                                                class="d-inline" onclick="return confirm('Are you sure to approve this?')">
                                                @csrf

                                                <x-primary-button type="submit" >
                                                    Approve
                                                </x-primary-button>
                                            </form>

                                            <form action="{{ route('applications.destroy', $application->id) }}" method="POST"
                                                class="d-inline" onclick="return confirm('Are you sure to delete this?')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                        {{-- {{ $application->links('pagination::tailwind') }}
                                    </tr>
                            @endif    
                            @endforeach --}}
                        </div>
                        <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                            @foreach ($applications as $application)
                                    @if ($application->application_status=="doing")
                                    <tr>
                                        <td class="border px-4 py-2">{{ $application->user_id }}</td>
                                        <td class="border px-4 py-2">{{ $application->internship_id }}</td>
                                        <td class="border px-4 py-2">{{ $application->application_details }}</td>
                                        <td class="border px-4 py-2">
                                            <form action="{{ route('applications.update', $application->id) }}" method="POST"
                                                class="d-inline" onclick="return confirm('Are you sure to approve this?')">
                                                @csrf

                                                <x-primary-button type="submit" >
                                                    Approve
                                                </x-primary-button>
                                            </form>

                                            <form action="{{ route('applications.destroy', $application->id) }}" method="POST"
                                                class="d-inline" onclick="return confirm('Are you sure to delete this?')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                        {{-- {{ $application->links('pagination::tailwind') }}  --}}
                                    </tr>
                                    @endif 
                            @endforeach      
                        </div>  
                        <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
                            @foreach ($applications as $application)
                                    @if ($application->application_status=="completed")
                                    <tr>
                                        <td class="border px-4 py-2">{{ $application->user_id }}</td>
                                        <td class="border px-4 py-2">{{ $application->internship_id }}</td>
                                        <td class="border px-4 py-2">{{ $application->application_details }}</td>
                                        <td class="border px-4 py-2">
                                            <form action="{{ route('applications.update', $application->id) }}" method="POST"
                                                class="d-inline" onclick="return confirm('Are you sure to approve this?')">
                                                @csrf

                                                <x-primary-button type="submit" >
                                                    Approve
                                                </x-primary-button>
                                            </form>

                                            <form action="{{ route('applications.destroy', $application->id) }}" method="POST"
                                                class="d-inline" onclick="return confirm('Are you sure to delete this?')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                        {{-- {{ $application->links('pagination::tailwind')}} --}}
                                    </tr>
                                    @endif
                                @endforeach   
                        </div>
                        </tbody>  
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>