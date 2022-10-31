<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Internship') }}
        </h2>
    </x-slot>

    <div class="py-12 sm:px-12 grid">
        <div class="md:w-4/5 flex bg-white overflow-hidden shadow-sm mx-auto grid grid-cols-2">
            <div class="p-4">
                <img class="h-24" src="/images/download.png" alt="image">
                <h5 class="mt-4 text-xl"><strong>{{$internship->job_position}}</strong></h5>
                <p class="mb-4">{{$internship->category->category_title}}</p>
                
                <p>{{$internship->job_location}}</p>
                <div class="grid grid-col-4">
                    <p>{{$internship->job_duration}}</p>
                    <p class="mt-4">Posted by {{$internship->user->name}}</p>
                    <p><em>Last Updated {{date('d/m/Y', strtotime($internship->updated_at));}}</em></p>
                </div>
            </div>
            <div class="flex items-center justify-center w-full">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Apply Now
                </button>
            </div>
        </div>
        <div class="mt-8 md:w-4/5 flex bg-white overflow-hidden shadow-sm mx-auto grid grid-rows-3 px-12 py-8">
            <div class="mb-4">
                <h5><strong>Job Description: </strong></h5>
                <p>{{$internship->job_description}}</p>
            </div>
            <div class="mb-4">
                <h5><strong>Job Requirement:</strong></h5>
                <p>{{$internship->job_requirement}}</p>
            </div>
            <div class="mb-4">
                <h5><strong>Company Overview: </strong></h5>
                <p>{{$internship->company_overview}}</p>
            </div>
        </div>
    </div>
</x-app-layout>
