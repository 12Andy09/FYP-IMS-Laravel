@section('title', 'Users')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users Manage') }}
        </h2>
    </x-slot>
  
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <a href="{{ route('users.create') }}" class="inline-flex items-center h-10 px-6 py-6 text-sm text-green-100 transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800">Create User</a>
                            </div>
                        </div>
                    </div>
                    <table class="table-fixed w-full">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 w-20">ID</th>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">Role</th>
                                <th class="px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody> 
                            @foreach ($users as $adminUser) 
                                <tr>
                                    <td class="border px-4 py-2">{{ $adminUser->id }}</td>
                                    <td class="border px-4 py-2">
                                        
                                        @if ($adminUser->role == "student")
                                        <a class="underline" target="_blank"
                                        href="{{ route('student_profile.show', $adminUser->id) }}">
                                        {{ $adminUser->name }}
                                        </a>
                                        @elseif ($adminUser->role == "company")
                                        <a class="underline" target="_blank"
                                        href="{{ route('company_profile.show', $adminUser->id) }}">
                                        {{ $adminUser->name }}
                                        </a>
                                        @else
                                        {{ $adminUser->name }}
                                    @endif
                                </td>
                                    <td class="border px-4 py-2">{{ $adminUser->email }}</td>
                                    <td class="border px-4 py-2">{{ $adminUser->role }}</td>
                                    <td class="border px-4 py-2">
                                        {{-- <a href="{{ url('/users/' . $adminUser->id . '/edit') }}" class="btn btn-xs btn-info pull-right">Edit</a> --}}
                                        @if ($adminUser->role == "company")
                                        <form action="{{ route('users.update', $adminUser->id) }}" method="POST"
                                            class="d-inline" onclick="return confirm('Are you sure to give permission to post internship for this user?')">
                                            @csrf
                                            @method('PATCH')

                                            @if ($adminUser->company_profile->permission_post != "approved")
                                            <input type="hidden" value="approved" name="post_permission">
                                            <x-primary-button type="submit"  class="my-3" >
                                                Permit Post Permission
                                            </x-primary-button>
                                            @else
                                            <input type="hidden" value="declined" name="post_permission">
                                            <x-primary-button type="submit"  class="my-3" >
                                                Decline Post Permission
                                            </x-primary-button>
                                            @endif
                                        </form>
                                        @endif
                                        <form action="{{ route('users.destroy', $adminUser->id) }}" method="POST"
                                            class="d-inline" onclick="return confirm('Are you sure to delete this?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                                Delete
                                            </button>  
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>