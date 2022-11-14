<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Users') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('admin.update',$adminUser->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="flex flex-col">
                            <div>
                                <x-input-label for="user_id" class="text-xl" :value="__('ID')" />
                
                                <x-text-input id="user_id" class="w-full px-4 py-2" type="user_id" name="user_id" :value='$adminUser->user_id' required autofocus />
                
                                <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
                            </div>         
                            <div class="mt-4">
                                <x-input-label for="user_name" class="text-xl" :value="__('Name')" />
                
                                <x-text-input id="user_name" class="w-full px-4 py-2"
                                                type="user_name"
                                                name="user_name"
                                                :value='$adminUser->user_name'
                                                required autofocus/>
                
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
                                <x-input-label for="user_email" class="text-xl" :value="__('Email')" />
                
                                <x-text-input id="user_email" class="w-full px-4 py-2"
                                                type="user_email"
                                                name="user_email"
                                                :value='$adminUser->user_email'
                                                required autofocus/>
                
                                <x-input-error :messages="$errors->get('user_email')" class="mt-2" />
                            </div>          
                            <div class="mt-4">
                                <x-input-label for="user_phone" class="text-xl" :value="__('Phone')" />
                
                                <x-text-input id="user_phone" class="w-full px-4 py-2"
                                                type="user_phone"
                                                name="user_phone"
                                                :value='$adminUser->user_phone'
                                                required autofocus/>
                
                                <x-input-error :messages="$errors->get('user_phone')" class="mt-2" />
                            </div>      
                        </div>
                        <button type="submit" class='inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150'>Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>