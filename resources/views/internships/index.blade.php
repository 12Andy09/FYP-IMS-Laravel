@section('title', 'Internships')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Internships') }}
        </h2>
    </x-slot>
  
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="flex items-center justify-between mb-6">
                        <div>
                            @if (Auth::user()->role == "company")
                                @if (Auth::user()->company_profile->permission_post != "approved")
                                    <p class="text-red-700">You are not permitted to post internship, Please contact admin for this issue. Current Permission Status: {{ Auth::user()->company_profile->permission_post }}</p>
                                @else
                                <a href="{{ route('internships.create') }}" class="inline-flex items-center h-10 px-6 py-6 m-2 text-sm text-green-100 transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800">Create Internship</a>
                                @endif
                            @else
                            <a href="{{ route('internships.create') }}" class="inline-flex items-center h-10 px-6 py-6 m-2 text-sm text-green-100 transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800">Create Internship</a>
                            @endif
                        </div>
                    </div>
                    <table class="table-fixed w-full">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 w-20">No.</th>
                                <th class="px-4 py-2">Position</th>
                                <th class="px-4 py-2">Description</th>
                                <th class="px-4 py-2">Requirement</th>
                                <th class="px-4 py-2">Location</th>
                                <th class="px-4 py-2">Category</th>
                                <th class="px-4 py-2">Duration</th>
                                <th class="px-4 py-2">Overview</th>
                                <th class="px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($internships as $internship)
                                <tr>
                                    <td class="border px-4 py-2">{{ $internship->id }}</td>
                                    <td class="border px-4 py-2">{{ $internship->job_position }}</td>
                                    <td class="border px-4 py-2">{{ $internship->job_description }}</td>
                                    <td class="border px-4 py-2">{{ $internship->job_requirement }}</td>
                                    <td class="border px-4 py-2">{{ $internship->job_location }}</td>
                                    <td class="border px-4 py-2">{{ $internship->category->category_title }}</td>
                                    <td class="border px-4 py-2">{{ $internship->job_duration }}</td>
                                    <td class="border px-4 py-2">{{ \Illuminate\Support\Str::limit($internship->company_overview, 60, $end='...') }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ url('/internships/' . $internship->id . '/edit') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 my-3">Edit</a>
                                        
                                        <form action="{{ route('internships.destroy', $internship->id) }}" method="POST"
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
                    <span>
                        {{$internships->appends(['search' => request() -> query('search')])->links('pagination::tailwind') }}
                    </span>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
