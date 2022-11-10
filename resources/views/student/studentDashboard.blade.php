<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student Dashboard') }}
        </h2>
    </x-slot>
    <form method="GET">
        <div class="md:w-full 2xl:w-4/5 2xl:mx-auto sm:px-6 md:px-24 ">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
            <div class="relative flex sm:w-full">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input 
                    id="default-search"
                    type="text" 
                    name="search" 
                    value="{{ request()->get('search') }}" 
                    class="block lg:w-3/5 p-4 pl-10 w-3/5 text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Position, Location, or Company Overview" 
                    aria-label="Search" 
                    aria-describedby="button-addon2" required>
                <button class="ml-8 my-auto h-10 text-white right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit" id="button-addon2">Search</button>
            </div>
        </div>
    </form>
    <div class="py-12">
        <div class="grid grid-cols-4 gap-0">
            <div class="md:w-full sm:px-6 md:px-24 col-span-3">
                <div class="bg-white overflow-hidden 2xl:w-3/5 shadow-sm mx-auto">
                    
                    @forelse ($internships as $internship)
                    <div>
                        <a href="/view/internship/{{$internship->id}}" class="lg:grid lg:grid-cols-4 md:flex-row md:flex md:flex-col sm:flex-row sm:flex sm:flex-col items-center mb-5 group"> 
                            <img class="object-cover w-full h-96 rounded-t-lg md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="/images/download.png" alt="image">
                            <div class="lg:col-span-3 p-4 leading-normal ">
                                <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white group-hover:text-blue-500">{{$internship->job_position}}</h5>
                                <p class="text-xs text-gray-700 dark:text-gray-400">{{$internship->job_requirement}}</p>
                                <p class="py-4 mb-3 font-normal text-gray-700 dark:text-gray-400">{{ \Illuminate\Support\Str::limit($internship->job_description, 90, $end='...') }}</p>
                                <p><strong>{{$internship->user->name}}</strong></p>
                                <p>{{ $internship->job_location }}</p>
                                <div class="grid grid-cols-2">
                                    <p class="">Last Updated {{date('d/m/Y', strtotime($internship->updated_at));}}</p>
                                    <p class="text-right"><strong>{{$internship->job_duration}}</strong></p>
                                </div>
                            </div>
                        </a>
                    <hr class="h-5">
                    </div>
                    @empty
                    <div>
                        <img src="/images/no-results.png" class=" mx-auto d-block pt-5" style="max-width: 10%" alt="no pic">
                        <h1 class="text-center pt-5">
                            No results found
                        </h1>
                        <p class="text-center text-muted">
                            Try different or more general keywords
                        </p>
                    </div>
                    @endforelse
                    
                </div>
                <span>
                    {{$internships->appends(['search' => request() -> query('search')])->links('pagination::tailwind') }}
                </span>
            </div>
            <div class="">
                <nav class="pt-5">
                    <div class="flex items-center">
                        <ul class="flex flex-col mt-0 mr-6 space-x-8 text-sm font-medium">
                            <li class="">
                                <h5 class="font-bold underline">
                                    Categories
                                </h5>
                            </li>
                            <li class="hover:underline">
                                <a class="" href="/student/dashboard">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmarks" viewBox="0 0 16 16">
                                        <path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4zm2-1a1 1 0 0 0-1 1v10.566l3.723-2.482a.5.5 0 0 1 .554 0L11 14.566V4a1 1 0 0 0-1-1H4z"/>
                                        <path d="M4.268 1H12a1 1 0 0 1 1 1v11.768l.223.148A.5.5 0 0 0 14 13.5V2a2 2 0 0 0-2-2H6a2 2 0 0 0-1.732 1z"/>
                                    </svg>
                                    All Categories
                                </a>
                            </li>
                            @foreach($categories as $category)
                                <li class="flex-col justify-start hover:underline">
                                    <a class="px-3 @if($category->id == explode('/',request()->path())[1]) text-base font-bold @endif {{ (request()->is('/filterCategory/'.$category->id)) ? 'text-base' : '' }} " href="{{ route('filterCategory', $category->id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmarks" viewBox="0 0 16 16">
                                            <path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4zm2-1a1 1 0 0 0-1 1v10.566l3.723-2.482a.5.5 0 0 1 .554 0L11 14.566V4a1 1 0 0 0-1-1H4z"/>
                                            <path d="M4.268 1H12a1 1 0 0 1 1 1v11.768l.223.148A.5.5 0 0 0 14 13.5V2a2 2 0 0 0-2-2H6a2 2 0 0 0-1.732 1z"/>
                                        </svg>
                                        {{ $category->category_title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</x-app-layout>