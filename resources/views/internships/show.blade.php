<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Internship') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                        <div>
                            <x-input-label for="job_position" class="text-xl" :value="__('Internship Position')" />
            
                            <x-text-input id="job_position" class="w-full px-4 py-2" type="text" name="job_position" :value='$internship->job_position' disabled />
                        </div>         
                        <div class="mt-4">
                            <x-input-label for="job_requirement" class="text-xl" :value="__('Internship Requirement')" />
            
                            <x-text-input id="job_requirement" class="w-full px-4 py-2"
                                            type="text"
                                            name="job_requirement"
                                            :value='$internship->job_requirement'
                                            disabled/>
                        </div>     
                        <div class="mt-4">
                            <x-input-label for="job_location" class="text-xl" :value="__('Internship Location')" />
            
                            <x-text-input id="job_location" class="w-full px-4 py-2"
                                            type="text"
                                            name="job_location"
                                            :value='$internship->job_location'
                                            disabled/>
            
                            <x-input-error :messages="$errors->get('job_requirement')" class="mt-2" />
                        </div>      
                        <div class="mt-4">
                            <x-input-label for="internship_category_id" class="text-xl" :value="__('Internship Category')" />
            
                            <select id="internship_category_id" class="form-control" name="internship_category_id" disabled>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                            @if($category->id == $internship->internship_category_id) selected @endif>{{ $category->category_title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-4">
                            <x-input-label for="job_duration" class="text-xl" :value="__('Internship Duration')" />
            
                            <select id="job_duration" class="form-control" name="job_duration" disabled>
                                <option value="Jan/Feb" key="Jan/Feb" @if($internship->job_duration == "Jan/Feb") selected @endif> Jan/Feb </option>
                                <option value="June/July" key="June/July" @if($internship->job_duration == "June/July") selected @endif> June/July </option>
                            </select>
                        </div>   
                        <div class="mt-4">
                            <x-input-label for="job_description" class="text-xl" :value="__('Internship Description')" />

                            <textarea
                                type="text"
                                class="w-full rounded"
                                name="job_description"
                                id="job_description" disabled>{{$internship->job_description}}</textarea>
                        </div>          
                        <div class="mt-4">
                            <x-input-label for="company_overview" class="text-xl" :value="__('Company Overview')" />

                            <textarea
                                type="text"
                                class="w-full rounded"
                                name="company_overview"
                                id="company_overview" disabled>{{$internship->company_overview}}</textarea>
            
                            <x-input-error :messages="$errors->get('company_overview')" class="mt-2" />
                        </div>       
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
