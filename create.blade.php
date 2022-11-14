<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New User') }}
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
                    <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-col">
                            <div>
                                <x-input-label for="user_id" class="text-xl" :value="__('ID')" />
                
                                <x-text-input id="user_id" class="w-full px-4 py-2" type="text" name="user_id" required/>
                
                                <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
                            </div>         
                            <div class="mt-4">
                                <x-input-label for="user_name" class="text-xl" :value="__('Name')" />
                
                                <x-text-input id="user_name" class="w-full px-4 py-2"
                                                type="text"
                                                name="user_name"
                                                required/>
                
                                <x-input-error :messages="$errors->get('user_name')" class="mt-2" />
                            </div>     
                            <div class="mt-4">
                                <x-input-label for="user_role" class="text-xl" :value="__('Role')" />
                
                                <select id="user_role" class="form-control" name="user_role" required>
                                    <option value="Admin" key="Admin"> Admin </option>
                                    <option value="Student" key="Student"> Student </option>
                                    <option value="Company" key="Company"> Company </option>
                                    <option value="Supervisor" key="Supervisor"> Supervisor </option>
                                </select>
                            </div>      
                            <div class="mt-4">
                                <x-input-label for="user_schwork" class="text-xl" :value="__('School/Workplace')" />
                
                                <x-text-input id="user_schwork" class="w-full px-4 py-2"
                                                type="text"
                                                name="user_schwork"
                                                required/>
                
                                <x-input-error :messages="$errors->get('user_schwork')" class="mt-2" />
                            </div>    
                            <div class="mt-4">
                                <x-input-label for="user_email" class="text-xl" :value="__('Email')" />
                
                                <x-text-input id="user_email" class="w-full px-4 py-2"
                                                type="text"
                                                name="user_email"
                                                required/>
                
                                <x-input-error :messages="$errors->get('user_email')" class="mt-2" />
                            </div>    
                            <div class="mt-4">
                                <x-input-label for="user_phone" class="text-xl" :value="__('Phone')" />
                
                                <x-text-input id="user_phone" class="w-full px-4 py-2"
                                                type="text"
                                                name="user_phone"
                                                required/>
                
                                <x-input-error :messages="$errors->get('user_phone')" class="mt-2" />
                            </div>               
                        </div>
                        <button type="submit" class='inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150'>Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>