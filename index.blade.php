<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>
  
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <a href="{{ route('admin.createUser') }}"
                               class="btn btn-primary float-right">{{ __('Create New User') }}</a>
                        </div>
                    </div>
                    <table class="table-fixed w-full">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 w-20">ID</th>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Role</th>
                                <th class="px-4 py-2">School/Workplace</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">Phone</th>
                                <th class="px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody> 
                            @foreach ($admin as $adminUser) 
                                <tr>
                                    <td class="border px-4 py-2">{{ $adminUser->user_id }}</td>
                                    <td class="border px-4 py-2">{{ $adminUser->user_name }}</td>
                                    <td class="border px-4 py-2">{{ $adminUser->user_role }}</td>
                                    <td class="border px-4 py-2">{{ $adminUser->user_schwork }}</td>
                                    <td class="border px-4 py-2">{{ $adminUser->user_email }}</td>
                                    <td class="border px-4 py-2">{{ $adminUser->user_phone }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ url('/admin/' . $adminUser->user_id . '/editUser') }}" class="btn btn-xs btn-info pull-right">Edit</a>

                                        <form action="{{ route('admin.destroy', $adminUser->user_id) }}" method="POST"
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
