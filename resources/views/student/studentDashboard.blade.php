<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="md:w-4/5 sm:px-6 lg:px-24">
            <div class="bg-white overflow-hidden w-4/5 2xl:w-3/5 shadow-sm mx-auto">
                @forelse ($internships as $internship)
                <div>
                    <a href="/view/internship/{{$internship->id}}}" class="grid grid-cols-4 flex-col items-center md:flex-row mb-5 group"> 
                        <img class="object-cover w-full h-96 rounded-t-lg md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="/images/download.png" alt="image">
                        <div class="col-span-3 p-4 leading-normal ">
                            <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white group-hover:text-blue-500">{{$internship->job_position}}</h5>
                            <p class="text-xs text-gray-700 dark:text-gray-400">{{$internship->job_requirement}}</p>
                            <p class="py-4 mb-3 font-normal text-gray-700 dark:text-gray-400">{{ \Illuminate\Support\Str::limit($internship->job_description, 90, $end='...') }}</p>
                            <p><strong>{{$internship->user->name}}</strong></p>
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
        </div>
    </div>
</x-app-layout>
