<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Internship') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
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
                    <form action="{{ route('internships.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-col">
                            <div>
                                <x-input-label for="job_position" class="text-xl" :value="__('Internship Position')" />
                
                                <x-text-input id="job_position" class="w-full px-4 py-2" type="text" name="job_position" required/>
                
                                <x-input-error :messages="$errors->get('job_position')" class="mt-2" />
                            </div>         
                            <div class="mt-4">
                                <x-input-label for="job_requirement" class="text-xl" :value="__('Internship Requirement')" />
                
                                <x-text-input id="job_requirement" class="w-full px-4 py-2"
                                                type="text"
                                                name="job_requirement"
                                                required/>
                
                                <x-input-error :messages="$errors->get('job_requirement')" class="mt-2" />
                            </div>     
                            <div class="mt-4">
                                <x-input-label for="job_location" class="text-xl" :value="__('Internship Location')" />
                
                                <x-text-input id="job_location" class="w-full px-4 py-2"
                                                type="text"
                                                name="job_location"
                                                required/>
                
                                <x-input-error :messages="$errors->get('job_requirement')" class="mt-2" />
                            </div>      
                            <div class="mt-4">
                                <x-input-label for="internship_category_id" class="text-xl" :value="__('Internship Category')" />
                
                                <select id="internship_category_id" class="form-control" name="internship_category_id" required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_title }}</option>
                                    @endforeach
                                </select>
                            </div>    
                            <div class="mt-4">
                                <x-input-label for="job_duration" class="text-xl" :value="__('Internship Duration')" />
                
                                <select id="job_duration" class="form-control" name="job_duration" required>
                                    <option value="Jan/Feb" key="Jan/Feb"> Jan/Feb </option>
                                    <option value="June/July" key="June/July"> June/July </option>
                                </select>
                            </div>    
                            <div class="mt-4">
                                <x-input-label for="job_description" class="text-xl" :value="__('Internship Description')" />

                                <textarea
                                    type="text"
                                    class="w-full rounded"
                                    name="job_description"
                                    id="job_description"></textarea>
                
                                <x-input-error :messages="$errors->get('job_description')" class="mt-2" />
                            </div>          
                            <div class="mt-4">
                                <x-input-label for="company_overview" class="text-xl" :value="__('Company Overview')" />

                                <textarea
                                    type="text"
                                    class="w-full rounded"
                                    name="company_overview"
                                    id="company_overview"></textarea>
                
                                <x-input-error :messages="$errors->get('company_overview')" class="mt-2" />
                            </div>       
                        </div>
                        <button type="submit" class='inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150'>Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

                           