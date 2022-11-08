<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Internship') }}
        </h2>
    </x-slot>
   
    <div class="py-12 sm:px-12 grid">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
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
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" data-modal-toggle="defaultModal">
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
    
    <div id="defaultModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <form action="{{route('applications.store')}}" method="post">
                    @csrf
                    <!-- Modal header -->
                    <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Application
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <input type="hidden" name="internship_id" value="{{ $internship->id }}">
                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                            User ID: {{ Auth()->user()->id }}
                        </p>
                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                            Internship ID: {{ $internship->id }}
                        </p>
                        <div class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                            <x-input-label for="application_details" class="font-bold text-base" :value="__('Application Details (300 characters limit)')" />

                            <textarea
                                type="text"
                                rows="5"
                                class="w-full rounded resize-none"
                                maxlength="300"
                                placeholder="Why are you best suited in this role? Include attractive skills that will impress and contribute in the company hiring"
                                name="application_details"
                                id="application_details" required></textarea>
            
                            <x-input-error :messages="$errors->get('application_details')" class="mt-2" />
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit Application</button>
                        <button data-modal-toggle="defaultModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
