<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div className="py-12">
        <div className="md:w-4/5 sm:px-6 lg:px-24">
            <div className="bg-white overflow-hidden w-4/5 shadow-sm mx-auto">\
                @forelse ($internships as $internship)
                <div>
                    <a href={{ route('internships.view',  $internship -> id )}} className="flex flex-col items-center md:flex-row mb-5 group"> 
                        <img className="object-cover w-full h-96 rounded-t-lg md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="/images/download.png" alt="image"></img>
                        <div className="flex flex-col justify-between p-4 leading-normal ">
                            <h5 className="text-2xl font-bold tracking-tight text-gray-900 dark:text-white group-hover:text-blue-500">{{$internships->job_position}}</h5>
                            <p className="text-xs text-gray-700 dark:text-gray-400">{{$internships->job_requirement}}</p>
                            <p className="py-4 mb-3 font-normal text-gray-700 dark:text-gray-400">{{ \Illuminate\Support\Str::limit($internship->job_description, 60, $end='...') }}</p>
                            <p><strong>{{$internship->user()->name}}</strong></p>
                            <div className="grid grid-col-4">
                                <p>Last Updated {{date('dd-mmm-YYYY', strtotime($internship->updated_at));}}</p>
                                <p className="col-end-7"><strong>{{$internship->job_duration}}</strong></p>
                            </div>
                        </div>
                    </a>
                <hr className="h-5">
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
